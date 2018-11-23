<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('reply');
            $table->text('comment');
            $table->boolean('approved');
            $table->integer('wishlist_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('comments', function ($table) {
            $table->foreign('wishlist_id')->references('id')->on('lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['wishlist_id']);
        });
        Schema::dropIfExists('comments');
    }
}
