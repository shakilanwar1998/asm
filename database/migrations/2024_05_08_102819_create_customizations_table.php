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
        Schema::create('customizations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('module_name')->nullable();
            $table->string('value')->nullable();
            $table->tinyInteger('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customizations');
    }
};
