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
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('sku');
            $table->string('image');
            $table->decimal('cost_price',8,2); // name cost_price and digit set 8 and after number 2 decimal point
            $table->decimal('retail_price',8,2);
            $table->string('year');
            $table->boolean('status')->default(App\Models\Product::STATUS_ACTIVE);
            $table->text('description');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //if use cascade then delete permanently
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade'); 
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
