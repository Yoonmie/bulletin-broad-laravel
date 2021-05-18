<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            // $table->id();
            // $table->string('title');
            // $table->longText('description');
            // $table->integer('status');
            // $table->foreignId('created_user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('updated_user_id')->constrained()->onDelete('cascade');
            // $table->integer('deleted_user_id')->nullable();
            // $table->timestamps('created_at');
            // $table->timestamps('updated_at');
            // $table->timestamps('deleted_at');

            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->integer('status');
            $table->integer('created_user_id');
            $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_user_id')->nullable();
            $table->foreign('updated_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('deleted_user_id')->nullable();
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->useCurrent();
            $table->datetime('deleted_at')->nullable();
            $table->unique(['title','deleted_at']);
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
