<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificate_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->unique(); // CLR-2026-000001
            $table->string('type_code', 10);
            $table->string('certificate_type');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('full_name');
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('address')->nullable();
            $table->string('purok')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('purpose')->nullable();
            $table->string('valid_id_path')->nullable();
            $table->enum('status', [
                'pending',
                'processing',
                'ready',
                'claimed',
                'rejected'
            ])->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->foreignId('processed_by')->nullable()->constrained('users');
            $table->timestamp('claimed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_requests');
    }
};
