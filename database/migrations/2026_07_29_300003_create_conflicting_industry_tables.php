<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = [
            'rh_dining_tables',
            'rh_hotel_rooms',
            'healthcare_patient_records',
            'healthcare_clinical_appointments',
        ];

        foreach ($tables as $name) {
            if (Schema::hasTable($name)) {
                continue;
            }

            Schema::create($name, function (Blueprint $table) {
                $table->id();
                $table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
                $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
                $table->string('name')->nullable();
                $table->string('code', 100)->nullable();
                $table->string('status', 50)->default('active');
                $table->json('data')->nullable();
                $table->json('metadata')->nullable();
                $table->boolean('is_active')->default(true);
                $table->softDeletes();
                $table->timestamps();
                $table->index(['tenant_id', 'status']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('healthcare_clinical_appointments');
        Schema::dropIfExists('healthcare_patient_records');
        Schema::dropIfExists('rh_hotel_rooms');
        Schema::dropIfExists('rh_dining_tables');
    }
};
