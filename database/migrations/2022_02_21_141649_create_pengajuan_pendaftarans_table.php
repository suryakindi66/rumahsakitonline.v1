<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->text('nama_pasien');
            $table->string('nohp', 50);
            $table->string('waktucontrol');
            $table->text('gender');
            $table->text('namadokter');
            $table->text('alamat');
            $table->text('status');
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
        Schema::dropIfExists('pengajuan_pendaftarans');
    }
};
