<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_ad', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('cat_id');
            $table->integer('subcat_id');
            $table->string('title');
            $table->string('feature')->nullable();
            $table->string('keyword');
            $table->float('price');
            $table->integer('city');
            $table->string('seller_name',50)->nullable();
            $table->string('seller_email',50)->nullable();
            $table->string('seller_phone',15)->nullable();
            $table->string('seller_whatsapp',15)->nullable();
            $table->text('image')->nullable();
            $table->longText('description')->nullable();
            $table->integer('package');
            $table->float('amount');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('payment_id',100)->nullable();
            $table->string('order_id',100)->nullable();
            $table->string('active_status',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary_ad');
    }
};
