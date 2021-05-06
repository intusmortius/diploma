<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("author_id")->constrained('users')->onDelete("cascade");
            $table->string("name");
            $table->text("description");
            $table->text("about_worker")->nullable();
            $table->text("responsibilities")->nullable();
            $table->text("requirements")->nullable();
            $table->text("personal_skills")->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
