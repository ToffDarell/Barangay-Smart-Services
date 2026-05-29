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
        Schema::create('clearance_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 10); // CLR, IND, RES etc
            $table->decimal('price', 8, 2)->default(0);
            $table->boolean('allow_online_request')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clearance_types');
    }
};
