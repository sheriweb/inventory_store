<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

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

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->string('sku')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_slug')->nullable();
            $table->double('price')->nullable();
            $table->double('retail_price')->nullable();
            $table->double('refurbished_price')->nullable();
            $table->double('sale_refurbished_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('refurbished_quantity')->nullable();
            $table->string('product_section',100)->nullable();

            $table->string('brand',150)->nullable();
            $table->string('weight',150)->nullable();
            $table->string('dimensions',100)->nullable();

            $table->string('capacity',100)->nullable();
            $table->string('capacity_watts',100)->nullable();
            $table->string('technology',100)->nullable();
            $table->string('processing_speed',100)->nullable();
            $table->string('no_of_ports',100)->nullable();
            $table->string('memory',100)->nullable();
            $table->string('storage',100)->nullable();
            $table->string('screen_size',100)->nullable();
            $table->string('form_factor',150)->nullable();
            $table->string('generation',100)->nullable();
            $table->string('product_type',100)->nullable();
            $table->string('cache_type',150)->nullable();
            $table->string('screen_resolution',150)->nullable();

            $table->longText('description')->nullable();
            $table->longText('specification')->nullable();
            $table->longText('read_before_order')->nullable();

            $table->tinyInteger('status')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('store_id')->references('id')->on('stores')->cascadeOnUpdate()->cascadeOnDelete();

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
