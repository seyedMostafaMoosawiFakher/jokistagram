<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJokesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jokes', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->text('body');
            $table->boolean('status')->nullable($value=true)->default(1);
            
            //  آن سیگند کار نکرد بعدا کار کرد
            $table->unsignedBigInteger('user_id');
            // $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            // اینها لازم نشد، بدون اینها و با متد ور این مشکل پیجینیت حل شد. 
            // $table->unsignedBigInteger('like_id');
            // $table->foreign('like_id')->references('id')->on('likes');

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
        Schema::dropIfExists('jokes');
    }
}
