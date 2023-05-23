<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViewsTeachersUserDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          \DB::statement("CREATE VIEW view_teachers_user_data AS
                SELECT 

                *
            FROM users
                WHERE type= 'teacher'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         \DB::statement("DROP VIEW IF EXISTS `view_teachers_user_data`");
        //
    }
}
