<?php

namespace App\Backend\Modules\Industry\BeautySpa\Appointments;

class AppointmentsSubmodule
{
    public const MODULE_KEY = 'beauty_spa';
    public const SUBMODULE_KEY = 'appointments';

    public static function features(): array
    {
        return [            'online_booking',
            'walk_ins',
            'calendar',
            'staff_schedules',
            'reminders',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/beauty_spa/appointments/online_booking' => [Controllers\OnlineBookingController::class, 'index'],
            'POST /api/modules/beauty_spa/appointments/online_booking' => [Controllers\OnlineBookingController::class, 'store'],
            'GET /api/modules/beauty_spa/appointments/online_booking/{id}' => [Controllers\OnlineBookingController::class, 'show'],
            'PUT /api/modules/beauty_spa/appointments/online_booking/{id}' => [Controllers\OnlineBookingController::class, 'update'],
            'DELETE /api/modules/beauty_spa/appointments/online_booking/{id}' => [Controllers\OnlineBookingController::class, 'destroy'],
            'GET /api/modules/beauty_spa/appointments/walk_ins' => [Controllers\WalkInsController::class, 'index'],
            'POST /api/modules/beauty_spa/appointments/walk_ins' => [Controllers\WalkInsController::class, 'store'],
            'GET /api/modules/beauty_spa/appointments/walk_ins/{id}' => [Controllers\WalkInsController::class, 'show'],
            'PUT /api/modules/beauty_spa/appointments/walk_ins/{id}' => [Controllers\WalkInsController::class, 'update'],
            'DELETE /api/modules/beauty_spa/appointments/walk_ins/{id}' => [Controllers\WalkInsController::class, 'destroy'],
            'GET /api/modules/beauty_spa/appointments/calendar' => [Controllers\CalendarController::class, 'index'],
            'POST /api/modules/beauty_spa/appointments/calendar' => [Controllers\CalendarController::class, 'store'],
            'GET /api/modules/beauty_spa/appointments/calendar/{id}' => [Controllers\CalendarController::class, 'show'],
            'PUT /api/modules/beauty_spa/appointments/calendar/{id}' => [Controllers\CalendarController::class, 'update'],
            'DELETE /api/modules/beauty_spa/appointments/calendar/{id}' => [Controllers\CalendarController::class, 'destroy'],
            'GET /api/modules/beauty_spa/appointments/staff_schedules' => [Controllers\StaffSchedulesController::class, 'index'],
            'POST /api/modules/beauty_spa/appointments/staff_schedules' => [Controllers\StaffSchedulesController::class, 'store'],
            'GET /api/modules/beauty_spa/appointments/staff_schedules/{id}' => [Controllers\StaffSchedulesController::class, 'show'],
            'PUT /api/modules/beauty_spa/appointments/staff_schedules/{id}' => [Controllers\StaffSchedulesController::class, 'update'],
            'DELETE /api/modules/beauty_spa/appointments/staff_schedules/{id}' => [Controllers\StaffSchedulesController::class, 'destroy'],
            'GET /api/modules/beauty_spa/appointments/reminders' => [Controllers\RemindersController::class, 'index'],
            'POST /api/modules/beauty_spa/appointments/reminders' => [Controllers\RemindersController::class, 'store'],
            'GET /api/modules/beauty_spa/appointments/reminders/{id}' => [Controllers\RemindersController::class, 'show'],
            'PUT /api/modules/beauty_spa/appointments/reminders/{id}' => [Controllers\RemindersController::class, 'update'],
            'DELETE /api/modules/beauty_spa/appointments/reminders/{id}' => [Controllers\RemindersController::class, 'destroy'],
        ];
    }
}
