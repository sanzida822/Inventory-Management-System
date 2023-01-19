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
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->bigInteger('invoice_id')->unsigned()->change();
            $table->bigInteger('category_id')->unsigned()->change();
            $table->bigInteger('product_id')->unsigned()->change();


            $table->foreign('invoice_id')->references('id')
            ->on('invoices')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')
            ->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')
            ->on('products')->onDelete('cascade')->onUpdate('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_details', function (Blueprint $table) {
            //
        });
    }
};