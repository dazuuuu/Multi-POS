<?php

namespace App\Backend\Modules\Industry\Supermarkets\Loyalty;

class LoyaltySubmodule
{
    public const MODULE_KEY = 'supermarkets';
    public const SUBMODULE_KEY = 'loyalty';

    public static function features(): array
    {
        return [            'reward_points',
            'coupons',
            'membership_cards',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/supermarkets/loyalty/reward_points' => [Controllers\RewardPointsController::class, 'index'],
            'POST /api/modules/supermarkets/loyalty/reward_points' => [Controllers\RewardPointsController::class, 'store'],
            'GET /api/modules/supermarkets/loyalty/reward_points/{id}' => [Controllers\RewardPointsController::class, 'show'],
            'PUT /api/modules/supermarkets/loyalty/reward_points/{id}' => [Controllers\RewardPointsController::class, 'update'],
            'DELETE /api/modules/supermarkets/loyalty/reward_points/{id}' => [Controllers\RewardPointsController::class, 'destroy'],
            'GET /api/modules/supermarkets/loyalty/coupons' => [Controllers\CouponsController::class, 'index'],
            'POST /api/modules/supermarkets/loyalty/coupons' => [Controllers\CouponsController::class, 'store'],
            'GET /api/modules/supermarkets/loyalty/coupons/{id}' => [Controllers\CouponsController::class, 'show'],
            'PUT /api/modules/supermarkets/loyalty/coupons/{id}' => [Controllers\CouponsController::class, 'update'],
            'DELETE /api/modules/supermarkets/loyalty/coupons/{id}' => [Controllers\CouponsController::class, 'destroy'],
            'GET /api/modules/supermarkets/loyalty/membership_cards' => [Controllers\MembershipCardsController::class, 'index'],
            'POST /api/modules/supermarkets/loyalty/membership_cards' => [Controllers\MembershipCardsController::class, 'store'],
            'GET /api/modules/supermarkets/loyalty/membership_cards/{id}' => [Controllers\MembershipCardsController::class, 'show'],
            'PUT /api/modules/supermarkets/loyalty/membership_cards/{id}' => [Controllers\MembershipCardsController::class, 'update'],
            'DELETE /api/modules/supermarkets/loyalty/membership_cards/{id}' => [Controllers\MembershipCardsController::class, 'destroy'],
        ];
    }
}
