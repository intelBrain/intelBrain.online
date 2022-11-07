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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_brand');
            $table->string('product_description', 3000);
            $table->string('product_details', 2000);
            $table->string('no_of_products')->default(0);
            $table->string('discount');
            $table->string('product_old_price');
            $table->string('product_new_price');
            $table->string('active')->default(0);
            $table->string('rating')->default(0);
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete("NO ACTION");
            /* For Creating Current Timestamp */
            $table->timestamp('created_at')->useCurrent();
            /* For Updating */
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
};
