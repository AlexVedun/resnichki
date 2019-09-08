<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('avatar')->nullable();
            $table->boolean('is_avatar')->default(false);
            $table->bigInteger('prof_category_id')->unsigned()->default(1);
            $table->string('contact_name')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('mobile_1', 15)->nullable();
            $table->string('mobile_2', 15)->nullable();
            $table->string('mobile_3', 15)->nullable();
            $table->string('viber', 15)->nullable();
            $table->string('whats_up', 15)->nullable();
            $table->string('telegram', 15)->nullable();
            $table->string('skype', 50)->nullable();
            $table->string('vkontakte', 50)->nullable();
            $table->string('web_site', 255)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('prof_category_id')->references('id')->on('prof_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
