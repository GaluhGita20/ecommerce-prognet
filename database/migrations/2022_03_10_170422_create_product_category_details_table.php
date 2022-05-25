<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('product_id')->unsignedBiginteger();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBiginteger('category_id')->unsignedBiginteger();
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
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
        Schema::dropIfExists('product_category_details');
    }
}
