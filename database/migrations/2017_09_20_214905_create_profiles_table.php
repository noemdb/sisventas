<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('url_img',255)->nullable();
            $table->enum('is_admin', ['Administrador', 'Usuario'])->default('Usuario');
            $table->enum('is_user1', ['1', null])->nullable();
            $table->enum('is_user2', ['2', null])->nullable();
            $table->enum('is_user3', ['3', null])->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
