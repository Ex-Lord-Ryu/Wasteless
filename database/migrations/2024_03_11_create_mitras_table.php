<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bisnis');
            $table->string('nama_pic');
            $table->string('email')->unique();
            $table->string('jenis_makanan');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->string('banyak_penjualan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitras');
    }
};
