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
            $table->unsignedBigInteger('mark_id');
            $table->text('name');
            $table->text('description')->nullable();
            $table->double('price', 20, 2)->default(0);
            $table->double('shipping_price', 20, 2)->default(0);
            $table->double('return_price', 20, 2)->default(0);
            $table->text('features')->nullable();
            $table->text('specifications')->nullable();
            $table->text('main_image')->nullable();
            $table->text('secondary_images')->nullable();
            $table->integer('stock')->default(0);
            $table->string('slug')->unique();
            $table->boolean('active')->default(true);
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
