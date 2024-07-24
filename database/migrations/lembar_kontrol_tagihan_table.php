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
        Schema::create('lembar_kontrol', function (Blueprint $table) {
            $table->id(); 
            $table->string('no_kontrak'); // or SPK
            $table->year('tahun_anggaran'); 
            // $table->string('jenis_pengeluaran');
            // $table->enum('mata_anggaran', ['53', '52']);
            $table->string('sub_satker');
            $table->string('pic_vendor');
            // $table->string('jabatan_pic_vendor');
            // $table->string('pt_vendor');
            // $table->string('npwp');
            // $table->text('alamat_vendor');
            // $table->date('expired_kontrak');
            // $table->string('nilai_kontrak');
            // $table->string('jumlah_tagihan');
            $table->text('uraian_tagihan')->nullable();
            // $table->string('pengantar_dokumen');
            $table->string('file')->nullable();
            // $table->enum('kwitansi_ls', ['ada', 'tdk']);
            // $table->text('kwitansi_ls_ket')->nullable();;
            // $table->enum('skb_sktd', ['ada', 'tdk']);
            $table->string('nomor_skb_sktd')->nullable();
            // $table->enum('efaktur', ['ada', 'tdk']);
            // $table->text('efaktur_ket')->nullable();;
            // $table->enum('spm_spp', ['ada', 'tdk']);
            // $table->text('spm_spp_ket')->nullable();;
            // $table->enum('ssp', ['ada', 'tdk']);
            // $table->text('ssp_ket')->nullable();;
            // $table->enum('karwas', ['ada', 'tdk']);
            // $table->text('karwas_ket')->nullable();;
            // $table->enum('catatan_simak', ['ada', 'tdk']);
            // $table->text('catatan_simak_ket')->nullable();;
            // $table->enum('sptjm', ['ada', 'tdk']);
            // $table->text('sptjm_ket')->nullable();;
            // $table->enum('kwitansi_dgn_npwp', ['ada', 'tdk']);
            // $table->text('kwitansi_dgn_npwp_ket')->nullable();; 
            // $table->enum('faktur_barang', ['ada', 'tdk']);
            // $table->text('faktur_barang_ket')->nullable();;
            // $table->enum('ba_pembayaran', ['ada', 'tdk']);
            // $table->text('ba_pembayaran_ket')->nullable();;
            // $table->enum('ba_prestasi_pekerjaan', ['ada', 'tdk']);
            // $table->text('ba_prestasi_pekerjaan_ket')->nullable();;
            // $table->enum('bast', ['ada', 'tdk']);
            // $table->text('bast_ket')->nullable();;
            // $table->enum('jaminan_bank_garansi', ['ada', 'tdk']);
            // $table->text('jaminan_bank_garansi_ket')->nullable();;
            // $table->enum('pakta_integritas', ['ada', 'tdk']);
            // $table->text('pakta_integritas_ket')->nullable();;
            // $table->enum('uji_fungsi', ['ada', 'tdk']);
            // $table->text('uji_fungsi_ket')->nullable();;
            // $table->enum('sprin_komisi', ['ada', 'tdk']);
            // $table->text('sprin_komisi_ket')->nullable();;
            // $table->enum('siup_npwp_dll', ['ada', 'tdk']);
            // $table->text('siup_npwp_dll_ket')->nullable();;
            // $table->enum('kontrak_spk', ['ada', 'tdk']);
            // $table->text('kontrak_spk_ket')->nullable();;
            // $table->string('jml_barang');
            // $table->string('jml_jasa');
            // $table->string('dpp');
            // $table->string('ppn_11');
            // $table->string('ppn');
            // $table->string('pph_22');
            // $table->string('pph_23');
            // $table->string('denda');
            // $table->string('verifikator');
            // $table->string('kasi_urji');
            
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_kontrol');
    }
};