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
            $table->string('post_title')->unique();
            $table->longText('post_content');
            $table->longText('content_html')->nullable();            
            $table->integer('post_category_id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->string('slug')->unique()->index();
            $table->text('excerpt')->nullable();
            $table->bigInteger('views')->default(0);
            $table->boolean('published')->default(false);
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
