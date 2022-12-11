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
            $table->id()->autoIncrement();
            $table->foreignId('category_id')->default(0);
            $table->string('name')->unique();
            $table->string('image');
            $table->text('detail');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('quantity');
            $table->integer('ram');
            $table->string('cpu');
            $table->integer('ssd');
            $table->string('use');
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
};
