<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_vacancy', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tag_id")->constrained("tags")->onDelete("cascade");
            $table->foreignId("vacancy_id")->constrained("vacancies")->onDelete("cascade");
            $table->timestamps();

            $table->unique(["tag_id", "vacancy_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_vacancy');
    }
}
