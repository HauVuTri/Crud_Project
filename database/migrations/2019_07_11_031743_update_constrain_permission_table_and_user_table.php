<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateConstrainPermissionTableAndUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id_permission')->unsigned()->nullable(false)->default('1');
            $table->foreign('id_permission')->references('id')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table( "users", function( $table )
        {
            $table->dropForeign('users_id_permission_foreign');
            $table->dropColumn('id_permission');
        });
    }
}

