<?php

class CreateDomainTables
{
    public function up(\PDO $pdo): void
    {
        // Shared product catalog
        $pdo->exec('CREATE TABLE IF NOT EXISTS products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            category_id INTEGER DEFAULT NULL,
            brand_id INTEGER DEFAULT NULL,
            name VARCHAR(255) NOT NULL,
            sku VARCHAR(100) DEFAULT NULL,
            barcode VARCHAR(100) DEFAULT NULL,
            description TEXT DEFAULT NULL,
            unit VARCHAR(50) DEFAULT "pcs",
            cost_price DECIMAL(12,2) DEFAULT 0,
            selling_price DECIMAL(12,2) DEFAULT 0,
            tax_rate DECIMAL(5,2) DEFAULT 0,
            stock_quantity DECIMAL(12,3) DEFAULT 0,
            reorder_level DECIMAL(12,3) DEFAULT 0,
            image_url VARCHAR(500) DEFAULT NULL,
            is_active INTEGER DEFAULT 1,
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS product_categories (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            parent_id INTEGER DEFAULT NULL,
            name VARCHAR(255) NOT NULL,
            description TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS brands (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            name VARCHAR(255) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Sales domain
        $pdo->exec('CREATE TABLE IF NOT EXISTS sales (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            customer_id INTEGER DEFAULT NULL,
            user_id INTEGER DEFAULT NULL,
            sale_number VARCHAR(50) NOT NULL,
            sale_type VARCHAR(50) DEFAULT "retail",
            status VARCHAR(50) DEFAULT "completed",
            subtotal DECIMAL(12,2) DEFAULT 0,
            tax_amount DECIMAL(12,2) DEFAULT 0,
            discount_amount DECIMAL(12,2) DEFAULT 0,
            total_amount DECIMAL(12,2) DEFAULT 0,
            amount_paid DECIMAL(12,2) DEFAULT 0,
            amount_due DECIMAL(12,2) DEFAULT 0,
            notes TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS sale_items (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            sale_id INTEGER NOT NULL,
            product_id INTEGER DEFAULT NULL,
            product_name VARCHAR(255) NOT NULL,
            quantity DECIMAL(12,3) NOT NULL,
            unit_price DECIMAL(12,2) NOT NULL,
            discount DECIMAL(12,2) DEFAULT 0,
            tax_amount DECIMAL(12,2) DEFAULT 0,
            total DECIMAL(12,2) NOT NULL,
            FOREIGN KEY (sale_id) REFERENCES sales(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS sale_payments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            sale_id INTEGER NOT NULL,
            payment_method VARCHAR(50) NOT NULL,
            amount DECIMAL(12,2) NOT NULL,
            reference VARCHAR(255) DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (sale_id) REFERENCES sales(id)
        )');

        // Customers
        $pdo->exec('CREATE TABLE IF NOT EXISTS customers (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) DEFAULT NULL,
            phone VARCHAR(50) DEFAULT NULL,
            address TEXT DEFAULT NULL,
            credit_limit DECIMAL(12,2) DEFAULT 0,
            loyalty_points INTEGER DEFAULT 0,
            customer_group_id INTEGER DEFAULT NULL,
            date_of_birth DATE DEFAULT NULL,
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Suppliers
        $pdo->exec('CREATE TABLE IF NOT EXISTS suppliers (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) DEFAULT NULL,
            phone VARCHAR(50) DEFAULT NULL,
            address TEXT DEFAULT NULL,
            tax_number VARCHAR(100) DEFAULT NULL,
            balance DECIMAL(12,2) DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Employees
        $pdo->exec('CREATE TABLE IF NOT EXISTS employees (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            user_id INTEGER DEFAULT NULL,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) DEFAULT NULL,
            phone VARCHAR(50) DEFAULT NULL,
            position VARCHAR(100) DEFAULT NULL,
            salary DECIMAL(12,2) DEFAULT 0,
            commission_rate DECIMAL(5,2) DEFAULT 0,
            hire_date DATE DEFAULT NULL,
            is_active INTEGER DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Invoices
        $pdo->exec('CREATE TABLE IF NOT EXISTS invoices (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            customer_id INTEGER DEFAULT NULL,
            sale_id INTEGER DEFAULT NULL,
            invoice_number VARCHAR(50) NOT NULL,
            invoice_type VARCHAR(50) DEFAULT "standard",
            status VARCHAR(50) DEFAULT "draft",
            subtotal DECIMAL(12,2) DEFAULT 0,
            tax_amount DECIMAL(12,2) DEFAULT 0,
            total_amount DECIMAL(12,2) DEFAULT 0,
            due_date DATE DEFAULT NULL,
            notes TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Healthcare - Patients
        $pdo->exec('CREATE TABLE IF NOT EXISTS patients (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            patient_number VARCHAR(50) NOT NULL,
            first_name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            date_of_birth DATE DEFAULT NULL,
            gender VARCHAR(20) DEFAULT NULL,
            phone VARCHAR(50) DEFAULT NULL,
            email VARCHAR(255) DEFAULT NULL,
            national_id VARCHAR(100) DEFAULT NULL,
            address TEXT DEFAULT NULL,
            insurance_provider VARCHAR(255) DEFAULT NULL,
            insurance_number VARCHAR(100) DEFAULT NULL,
            blood_group VARCHAR(10) DEFAULT NULL,
            allergies TEXT DEFAULT NULL,
            medical_history TEXT DEFAULT NULL,
            emergency_contact TEXT DEFAULT NULL,
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Healthcare - Appointments
        $pdo->exec('CREATE TABLE IF NOT EXISTS appointments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            patient_id INTEGER DEFAULT NULL,
            customer_id INTEGER DEFAULT NULL,
            staff_id INTEGER DEFAULT NULL,
            appointment_type VARCHAR(100) DEFAULT NULL,
            status VARCHAR(50) DEFAULT "scheduled",
            scheduled_at DATETIME NOT NULL,
            duration_minutes INTEGER DEFAULT 30,
            notes TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (patient_id) REFERENCES patients(id)
        )');

        // Restaurant tables
        $pdo->exec('CREATE TABLE IF NOT EXISTS restaurant_tables (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            table_number VARCHAR(20) NOT NULL,
            capacity INTEGER DEFAULT 4,
            status VARCHAR(50) DEFAULT "available",
            section VARCHAR(100) DEFAULT NULL,
            qr_code VARCHAR(255) DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Hotel rooms
        $pdo->exec('CREATE TABLE IF NOT EXISTS hotel_rooms (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            room_number VARCHAR(20) NOT NULL,
            room_type VARCHAR(100) DEFAULT NULL,
            floor INTEGER DEFAULT NULL,
            rate_per_night DECIMAL(12,2) DEFAULT 0,
            status VARCHAR(50) DEFAULT "available",
            amenities TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Warehouses
        $pdo->exec('CREATE TABLE IF NOT EXISTS warehouses (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            name VARCHAR(255) NOT NULL,
            code VARCHAR(50) DEFAULT NULL,
            address TEXT DEFAULT NULL,
            is_active INTEGER DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        // Expenses
        $pdo->exec('CREATE TABLE IF NOT EXISTS expenses (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            category VARCHAR(100) DEFAULT NULL,
            description TEXT DEFAULT NULL,
            amount DECIMAL(12,2) NOT NULL,
            expense_date DATE NOT NULL,
            payment_method VARCHAR(50) DEFAULT NULL,
            reference VARCHAR(255) DEFAULT NULL,
            created_by INTEGER DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');
    }

    public function down(\PDO $pdo): void
    {
        $tables = ['expenses', 'warehouses', 'hotel_rooms', 'restaurant_tables', 'appointments',
            'patients', 'invoices', 'employees', 'suppliers', 'customers', 'sale_payments',
            'sale_items', 'sales', 'brands', 'product_categories', 'products'];
        foreach ($tables as $table) {
            $pdo->exec("DROP TABLE IF EXISTS {$table}");
        }
    }
}
