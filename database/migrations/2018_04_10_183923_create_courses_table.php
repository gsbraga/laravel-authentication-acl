<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('moodle_id')->unsigned();
            $table->string('name');
            $table->string('fullname');
            $table->boolean('activated')->default(0);
            $table->boolean('protected')->default(0);
            $table->timestamps();

            // foreign keys
            $table->foreign('moodle_id')
                ->references('id')->on('moodles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
