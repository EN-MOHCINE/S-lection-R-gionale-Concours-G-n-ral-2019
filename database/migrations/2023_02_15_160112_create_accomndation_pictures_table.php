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
        Schema::create('accomdationpictures', function (Blueprint $table) {
            $table->integer('pictureId')->primary();
            $table->integer('accomndationTypeId');
            $table
                ->foreign('accomndationTypeId')
                ->references('accomndationTypeId')
                ->on('accomdationtype')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('picturePath');
            $table->string('pictureTitle');
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
        Schema::dropIfExists('accomdationpictures');
    }
};