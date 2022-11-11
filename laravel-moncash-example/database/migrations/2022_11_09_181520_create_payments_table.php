<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->string('orderID')->nullable();
            $table->string('transactionID')->nullable();
            $table->dateTime('expiration')->nullable();
            $table->float('amount')->nullable();
            $table->float('cost')->nullable();
            $table->string('message', 100)->nullable();
            $table->string('payer', 15)->nullable();
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
