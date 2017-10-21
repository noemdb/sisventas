<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoggsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loggs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('env')->nullable();
            $table->string('auth_user')->nullable();
            $table->string('ip')->nullable();
            $table->string('message', 500)->nullable();
            $table->string('sql', 500)->nullable();
            $table->string('bindings', 500)->nullable();
            $table->integer('time')->nullable();
            $table->enum('level', [
                'CREATE',
                'UPDATE',
                'DEBUG',
                'INFO',
                'NOTICE',
                'WARNING',
                'ERROR',
                'CRITICAL',
                'ALERT',
                'EMERGENCY'
            ])->default('INFO');
            $table->text('context')->nullable();
            $table->text('extra')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loggs');
    }
}
