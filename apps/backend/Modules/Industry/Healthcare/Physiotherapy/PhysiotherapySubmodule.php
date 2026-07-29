<?php

namespace App\Backend\Modules\Industry\Healthcare\Physiotherapy;

class PhysiotherapySubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'physiotherapy';

    public static function features(): array
    {
        return [            'therapy_sessions',
            'exercise_plans',
            'progress_tracking',
            'appointment_scheduling',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/physiotherapy/therapy_sessions' => [Controllers\TherapySessionsController::class, 'index'],
            'POST /api/modules/healthcare/physiotherapy/therapy_sessions' => [Controllers\TherapySessionsController::class, 'store'],
            'GET /api/modules/healthcare/physiotherapy/therapy_sessions/{id}' => [Controllers\TherapySessionsController::class, 'show'],
            'PUT /api/modules/healthcare/physiotherapy/therapy_sessions/{id}' => [Controllers\TherapySessionsController::class, 'update'],
            'DELETE /api/modules/healthcare/physiotherapy/therapy_sessions/{id}' => [Controllers\TherapySessionsController::class, 'destroy'],
            'GET /api/modules/healthcare/physiotherapy/exercise_plans' => [Controllers\ExercisePlansController::class, 'index'],
            'POST /api/modules/healthcare/physiotherapy/exercise_plans' => [Controllers\ExercisePlansController::class, 'store'],
            'GET /api/modules/healthcare/physiotherapy/exercise_plans/{id}' => [Controllers\ExercisePlansController::class, 'show'],
            'PUT /api/modules/healthcare/physiotherapy/exercise_plans/{id}' => [Controllers\ExercisePlansController::class, 'update'],
            'DELETE /api/modules/healthcare/physiotherapy/exercise_plans/{id}' => [Controllers\ExercisePlansController::class, 'destroy'],
            'GET /api/modules/healthcare/physiotherapy/progress_tracking' => [Controllers\ProgressTrackingController::class, 'index'],
            'POST /api/modules/healthcare/physiotherapy/progress_tracking' => [Controllers\ProgressTrackingController::class, 'store'],
            'GET /api/modules/healthcare/physiotherapy/progress_tracking/{id}' => [Controllers\ProgressTrackingController::class, 'show'],
            'PUT /api/modules/healthcare/physiotherapy/progress_tracking/{id}' => [Controllers\ProgressTrackingController::class, 'update'],
            'DELETE /api/modules/healthcare/physiotherapy/progress_tracking/{id}' => [Controllers\ProgressTrackingController::class, 'destroy'],
            'GET /api/modules/healthcare/physiotherapy/appointment_scheduling' => [Controllers\AppointmentSchedulingController::class, 'index'],
            'POST /api/modules/healthcare/physiotherapy/appointment_scheduling' => [Controllers\AppointmentSchedulingController::class, 'store'],
            'GET /api/modules/healthcare/physiotherapy/appointment_scheduling/{id}' => [Controllers\AppointmentSchedulingController::class, 'show'],
            'PUT /api/modules/healthcare/physiotherapy/appointment_scheduling/{id}' => [Controllers\AppointmentSchedulingController::class, 'update'],
            'DELETE /api/modules/healthcare/physiotherapy/appointment_scheduling/{id}' => [Controllers\AppointmentSchedulingController::class, 'destroy'],
        ];
    }
}
