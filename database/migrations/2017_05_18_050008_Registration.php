<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Registration extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    #####start_up_function#####
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('email', 50);
            $table->string('oneimage', 30);
            ####, 30);
            $table->timestamps();
        });
        DB::table("modules")->insert(
            array("name" =>"Registration","link_name" => "registrations","status"=>1,"created_at"=>"2017-05-18 05:00:08")
        );
		        /**
         * role permission
         */
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_Registration','display_name' => 'view_Registration')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'add_Registration','display_name' => 'add_Registration')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'edit_Registration','display_name' => 'edit_Registration')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'delete_Registration','display_name' => 'delete_Registration')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
     #####end_up_function#####
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     #####start_down_function#####
        DB::table('permissions')->where('name',  'view_Registration')->delete();
        DB::table('permissions')->where('name',  'add_Registration')->delete();
        DB::table('permissions')->where('name',  'edit_Registration')->delete();
        DB::table('permissions')->where('name',  'delete_Registration')->delete();
        ######remove primary key
        Schema::drop('registrations');
     #####end_down_function#####
    }
}
