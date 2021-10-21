<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId("scout_id")->references("id")->on("personal_infos")->onDelete('cascade');
            $table->string("scout_current_work");
            $table->string("scout_current_work_details");
            $table->string("scout_current_work_start_date");
            $table->string("scout_cururent_work_place");
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
        Schema::dropIfExists('current_works');
    }
}
