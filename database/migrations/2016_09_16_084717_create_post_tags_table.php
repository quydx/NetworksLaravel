<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_post')->unsigned();
            $table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('id_tag')->unsigned();
            $table->foreign('id_tag')->references('id')->on('tags')->onDelete('cascade');
            $table->enum('status',['public', 'delete']);
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
        Schema::dropIfExists('post_tags');
    }
}
