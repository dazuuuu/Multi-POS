<?php

namespace App\Backend\Modules\Roles;

class IndustryRoles
{
    public static function all(): array
    {
        return array_merge(
            self::restaurantHotels(),
            self::barLiquor(),
            self::wholesaleRetail(),
            self::supermarkets(),
            self::beautySpa(),
            self::agrovetsHardware(),
            self::healthcare()
        );
    }

    public static function byModule(): array
    {
        return [
            'restaurant_hotels' => self::restaurantHotels(),
            'bar_liquor' => self::barLiquor(),
            'wholesale_retail' => self::wholesaleRetail(),
            'supermarkets' => self::supermarkets(),
            'beauty_spa' => self::beautySpa(),
            'agrovets_hardware' => self::agrovetsHardware(),
            'healthcare' => self::healthcare(),
        ];
    }

    private static function restaurantHotels(): array
    {
        return [
            'waiter' => [
                'name' => 'Waiter',
                'category' => 'restaurant_hotels',
                'module' => 'restaurant_hotels',
                'permissions' => ['restaurant.tables.*', 'restaurant.orders.*', 'restaurant.menu.view'],
            ],
            'chef' => [
                'name' => 'Chef',
                'category' => 'restaurant_hotels',
                'module' => 'restaurant_hotels',
                'permissions' => ['restaurant.kitchen.*', 'restaurant.recipes.*', 'restaurant.ingredients.view'],
            ],
            'hotel_receptionist' => [
                'name' => 'Hotel Receptionist',
                'category' => 'restaurant_hotels',
                'module' => 'restaurant_hotels',
                'permissions' => ['hotels.booking.*', 'hotels.checkin.*', 'hotels.guests.*'],
            ],
            'housekeeping' => [
                'name' => 'Housekeeping',
                'category' => 'restaurant_hotels',
                'module' => 'restaurant_hotels',
                'permissions' => ['hotels.housekeeping.*', 'hotels.rooms.view'],
            ],
        ];
    }

    private static function barLiquor(): array
    {
        return [
            'bartender' => [
                'name' => 'Bartender',
                'category' => 'bar_liquor',
                'module' => 'bar_liquor',
                'permissions' => ['bar.operations.*', 'bar.tabs.*', 'bar.cocktails.*'],
            ],
            'liquor_store_clerk' => [
                'name' => 'Liquor Store Clerk',
                'category' => 'bar_liquor',
                'module' => 'bar_liquor',
                'permissions' => ['liquor.inventory.*', 'liquor.sales.*', 'liquor.batches.view'],
            ],
        ];
    }

    private static function wholesaleRetail(): array
    {
        return [
            'wholesale_manager' => [
                'name' => 'Wholesale Manager',
                'category' => 'wholesale_retail',
                'module' => 'wholesale_retail',
                'permissions' => ['wholesale.pricing.*', 'wholesale.orders.*', 'wholesale.credit.*'],
            ],
            'dispatch_officer' => [
                'name' => 'Dispatch Officer',
                'category' => 'wholesale_retail',
                'module' => 'wholesale_retail',
                'permissions' => ['logistics.dispatch.*', 'logistics.delivery.*', 'logistics.fleet.view'],
            ],
        ];
    }

    private static function supermarkets(): array
    {
        return [
            'supermarket_cashier' => [
                'name' => 'Supermarket Cashier',
                'category' => 'supermarkets',
                'module' => 'supermarkets',
                'permissions' => ['grocery.checkout.*', 'grocery.barcode.*', 'loyalty.points.*'],
            ],
            'produce_manager' => [
                'name' => 'Produce Manager',
                'category' => 'supermarkets',
                'module' => 'supermarkets',
                'permissions' => ['grocery.produce.*', 'grocery.expiry.*', 'grocery.promotions.*'],
            ],
        ];
    }

    private static function beautySpa(): array
    {
        return [
            'barber' => [
                'name' => 'Barber',
                'category' => 'beauty_spa',
                'module' => 'beauty_spa',
                'permissions' => ['services.haircuts.*', 'appointments.view', 'customers.view'],
            ],
            'stylist' => [
                'name' => 'Stylist',
                'category' => 'beauty_spa',
                'module' => 'beauty_spa',
                'permissions' => ['services.*', 'appointments.*', 'customers.*', 'beauty.products.view'],
            ],
            'spa_therapist' => [
                'name' => 'Spa Therapist',
                'category' => 'beauty_spa',
                'module' => 'beauty_spa',
                'permissions' => ['spa.treatments.*', 'spa.rooms.*', 'appointments.*'],
            ],
            'salon_receptionist' => [
                'name' => 'Salon Receptionist',
                'category' => 'beauty_spa',
                'module' => 'beauty_spa',
                'permissions' => ['appointments.*', 'customers.*', 'services.view'],
            ],
        ];
    }

    private static function agrovetsHardware(): array
    {
        return [
            'agrovet_officer' => [
                'name' => 'Agrovet Officer',
                'category' => 'agrovets_hardware',
                'module' => 'agrovets_hardware',
                'permissions' => ['agrovet.*', 'farming.*', 'regulatory.*'],
            ],
            'hardware_clerk' => [
                'name' => 'Hardware Clerk',
                'category' => 'agrovets_hardware',
                'module' => 'agrovets_hardware',
                'permissions' => ['hardware.products.*', 'hardware.services.*', 'hardware.contractors.view'],
            ],
        ];
    }

    private static function healthcare(): array
    {
        return [
            'doctor' => [
                'name' => 'Doctor',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['emr.*', 'doctor.*', 'prescriptions.*', 'patients.view', 'patients.edit'],
            ],
            'nurse' => [
                'name' => 'Nurse',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['nursing.*', 'emr.vitals.*', 'emr.medications.*', 'patients.view'],
            ],
            'pharmacist' => [
                'name' => 'Pharmacist',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['pharmacy.*', 'prescriptions.dispense', 'patients.view'],
            ],
            'receptionist' => [
                'name' => 'Receptionist',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['reception.*', 'appointments.*', 'patients.register', 'patients.view'],
            ],
            'laboratory_technician' => [
                'name' => 'Laboratory Technician',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['laboratory.*', 'patients.view'],
            ],
            'radiologist' => [
                'name' => 'Radiologist',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['radiology.*', 'patients.view'],
            ],
            'dentist' => [
                'name' => 'Dentist',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['dental.*', 'patients.view', 'patients.edit'],
            ],
            'physiotherapist' => [
                'name' => 'Physiotherapist',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['physiotherapy.*', 'patients.view'],
            ],
            'security' => [
                'name' => 'Security',
                'category' => 'healthcare',
                'module' => 'healthcare',
                'permissions' => ['security.access', 'patients.view_limited'],
            ],
        ];
    }
}
