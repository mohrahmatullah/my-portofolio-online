<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPortofolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_portofolio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_category');
            $table->string('title');
            $table->string('slug');
            $table->string('content');
            $table->string('image');
            $table->string('gallery');
            $table->string('client');
            $table->string('project_date');
            $table->string('project_url');
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
        Schema::dropIfExists('tbl_portofolio');
    }
}
