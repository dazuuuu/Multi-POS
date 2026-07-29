<?php

return array (
  0 => 
  array (
    'group' => 'core',
    'resource' => 'products',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\ProductsController',
    'permission' => 'inventory',
  ),
  1 => 
  array (
    'group' => 'core',
    'resource' => 'customers',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\CustomersController',
    'permission' => 'customers',
  ),
  2 => 
  array (
    'group' => 'core',
    'resource' => 'suppliers',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\SuppliersController',
    'permission' => 'inventory',
  ),
  3 => 
  array (
    'group' => 'core',
    'resource' => 'sales',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\SalesController',
    'permission' => 'sales',
  ),
  4 => 
  array (
    'group' => 'core',
    'resource' => 'branches',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\BranchesController',
    'permission' => 'branches',
  ),
  5 => 
  array (
    'group' => 'core',
    'resource' => 'warehouses',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\WarehousesController',
    'permission' => 'inventory',
  ),
  6 => 
  array (
    'group' => 'core',
    'resource' => 'expenses',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\ExpensesController',
    'permission' => 'financials',
  ),
  7 => 
  array (
    'group' => 'core',
    'resource' => 'invoices',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\InvoicesController',
    'permission' => 'financials',
  ),
  8 => 
  array (
    'group' => 'core',
    'resource' => 'purchase-orders',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Core\\PurchaseOrdersController',
    'permission' => 'inventory',
  ),
  9 => 
  array (
    'group' => 'industry/restaurant-hotel',
    'resource' => 'tables',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\RestaurantHotel\\TablesController',
    'permission' => 'dashboard.view',
  ),
  10 => 
  array (
    'group' => 'industry/restaurant-hotel',
    'resource' => 'reservations',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\RestaurantHotel\\ReservationsController',
    'permission' => 'dashboard.view',
  ),
  11 => 
  array (
    'group' => 'industry/restaurant-hotel',
    'resource' => 'menu-items',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\RestaurantHotel\\MenuItemsController',
    'permission' => 'dashboard.view',
  ),
  12 => 
  array (
    'group' => 'industry/restaurant-hotel',
    'resource' => 'kitchen-orders',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\RestaurantHotel\\KitchenOrdersController',
    'permission' => 'dashboard.view',
  ),
  13 => 
  array (
    'group' => 'industry/restaurant-hotel',
    'resource' => 'rooms',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\RestaurantHotel\\RoomsController',
    'permission' => 'dashboard.view',
  ),
  14 => 
  array (
    'group' => 'industry/restaurant-hotel',
    'resource' => 'bookings',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\RestaurantHotel\\BookingsController',
    'permission' => 'dashboard.view',
  ),
  15 => 
  array (
    'group' => 'industry/restaurant-hotel',
    'resource' => 'housekeeping',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\RestaurantHotel\\HousekeepingController',
    'permission' => 'dashboard.view',
  ),
  16 => 
  array (
    'group' => 'industry/restaurant-hotel',
    'resource' => 'guests',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\RestaurantHotel\\GuestsController',
    'permission' => 'dashboard.view',
  ),
  17 => 
  array (
    'group' => 'industry/bar-liquor',
    'resource' => 'bottles',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\BarLiquor\\BottlesController',
    'permission' => 'dashboard.view',
  ),
  18 => 
  array (
    'group' => 'industry/bar-liquor',
    'resource' => 'tabs',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\BarLiquor\\TabsController',
    'permission' => 'dashboard.view',
  ),
  19 => 
  array (
    'group' => 'industry/bar-liquor',
    'resource' => 'cocktails',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\BarLiquor\\CocktailsController',
    'permission' => 'dashboard.view',
  ),
  20 => 
  array (
    'group' => 'industry/bar-liquor',
    'resource' => 'shifts',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\BarLiquor\\ShiftsController',
    'permission' => 'dashboard.view',
  ),
  21 => 
  array (
    'group' => 'industry/wholesale-retail',
    'resource' => 'price-lists',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\WholesaleRetail\\PriceListsController',
    'permission' => 'dashboard.view',
  ),
  22 => 
  array (
    'group' => 'industry/wholesale-retail',
    'resource' => 'delivery-notes',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\WholesaleRetail\\DeliveryNotesController',
    'permission' => 'dashboard.view',
  ),
  23 => 
  array (
    'group' => 'industry/wholesale-retail',
    'resource' => 'dispatches',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\WholesaleRetail\\DispatchesController',
    'permission' => 'dashboard.view',
  ),
  24 => 
  array (
    'group' => 'industry/wholesale-retail',
    'resource' => 'credit-accounts',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\WholesaleRetail\\CreditAccountsController',
    'permission' => 'dashboard.view',
  ),
  25 => 
  array (
    'group' => 'industry/supermarket',
    'resource' => 'promotions',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Supermarket\\PromotionsController',
    'permission' => 'dashboard.view',
  ),
  26 => 
  array (
    'group' => 'industry/supermarket',
    'resource' => 'coupons',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Supermarket\\CouponsController',
    'permission' => 'dashboard.view',
  ),
  27 => 
  array (
    'group' => 'industry/supermarket',
    'resource' => 'loyalty-accounts',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Supermarket\\LoyaltyAccountsController',
    'permission' => 'dashboard.view',
  ),
  28 => 
  array (
    'group' => 'industry/supermarket',
    'resource' => 'cashier-sessions',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Supermarket\\CashierSessionsController',
    'permission' => 'dashboard.view',
  ),
  29 => 
  array (
    'group' => 'industry/salon-spa',
    'resource' => 'appointments',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\SalonSpa\\AppointmentsController',
    'permission' => 'dashboard.view',
  ),
  30 => 
  array (
    'group' => 'industry/salon-spa',
    'resource' => 'services',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\SalonSpa\\ServicesController',
    'permission' => 'dashboard.view',
  ),
  31 => 
  array (
    'group' => 'industry/salon-spa',
    'resource' => 'packages',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\SalonSpa\\PackagesController',
    'permission' => 'dashboard.view',
  ),
  32 => 
  array (
    'group' => 'industry/salon-spa',
    'resource' => 'treatment-records',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\SalonSpa\\TreatmentRecordsController',
    'permission' => 'dashboard.view',
  ),
  33 => 
  array (
    'group' => 'industry/agrovet-hardware',
    'resource' => 'batches',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\AgrovetHardware\\BatchesController',
    'permission' => 'dashboard.view',
  ),
  34 => 
  array (
    'group' => 'industry/agrovet-hardware',
    'resource' => 'equipment',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\AgrovetHardware\\EquipmentController',
    'permission' => 'dashboard.view',
  ),
  35 => 
  array (
    'group' => 'industry/agrovet-hardware',
    'resource' => 'contractor-accounts',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\AgrovetHardware\\ContractorAccountsController',
    'permission' => 'dashboard.view',
  ),
  36 => 
  array (
    'group' => 'industry/agrovet-hardware',
    'resource' => 'tool-rentals',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\AgrovetHardware\\ToolRentalsController',
    'permission' => 'dashboard.view',
  ),
  37 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'patients',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\PatientsController',
    'permission' => 'dashboard.view',
  ),
  38 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'appointments',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\AppointmentsController',
    'permission' => 'dashboard.view',
  ),
  39 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'encounters',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\EncountersController',
    'permission' => 'dashboard.view',
  ),
  40 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'prescriptions',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\PrescriptionsController',
    'permission' => 'dashboard.view',
  ),
  41 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'lab-orders',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\LabOrdersController',
    'permission' => 'dashboard.view',
  ),
  42 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'lab-results',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\LabResultsController',
    'permission' => 'dashboard.view',
  ),
  43 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'admissions',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\AdmissionsController',
    'permission' => 'dashboard.view',
  ),
  44 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'beds',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\BedsController',
    'permission' => 'dashboard.view',
  ),
  45 => 
  array (
    'group' => 'industry/healthcare',
    'resource' => 'insurance-claims',
    'controller' => '\\App\\Http\\Controllers\\Api\\V1\\Industry\\Healthcare\\InsuranceClaimsController',
    'permission' => 'dashboard.view',
  ),
);
