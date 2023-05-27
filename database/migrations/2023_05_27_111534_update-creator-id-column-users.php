<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCreatorIdColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign('users_creator_id_foreign');
            $table->unsignedBigInteger('creator_id')->nullable()->change();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade')->change();
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
            //
            //  $table->string('creator_id')->change();
            //  $table->dropForeign('creator_id');
        });
    }
}
