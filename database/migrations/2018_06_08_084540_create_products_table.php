<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

    /**
     * Class CreateProductsTable
     */
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

            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->text('ingredients', 2000);
            $table->float('price')->default(0);
            $table->string('currency', 5)->default('GBP');
            $table->bigInteger('brand_id', 100)->nullable();
            $table->string('size', 6)->nullable()->default(null);
            $table->string('size_unit', 6)->nullable()->default(null);

            $table->integer('product_type_id')->unsigned();

            $table->string('url', 256)->nullable();
            $table->tinyInteger('status')->default(1);

            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('updated_by')->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

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
