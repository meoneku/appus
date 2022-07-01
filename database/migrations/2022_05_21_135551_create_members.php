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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_name', 128);
            $table->bigInteger('member_number')->length(11)->unsigned();
            $table->unsignedBigInteger('major_id');
            $table->integer('year')->length(4)->unsigned();
            $table->char('gender', 10);
            $table->char('phonenumber', 20);
            $table->string('addres', 255);
            $table->string('photo',200)->default('member-photo/default.png');
            $table->string('desc', 255);
            $table->timestamps();

            $table->foreign('major_id')->references('id')->on('majors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
