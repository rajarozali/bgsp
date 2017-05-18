<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first',100)->nullable();;
            $table->string('second', 100)->nullable();;
            $table->smallInteger('relation_type')->nullable();;
            $table->string('second_field_name', 100)->nullable();;
            $table->text('merge_folder')->nullable();;
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
        Schema::drop('relation_modules');
    }
}
