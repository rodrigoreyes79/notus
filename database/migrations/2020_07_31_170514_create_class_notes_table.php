<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_notes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("subject_id");
            $table->bigInteger("student_id");
            $table->string("topic");
            $table->string("objective");
            $table->longText("notes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_notes');
    }
}
