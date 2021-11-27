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
            $table->string('name', 100);
            $table->text('descripcion');
            $table->decimal('stock', 11, 3);
            $table->decimal('precio', 11, 2);
            $table->unsignedBigInteger('categories');
            $table->unsignedBigInteger('providers'); 
            $table->foreign('categories')->references('id')->on('categories');
            $table->foreign('providers')->references('id')->on('providers');
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
