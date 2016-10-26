<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('content')->nullable();
            $table->text('description');
            $table->string('thumbnail',255)->nullable();
            $table->text('slugify');
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('struct_data')->nullable();
            $table->integer('views')->default(0);
            $table->enum('status',['public', 'draft', 'delete']);
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
