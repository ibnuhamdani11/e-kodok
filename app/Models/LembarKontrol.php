<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarKontrol extends Model
{
    use HasFactory;


    // Nama tabel
    protected $table = 'lembar_kontrol';

    // Properti yang bisa diisi
    protected $fillable = [
            'no_kontrak',
            'tahun_anggaran',
            'jenis_pengeluaran',
            'mata_anggaran',
            'sub_satker',
            'pic_vendor',
            'jabatan_pic_vendor',
            'pt_vendor',
            'npwp',
            'alamat_vendor',
            'expired_kontrak',
            'nilai_kontrak',
            'jumlah_tagihan',
            'uraian_tagihan',
            'pengantar_dokumen',
            'file',
            'nomor_skb_sktd',
            'kwitansi_ls',
            'kwitansi_ls_ket',
            'skb_sktd',
            'skb_sktd_ket',
            'efaktur',
            'efaktur_ket',
            'spm_spp',
            'spm_spp_ket',
            'spp',
            'spp_ket',
            'karwas',
            'karwas_ket',
            'catatan_simak',
            'catatan_simak_ket',
            'sptjm',
            'sptjm_ket',
            'kwitansi_dgn_npwp',
            'kwitansi_dgn_npwp_ket',
            'faktur_barang',
            'faktur_barang_ket',
            'ba_pembayaran',
            'ba_pembayaran_ket',
            'ba_prestasi_pekerjaan',
            'ba_prestasi_pekerjaan_ket',
            'bast',
            'bast_ket',
            'jaminan_bank_garansi',
            'jaminan_bank_garansi_ket',
            'pakta_integritas',
            'pakta_integritas_ket',
            'uji_fungsi',
            'uji_fungsi_ket',
            'sprin_komisi',
            'sprin_komisi_ket',
            'siup_npwp_dll',
            'siup_npwp_dll_ket',
            'kontrak_spk',
            'kontrak_spk_ket',
            'jml_barang',
            'jml_jasa',
            'dpp',
            'ppn_11',
            'ppn',
            'pph_22',
            'pph_23',
            'denda',
            'verifikator',
            'kasi_urji'
    ];

    // Jika ada kolom created_at dan updated_at, pastikan timestamps diaktifkan
    public $timestamps = true;
}
