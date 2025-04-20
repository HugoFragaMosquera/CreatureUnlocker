<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user_criaturas', function (Blueprint $table) {
            $table->unsignedInteger('orden_adquisicion')->default(0);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('user_criaturas', function (Blueprint $table) {
            $table->dropColumn('orden_adquisicion');
        });
    }
};
