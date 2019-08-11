<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('offer_details_id')->unsigned()->nullable();
            $table->enum('type', ['photo', 'video', 'audio']);
            $table->string('path_to_file');
            $table->timestamps();

            $table->foreign('offer_details_id')->references('id')->on('offer_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_media');
    }
}
