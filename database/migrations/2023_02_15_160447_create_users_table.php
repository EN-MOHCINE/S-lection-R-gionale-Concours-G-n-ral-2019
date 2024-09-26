<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('email', 36)->primary();
            $table->string('password');
            $table->string('fullName');
            $table->string('gender');
            $table->date('dateOfBirth');
            $table->integer('MobileNb');
            $table->string('photo');
            $table->integer('roleId');

            $table
                ->foreign('roleId')
                ->references('roleId')
                ->on('role')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('users');
    }
};