<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTargetSelesaiAndPrgress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawai_skp_tasks', function (Blueprint $table) {
            $table->timestamp('target_selesai')->useCurrent();
            $table->string('progres')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawai_skp_tasks', function (Blueprint $table) {
            $table->dropColumn('target_selesai');
            $table->dropColumn('progres');
        });
    }
}
