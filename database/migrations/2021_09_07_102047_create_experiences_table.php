<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId("scout_id")->references("id")->on("personal_infos")->onDelete('cascade');
            $table->string("scout_experience");
            $table->string("scout_experience_details");
            $table->string("scout_experience_start_date");
            $table->string("scout_experience_end_date");
            $table->string("scout_experience_place");
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
        Schema::dropIfExists('experiences');
    }
}
