<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId("scout_id")->references("id")->on("personal_infos")->onDelete('cascade');
            $table->string("scout_education_pace");
            $table->string("scout_education_name");
            $table->string("scout_education_start_date");
            $table->string("scout_education_end_date")->nullable();
            $table->string("scout_education_year")->nullable();
            $table->string("scout_education_place");
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
        Schema::dropIfExists('education');
    }
}
