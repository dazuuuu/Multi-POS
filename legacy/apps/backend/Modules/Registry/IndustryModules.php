<?php

namespace App\Backend\Modules\Registry;

class IndustryModules
{
    public static function all(): array
    {
        return [
            'restaurant_hotels' => [
                'name' => 'Restaurant & Hotels',
                'description' => 'Tables, kitchen display, room booking, and hospitality operations.',
                'category' => 'industry',
                'icon' => 'utensils',
                'submodules' => [
                    'restaurant' => [
                        'name' => 'Restaurant',
                        'features' => [
                            'tables', 'table_management', 'table_reservations', 'qr_ordering',
                            'table_transfer', 'merge_tables', 'split_bills',
                            'kitchen_display_system', 'kitchen_printing', 'cooking_status',
                            'food_preparation_timers', 'recipe_management', 'ingredients_tracking',
                            'waiter_assignment', 'waiter_commissions', 'order_tracking',
                            'menu_categories', 'combos', 'meal_customization', 'add_ons',
                            'happy_hour_pricing', 'delivery_riders', 'delivery_tracking',
                            'online_orders', 'pickup_orders',
                        ],
                    ],
                    'hotels' => [
                        'name' => 'Hotels',
                        'features' => [
                            'room_booking', 'check_in', 'check_out', 'room_service',
                            'housekeeping', 'laundry', 'mini_bar', 'guest_profiles',
                            'reservations', 'room_availability', 'conference_halls', 'event_bookings',
                        ],
                    ],
                ],
            ],
            'bar_liquor' => [
                'name' => 'Bar & Liquor Store',
                'description' => 'Bottle tracking, peg measurements, cocktails, and shift closing.',
                'category' => 'industry',
                'icon' => 'wine-glass',
                'submodules' => [
                    'bar_operations' => [
                        'name' => 'Bar Operations',
                        'features' => [
                            'bottle_tracking', 'peg_measurements', 'happy_hour_pricing',
                            'cocktail_recipes', 'mix_tracking', 'open_tab_management', 'table_service',
                        ],
                    ],
                    'liquor_store' => [
                        'name' => 'Liquor Store',
                        'features' => [
                            'bottle_barcode', 'case_management', 'alcohol_licensing_records',
                            'supplier_batches', 'expiry_tracking',
                        ],
                    ],
                    'night_reports' => [
                        'name' => 'Night Reports',
                        'features' => [
                            'bartender_sales', 'shift_closing', 'cash_reconciliation',
                        ],
                    ],
                ],
            ],
            'wholesale_retail' => [
                'name' => 'Wholesale & Retail',
                'description' => 'Bulk pricing, sales orders, logistics, and customer credit.',
                'category' => 'industry',
                'icon' => 'store',
                'submodules' => [
                    'sales' => [
                        'name' => 'Sales',
                        'features' => [
                            'bulk_pricing', 'wholesale_pricing', 'retail_pricing',
                            'customer_specific_pricing', 'quantity_discounts',
                        ],
                    ],
                    'orders' => [
                        'name' => 'Orders',
                        'features' => [
                            'sales_orders', 'purchase_orders', 'quotations', 'delivery_notes',
                        ],
                    ],
                    'logistics' => [
                        'name' => 'Logistics',
                        'features' => [
                            'dispatch', 'fleet_management', 'delivery_routes', 'proof_of_delivery',
                        ],
                    ],
                    'credit' => [
                        'name' => 'Credit',
                        'features' => [
                            'customer_credit', 'installments', 'debt_reminders', 'statements',
                        ],
                    ],
                ],
            ],
            'supermarkets' => [
                'name' => 'Supermarkets & Minimarkets',
                'description' => 'Barcode scanning, weighing scales, BOGO promotions, and self-checkout.',
                'category' => 'industry',
                'icon' => 'shopping-cart',
                'submodules' => [
                    'grocery' => [
                        'name' => 'Grocery Features',
                        'features' => [
                            'barcode_scanning', 'weighing_scale_integration', 'fresh_produce',
                            'expiry_management', 'bogo_promotions', 'shelf_labels',
                        ],
                    ],
                    'checkout' => [
                        'name' => 'Checkout',
                        'features' => [
                            'self_checkout', 'multiple_cashiers', 'queue_management',
                        ],
                    ],
                    'loyalty' => [
                        'name' => 'Loyalty',
                        'features' => [
                            'reward_points', 'coupons', 'membership_cards',
                        ],
                    ],
                ],
            ],
            'beauty_spa' => [
                'name' => 'Barbershops, Salons & Spas',
                'description' => 'Appointments, services, staff commissions, and treatment records.',
                'category' => 'industry',
                'icon' => 'spa',
                'submodules' => [
                    'appointments' => [
                        'name' => 'Appointments',
                        'features' => [
                            'online_booking', 'walk_ins', 'calendar', 'staff_schedules', 'reminders',
                        ],
                    ],
                    'services' => [
                        'name' => 'Services',
                        'features' => [
                            'haircuts', 'hair_coloring', 'braiding', 'nails', 'massage',
                            'facial', 'waxing', 'makeup',
                        ],
                    ],
                    'staff' => [
                        'name' => 'Staff',
                        'features' => [
                            'commission_management', 'chair_rentals', 'stylist_performance',
                        ],
                    ],
                    'beauty_products' => [
                        'name' => 'Beauty Products',
                        'features' => [
                            'retail_cosmetics', 'hair_products', 'beauty_inventory',
                        ],
                    ],
                    'customer_records' => [
                        'name' => 'Customer Records',
                        'features' => [
                            'visit_history', 'preferred_stylist', 'before_after_photos', 'treatment_history',
                        ],
                    ],
                    'spa' => [
                        'name' => 'Spa',
                        'features' => [
                            'treatment_rooms', 'packages', 'memberships',
                        ],
                    ],
                ],
            ],
            'agrovets_hardware' => [
                'name' => 'Agrovets & Hardware',
                'description' => 'Livestock, farming supplies, hardware products, and contractor accounts.',
                'category' => 'industry',
                'icon' => 'tractor',
                'submodules' => [
                    'agrovet' => [
                        'name' => 'Agrovet',
                        'features' => [
                            'livestock', 'animal_medicines', 'vaccines', 'feeds', 'supplements',
                        ],
                    ],
                    'farming' => [
                        'name' => 'Farming',
                        'features' => [
                            'seeds', 'fertilizers', 'chemicals', 'irrigation_products',
                        ],
                    ],
                    'equipment' => [
                        'name' => 'Equipment',
                        'features' => [
                            'farm_tools', 'machinery', 'spare_parts',
                        ],
                    ],
                    'regulatory' => [
                        'name' => 'Regulatory',
                        'features' => [
                            'chemical_batch_tracking', 'expiry_dates', 'safety_documentation',
                        ],
                    ],
                    'hardware' => [
                        'name' => 'Hardware',
                        'features' => [
                            'paint', 'cement', 'steel', 'timber', 'plumbing', 'electrical', 'tools',
                        ],
                    ],
                    'services' => [
                        'name' => 'Services',
                        'features' => [
                            'cutting_services', 'paint_mixing', 'deliveries', 'contractor_accounts',
                        ],
                    ],
                ],
            ],
            'healthcare' => [
                'name' => 'Healthcare (HIS)',
                'description' => 'Complete Hospital Information System integrated with Pharmacy POS.',
                'category' => 'industry',
                'icon' => 'hospital',
                'submodules' => [
                    'reception' => [
                        'name' => 'Reception',
                        'features' => [
                            'patient_registration', 'returning_patients', 'patient_cards',
                            'national_id_capture', 'insurance_details', 'queue_management',
                            'appointment_scheduling', 'walk_in_registration', 'family_accounts',
                        ],
                    ],
                    'emr' => [
                        'name' => 'Electronic Medical Records',
                        'features' => [
                            'patient_demographics', 'medical_history', 'allergies', 'chronic_conditions',
                            'previous_diagnoses', 'clinical_notes', 'vital_signs', 'immunization_records',
                            'attachments',
                        ],
                    ],
                    'doctor' => [
                        'name' => 'Doctor Module',
                        'features' => [
                            'consultation_notes', 'diagnosis_icd', 'treatment_plans', 'prescriptions',
                            'follow_up_scheduling', 'referral_letters', 'sick_leave_notes', 'medical_certificates',
                        ],
                    ],
                    'nursing' => [
                        'name' => 'Nursing',
                        'features' => [
                            'triage', 'vital_signs', 'medication_administration',
                            'nursing_notes', 'ward_observations',
                        ],
                    ],
                    'laboratory' => [
                        'name' => 'Laboratory',
                        'features' => [
                            'lab_requests', 'sample_collection', 'barcode_labels', 'test_workflow',
                            'results_entry', 'result_verification', 'printable_reports',
                            'reference_ranges', 'critical_value_alerts', 'external_lab_integration',
                        ],
                    ],
                    'radiology' => [
                        'name' => 'Radiology',
                        'features' => [
                            'imaging_requests', 'xray', 'ct_scan', 'mri', 'ultrasound',
                            'image_attachments', 'radiologist_reports',
                        ],
                    ],
                    'pharmacy' => [
                        'name' => 'Pharmacy',
                        'features' => [
                            'drug_inventory', 'prescription_dispensing', 'otc_sales',
                            'controlled_drugs_register', 'batch_numbers', 'expiry_tracking',
                            'drug_interactions', 'generic_substitutions', 'stock_reordering',
                            'multi_store_pharmacy_inventory',
                        ],
                    ],
                    'billing' => [
                        'name' => 'Billing',
                        'features' => [
                            'consultation_billing', 'laboratory_billing', 'pharmacy_billing',
                            'procedure_billing', 'package_billing', 'insurance_billing',
                            'co_payments', 'deposits', 'refunds', 'credit_billing',
                        ],
                    ],
                    'insurance' => [
                        'name' => 'Insurance',
                        'features' => [
                            'insurance_companies', 'member_verification', 'claim_preparation',
                            'claim_tracking', 'claim_reconciliation', 'authorization_management',
                        ],
                    ],
                    'wards' => [
                        'name' => 'Wards',
                        'features' => [
                            'bed_management', 'admissions', 'transfers', 'discharges',
                            'ward_billing', 'nursing_assignments',
                        ],
                    ],
                    'theatre' => [
                        'name' => 'Theatre',
                        'features' => [
                            'surgery_scheduling', 'theatre_utilization', 'surgical_notes',
                            'consent_forms', 'operation_billing',
                        ],
                    ],
                    'maternity' => [
                        'name' => 'Maternity',
                        'features' => [
                            'anc_visits', 'delivery_records', 'newborn_records',
                            'postnatal_care', 'immunization_schedules',
                        ],
                    ],
                    'dental' => [
                        'name' => 'Dental',
                        'features' => [
                            'dental_charting', 'procedures', 'treatment_plans', 'xray_records',
                        ],
                    ],
                    'physiotherapy' => [
                        'name' => 'Physiotherapy',
                        'features' => [
                            'therapy_sessions', 'exercise_plans', 'progress_tracking', 'appointment_scheduling',
                        ],
                    ],
                    'administration' => [
                        'name' => 'Administration',
                        'features' => [
                            'medical_reports', 'clinical_statistics', 'ministry_of_health_reports',
                            'drug_utilization_reports', 'disease_surveillance_dashboards',
                        ],
                    ],
                ],
            ],
        ];
    }
}
