<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seaman_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cv_id')->constrained('cvs')->onDelete('cascade');

            $table->string('vessel_name');         // Nama kapal
            $table->string('vessel_type')->nullable(); // Jenis kapal (tanker, cargo, tugboat)
            $table->string('flag')->nullable();    // Negara bendera
            $table->string('rank')->nullable();    // Jabatan (AB, Oiler, 3/O, 2/E, dsb)
            $table->integer('gt')->nullable();     // Gross Tonnage
            $table->integer('dwt')->nullable();    // Deadweight tonnage
            $table->string('engine')->nullable();  // Tipe mesin
            $table->date('sign_on')->nullable();   // Tanggal naik
            $table->date('sign_off')->nullable();  // Tanggal turun
            $table->string('company')->nullable(); // Perusahaan / manning agency
            $table->text('remarks')->nullable();   // Keterangan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seaman_experiences');
    }
};
