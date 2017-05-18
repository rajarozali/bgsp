<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Module extends Migration
{
       public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->nullable();;
            $table->string('link_name',100)->nullable();;
            $table->string('description', 500)->nullable();;
            $table->boolean('status')->nullable();;
            $table->timestamps();
        });
        Schema::create('module_albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->nullable();;
            $table->integer('Module_type_id')->nullable();;
            $table->integer('Module_id')->nullable();;
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
        Schema::drop('modules');
        Schema::drop('module_albums');
    }
}
