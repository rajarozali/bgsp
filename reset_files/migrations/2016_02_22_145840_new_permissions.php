<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * user permission
         */
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_user','display_name' => 'view_user')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'add_user','display_name' => 'add_user')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'edit_user','display_name' => 'edit_user')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'delete_user','display_name' => 'delete_user')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        /**
         * role permission
         */
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_role','display_name' => 'view_role')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'add_role','display_name' => 'add_role')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'edit_role','display_name' => 'edit_role')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'delete_role','display_name' => 'delete_role')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );

        /**
         * permission permission
         */
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_permission','display_name' => 'view_permission')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'add_permission','display_name' => 'add_permission')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'edit_permission','display_name' => 'edit_permission')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'delete_permission','display_name' => 'delete_permission')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );



        #####module permissions
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_module','display_name' => 'view_module')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'add_module','display_name' => 'add_module')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'edit_module','display_name' => 'edit_module')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'delete_module','display_name' => 'delete_module')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );

        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'disable_module','display_name' => 'disable_module')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );


        #####crud_builrder permissions
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_crud_builder','display_name' => 'view_crud_builder')
        );
		DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
		######relation permissions
		$perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_relation','display_name' => 'view_relation')
        );
		DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        ######Activity Log permissions
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'delete_activity_logs','display_name' => 'delete_activity_logs')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_activity_log','display_name' => 'view_activity_log')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );

        
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
