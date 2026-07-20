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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('invid', 40)->unique();
            $table->decimal('amount', 28, 8)->default(0);
            $table->decimal('paid', 28, 8)->default(0);
            $table->tinyInteger('status')->default(0)->comment('0: unpaid, 1: paid, 2: partial');
            $table->string('invoice_for', 100)->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
