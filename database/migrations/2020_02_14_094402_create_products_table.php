<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('picture')->nullable();
            $table->string('name');
            $table->integer('qty');
            $table->dateTime('purchased_date');
            $table->dateTime('expiry_date')->nullable();
            $table->float('amount', 8, 2);
            $table->integer('category_id')->unsigned()->nullable()->references('id')->on('categories');
            $table->integer('brand_id')->unsigned()->nullable()->references('id')->on('brands');
            $table->integer('company_id')->unsigned()->references('id')->on('companies');
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
        Schema::dropIfExists('products');
    }
}
