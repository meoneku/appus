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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->char('isbn', 20);
            $table->string('title', 255);
            $table->string('book_number', 64);
            $table->unsignedBigInteger('category_id');
            $table->string('publisher', 200);
            $table->string('author', 128);
            $table->string('rack', 64);
            $table->string('cover', 200)->default('book-covers/no-cover-image.jpg');
            $table->integer('public_year')->length(4)->unsigned();
            $table->integer('stock')->length(4)->unsigned();
            $table->integer('status')->length(4)->unsigned();
            $table->text('desc');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
