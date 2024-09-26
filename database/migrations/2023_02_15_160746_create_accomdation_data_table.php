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
        Schema::create('accomdationdata', function (Blueprint $table) {
            $table->integer('accomndationId')->primary();
            $table->string('userEmail');
            $table
                ->foreign('userEmail')
                ->references('email')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('starDate');
            $table->date('endDate');
            $table->string('addedByEmail');
            $table->integer('accomndationTypeId');
            $table
                ->foreign('accomndationTypeId')
                ->references('accomndationTypeId')
                ->on('accomdationtype')
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
        Schema::dropIfExists('accomdationdata');
    }
};