<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
         
            $table->string('username','24')->after('name')->unique()->nullable();
            $table->enum('type',['user','admin','super-admin'])->after('remember_token')->default('user');
            $table->enum('status',['active','inactive','bloked'])->after('type')->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('username');
          $table->dropColumn('type');
          $table->dropColumn('status');
        });
    }
}
