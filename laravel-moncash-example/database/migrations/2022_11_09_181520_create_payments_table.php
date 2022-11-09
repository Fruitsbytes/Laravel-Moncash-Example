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
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->text('redirectionUrl');
            $table->json('cart');
            $table->string('orderID');
            $table->string('transactionID');
            $table->dateTime('expiration');
            $table->float('amount');
            $table->float('cost');
            $table->string('message', 100);
            $table->string('payer', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
