<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string("scout_first_name");
            $table->string("scout_last_name");
            $table->string("scout_father_name");
            $table->string("scout_mother_name");
            $table->string("scout_national_no");
            $table->string("scout_birthdate");
            $table->integer("scout_number");
            $table->string("scout_affiliation_date");
            $table->string("scout_title")->nullable();
            $table->string("scout_home_phone");
            $table->string("scout_mobile_phone");
            $table->string("scout_email");
            $table->string("scout_name_en");
            $table->string("scout_gender");
            $table->string("scout_marital_status");
            $table->string("scout_no_of_children");
            $table->string("scout_address");
            $table->string("scout_government");
            $table->string("scout_city");
            $table->string("scout_profile_picture")->nullable();
            $table->foreignId('regiment_id')->references('id')->on('regiments');
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
        Schema::dropIfExists('personal_infos');
    }
}