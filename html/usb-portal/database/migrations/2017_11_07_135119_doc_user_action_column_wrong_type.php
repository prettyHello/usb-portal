<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocUserActionColumnWrongType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('document_user', 'action')) {
            Schema::table('document_user', function (Blueprint $table) {
                $table->dropColumn(["action"]);
            });
        }


        Schema::table('document_user', function (Blueprint $table) {
            $table->string('action')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_user', function (Blueprint $table) {
            $table->dropColumn(["action"]);
        });

        Schema::table('document_user', function (Blueprint $table) {
            $table->dateTime('action');
        });
    }
}