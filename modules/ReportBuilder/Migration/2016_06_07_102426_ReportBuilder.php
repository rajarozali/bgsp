<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ReportBuilder extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    #####start_up_function#####
        Schema::create('report_builders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('reporttext');
            $table->timestamps();
        });
		        /**
         * role permission
         */
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'view_ReportBuilder','display_name' => 'view_ReportBuilder')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'add_ReportBuilder','display_name' => 'add_ReportBuilder')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'edit_ReportBuilder','display_name' => 'edit_ReportBuilder')
        );
        DB::table('permission_role')->insert(
            array('permission_id' =>$perm_id,'role_id' => 1)
        );
        $perm_id=DB::table('permissions')->insertGetId(
            array('name' => 'delete_ReportBuilder','display_name' => 'delete_ReportBuilder')
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
        DB::table('permissions')->where('name',  'view_ReportBuilder')->delete();
        DB::table('permissions')->where('name',  'add_ReportBuilder')->delete();
        DB::table('permissions')->where('name',  'edit_ReportBuilder')->delete();
        DB::table('permissions')->where('name',  'delete_ReportBuilder')->delete();
        ######remove primary key
        Schema::drop('report_builders');
     #####end_down_function#####
    }
}
