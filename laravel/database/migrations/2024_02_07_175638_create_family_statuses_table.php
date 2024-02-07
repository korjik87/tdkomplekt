<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('status', ['single', 'married', 'divorced', 'widower']);
            $table->bigInteger('customer_id');
            $table->unique(['customer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_statuses');
    }
};
