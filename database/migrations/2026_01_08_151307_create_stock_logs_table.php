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
        Schema::create('stock_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->nullable();
            $table->enum('tipe', ['IN', 'OUT']);
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('menu_id')
                ->references('id')->on('menus')
                ->nullOnDelete();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_logs');
    }
};
