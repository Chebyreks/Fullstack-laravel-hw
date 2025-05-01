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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('sum_price');
            $table->foreignId('delivery_agent_id');            
        });

        Schema::create('order_goods', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->foreignId('good_id');
            $table->foreignId('order_id');       
        });

        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
        });

        Schema::create('delivery_agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
