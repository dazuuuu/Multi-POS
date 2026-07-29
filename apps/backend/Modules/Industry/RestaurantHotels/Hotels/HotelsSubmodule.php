<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Hotels;

class HotelsSubmodule
{
    public const MODULE_KEY = 'restaurant_hotels';
    public const SUBMODULE_KEY = 'hotels';

    public static function features(): array
    {
        return [            'room_booking',
            'check_in',
            'check_out',
            'room_service',
            'housekeeping',
            'laundry',
            'mini_bar',
            'guest_profiles',
            'reservations',
            'room_availability',
            'conference_halls',
            'event_bookings',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/restaurant_hotels/hotels/room_booking' => [Controllers\RoomBookingController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/room_booking' => [Controllers\RoomBookingController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/room_booking/{id}' => [Controllers\RoomBookingController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/room_booking/{id}' => [Controllers\RoomBookingController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/room_booking/{id}' => [Controllers\RoomBookingController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/check_in' => [Controllers\CheckInController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/check_in' => [Controllers\CheckInController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/check_in/{id}' => [Controllers\CheckInController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/check_in/{id}' => [Controllers\CheckInController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/check_in/{id}' => [Controllers\CheckInController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/check_out' => [Controllers\CheckOutController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/check_out' => [Controllers\CheckOutController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/check_out/{id}' => [Controllers\CheckOutController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/check_out/{id}' => [Controllers\CheckOutController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/check_out/{id}' => [Controllers\CheckOutController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/room_service' => [Controllers\RoomServiceController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/room_service' => [Controllers\RoomServiceController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/room_service/{id}' => [Controllers\RoomServiceController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/room_service/{id}' => [Controllers\RoomServiceController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/room_service/{id}' => [Controllers\RoomServiceController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/housekeeping' => [Controllers\HousekeepingController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/housekeeping' => [Controllers\HousekeepingController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/housekeeping/{id}' => [Controllers\HousekeepingController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/housekeeping/{id}' => [Controllers\HousekeepingController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/housekeeping/{id}' => [Controllers\HousekeepingController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/laundry' => [Controllers\LaundryController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/laundry' => [Controllers\LaundryController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/laundry/{id}' => [Controllers\LaundryController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/laundry/{id}' => [Controllers\LaundryController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/laundry/{id}' => [Controllers\LaundryController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/mini_bar' => [Controllers\MiniBarController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/mini_bar' => [Controllers\MiniBarController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/mini_bar/{id}' => [Controllers\MiniBarController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/mini_bar/{id}' => [Controllers\MiniBarController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/mini_bar/{id}' => [Controllers\MiniBarController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/guest_profiles' => [Controllers\GuestProfilesController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/guest_profiles' => [Controllers\GuestProfilesController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/guest_profiles/{id}' => [Controllers\GuestProfilesController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/guest_profiles/{id}' => [Controllers\GuestProfilesController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/guest_profiles/{id}' => [Controllers\GuestProfilesController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/reservations' => [Controllers\ReservationsController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/reservations' => [Controllers\ReservationsController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/reservations/{id}' => [Controllers\ReservationsController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/reservations/{id}' => [Controllers\ReservationsController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/reservations/{id}' => [Controllers\ReservationsController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/room_availability' => [Controllers\RoomAvailabilityController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/room_availability' => [Controllers\RoomAvailabilityController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/room_availability/{id}' => [Controllers\RoomAvailabilityController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/room_availability/{id}' => [Controllers\RoomAvailabilityController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/room_availability/{id}' => [Controllers\RoomAvailabilityController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/conference_halls' => [Controllers\ConferenceHallsController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/conference_halls' => [Controllers\ConferenceHallsController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/conference_halls/{id}' => [Controllers\ConferenceHallsController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/conference_halls/{id}' => [Controllers\ConferenceHallsController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/conference_halls/{id}' => [Controllers\ConferenceHallsController::class, 'destroy'],
            'GET /api/modules/restaurant_hotels/hotels/event_bookings' => [Controllers\EventBookingsController::class, 'index'],
            'POST /api/modules/restaurant_hotels/hotels/event_bookings' => [Controllers\EventBookingsController::class, 'store'],
            'GET /api/modules/restaurant_hotels/hotels/event_bookings/{id}' => [Controllers\EventBookingsController::class, 'show'],
            'PUT /api/modules/restaurant_hotels/hotels/event_bookings/{id}' => [Controllers\EventBookingsController::class, 'update'],
            'DELETE /api/modules/restaurant_hotels/hotels/event_bookings/{id}' => [Controllers\EventBookingsController::class, 'destroy'],
        ];
    }
}
