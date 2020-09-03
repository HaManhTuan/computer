<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->integer('category_id')->unsigned()->index();
            $table->string('description');
            $table->integer('status');
            $table->string('image');
            $table->string('price');
            $table->string('promotional_price');
            $table->string('sale');
            $table->string('count')->nullable();
            $table->string('content');
            $table->string('infor')->nullable();
            $table->integer('buy_count')->default('0');
            $table->integer('count_view')->default('0');
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')->on('category')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
