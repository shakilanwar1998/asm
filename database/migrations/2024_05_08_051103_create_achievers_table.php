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
        Schema::create('achievers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('member_id')
                ->index()
                ->constrained('members')
                ->cascadeOnDelete();
            $table->integer('position')->default(0);
            $table->tinyInteger('type')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievers');
    }
};
