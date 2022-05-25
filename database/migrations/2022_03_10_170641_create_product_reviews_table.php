<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('product_id')->unsignedBiginteger();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBiginteger('user_id')->unsignedBiginteger();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('rate');
            $table->text('content')->nullable();
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
        Schema::dropIfExists('product_reviews');
    }
}
