<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->foreignId('role_id')->constrained();
            $table->string('worker_specialization')->nullable();
            $table->string('worker_group')->nullable();
            $table->string('worker_cathedra')->nullable();
            $table->string('worker_faculty')->nullable();
            $table->string('customer_work_place')->nullable();
            $table->text('about')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users'['worker_specialization']);
        Schema::drop('users'['customer_work_place']);
        // Schema::drop('users'['role_id']);
        Schema::drop('users'['about']);
    }
}
