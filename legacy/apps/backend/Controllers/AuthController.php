<?php

namespace App\Backend\Controllers;

use App\Backend\Helpers\ResponseHelper;
use App\Backend\Modules\Registry\ModuleRegistry;
use App\Backend\Services\AuthService;
use App\Backend\Services\RegistrationService;
use App\Backend\Services\SessionService;

class AuthController extends BaseController
{
    public function __construct(
        private AuthService $authService = new AuthService(),
        private RegistrationService $registrationService = new RegistrationService(),
        private SessionService $sessionService = new SessionService(),
    ) {
    }

    public function showRegister(): string
    {
        $content = $this->view('auth/register', [
            'title' => 'Create Your Account',
            'coreModules' => ModuleRegistry::coreModules(),
            'industryModules' => ModuleRegistry::industryModules(),
            'tiers' => ModuleRegistry::subscriptionTiers(),
            'errors' => [],
            'old' => [],
        ]);

        return $this->layout($content, ['title' => 'Register']);
    }

    public function register(): void
    {
        $data = [
            'owner_name' => trim($_POST['owner_name'] ?? ''),
            'business_name' => trim($_POST['business_name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'password' => $_POST['password'] ?? '',
            'phone' => trim($_POST['phone'] ?? ''),
            'industry_type' => trim($_POST['industry_type'] ?? ''),
            'currency' => $_POST['currency'] ?? 'USD',
            'timezone' => $_POST['timezone'] ?? 'UTC',
            'subscription_tier' => $_POST['subscription_tier'] ?? 'starter',
            'modules' => $_POST['modules'] ?? [],
        ];

        $errors = $this->validateRegistration($data);
        if (!empty($errors)) {
            $content = $this->view('auth/register', [
                'title' => 'Create Your Account',
                'coreModules' => ModuleRegistry::coreModules(),
                'industryModules' => ModuleRegistry::industryModules(),
                'tiers' => ModuleRegistry::subscriptionTiers(),
                'errors' => $errors,
                'old' => $data,
            ]);
            echo $this->layout($content, ['title' => 'Register']);
            return;
        }

        try {
            $result = $this->registrationService->registerBusiness($data);
            $this->sessionService->start($result['user'], $result['business']);
            ResponseHelper::redirect('/dashboard');
        } catch (\Exception $e) {
            $content = $this->view('auth/register', [
                'title' => 'Create Your Account',
                'coreModules' => ModuleRegistry::coreModules(),
                'industryModules' => ModuleRegistry::industryModules(),
                'tiers' => ModuleRegistry::subscriptionTiers(),
                'errors' => [$e->getMessage()],
                'old' => $data,
            ]);
            echo $this->layout($content, ['title' => 'Register']);
        }
    }

    public function showLogin(): string
    {
        $content = $this->view('auth/login', [
            'title' => 'Sign In',
            'errors' => [],
        ]);

        return $this->layout($content, ['title' => 'Login']);
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->authService->login($email, $password);
        if (!$user) {
            $content = $this->view('auth/login', [
                'title' => 'Sign In',
                'errors' => ['Invalid email or password.'],
            ]);
            echo $this->layout($content, ['title' => 'Login']);
            return;
        }

        unset($user['password']);
        $this->sessionService->start($user);
        ResponseHelper::redirect('/dashboard');
    }

    public function logout(): void
    {
        $this->sessionService->destroy();
        ResponseHelper::redirect('/');
    }

    private function validateRegistration(array $data): array
    {
        $errors = [];

        if (empty($data['owner_name'])) {
            $errors[] = 'Owner name is required.';
        }
        if (empty($data['business_name'])) {
            $errors[] = 'Business name is required.';
        }
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Valid email is required.';
        }
        if (strlen($data['password']) < 6) {
            $errors[] = 'Password must be at least 6 characters.';
        }

        return $errors;
    }
}
