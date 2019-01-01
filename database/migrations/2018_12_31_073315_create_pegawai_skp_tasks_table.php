<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiSkpTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_skp_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('skp_task_id')->unsigned()->index();
            $table->integer('pegawai_id')->unsigned()->index();
            $table->timestamps('tgl_penunjukan');
            $table->timestamps('tgl_selesai');
            $table->timestamps('tgl_tunda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai_skp_tasks');
    }
}
