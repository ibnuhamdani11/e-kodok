@extends('layouts.admin')

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="row" style="margin-bottom:10px">
                            <div class="col-md-10">
                                <h4 class="mt-0 header-title">Data Lembar Kontrol</h4>
                            </div>
                            <div class="col-md-2 text-end">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#fullWidthModal" class="btn btn-primary waves-effect waves-light">Tambah Data</button>
                            </div>
                        </div> 

                        <table id="responsive-datatable"
                            class="table table-bordered table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Nomor Kontrak</th>
                                    <th>Tahun Anggaran</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Mata Anggaran</th>
                                    <th>Sub Satker</th>
                                    <th>Vendor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                            <tr>
                                    <td>{{ $item->no_kontrak }}</td>
                                    <td>{{ $item->tahun_anggaran }}</td>
                                    <td>{{ $item->jenis_pengeluaran }}</td>
                                    <td>{{ $item->mata_anggaran }}</td>
                                    <td>{{ $item->sub_satker }}</td>
                                    <td>{{ $item->puc_vendor }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success edit" data-id="{{ $item->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger delete" data-id="{{ $item->id }}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                <!-- Full width modal content -->
                <div id="fullWidthModal" class="modal fade" tabindex="-1" role="dialog"
                                                            aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-full-width">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="fullWidthModalLabel">Modal Heading</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="dataForm">
                                    @csrf
                                        <input type="hidden" id="id" name="id">
                                        <!-- <input type="hidden" id="role" name="role" value="verifikator"> -->
                                        <div class="row">
                                            <div class="col-lg-6"> 
                                                <div class="mb-3">
                                                    <label for="tahun_anggaran" class="form-label">Tahun Anggaran</label>
                                                    <input type="year" id="tahun_anggaran" name="tahun_anggaran" class="form-control">
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="jenis_pengeluaran" class="form-label">Jenis Pengeluaran</label>
                                                    <select class="form-select" id="jenis_pengeluaran" name="jenis_pengeluaran">
                                                        <option value="LS">LS</option>
                                                        <option value="UP">UP</option> 
                                                    </select>
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="mata_anggaran" class="form-label">Mata Anggaran</label>
                                                    <select class="form-select" id="mata_anggaran" name="mata_anggaran">
                                                        <option value="52">52</option>
                                                        <option value="53">53</option> 
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="sub_satker" class="form-label">Sub Satker</label>
                                                    <input type="text" id="sub_satker" name="sub_satker" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pic_vendor" class="form-label">Nama</label>
                                                    <input type="text" id="pic_vendor" name="pic_vendor" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jabatan_pic_vendor" class="form-label">Jabatan</label>
                                                    <input type="text" id="jabatan_pic_vendor" name="jabatan_pic_vendor" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pt_vendor" class="form-label">Suplier</label>
                                                    <input type="text" id="pt_vendor" name="pt_vendor" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="npwp" class="form-label">NPWP</label>
                                                    <input type="text" id="npwp" name="npwp" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat_vendor" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat_vendor" name="alamat_vendor"
                                                    rows="5"></textarea>
                                                </div> 
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="no_kontrak" class="form-label">Kontrak/SPK</label>
                                                    <input type="text" id="no_kontrak" name="no_kontrak" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="expired_kontrak" class="form-label">Tanggal Akhir Kontrak</label>
                                                    <input type="text" id="expired_kontrak" name="expired_kontrak" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nilai_kontrak" class="form-label">Nilai Kontrak</label>
                                                    <input type="text" id="nilai_kontrak" name="nilai_kontrak" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
                                                    <input type="text" id="jumlah_tagihan" name="jumlah_tagihan" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="uraian_tagihan" class="form-label">Uraian Tagihan</label>
                                                    <textarea class="form-control" id="uraian_tagihan" name="uraian_tagihan"
                                                    rows="5"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pengantar_dokumen" class="form-label">Pengantar Dokumen</label>
                                                    <input type="text" id="pengantar_dokumen" name="pengantar_dokumen" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">Dokumen Wabku</label>
                                                    <input class="form-control" type="file" id="file">
                                                </div>

                                            </div> <!-- end col -->
                                            <hr>
                                            <div class="col-lg-6"> 
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="kwitansi_ls" class="form-label">Kwitansi LS</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="kwitansi_ls" name="kwitansi_ls"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="kwitansi_ls">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="kwitansi_ls" name="kwitansi_ls"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="kwitansi_ls">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="kwitansi_ls_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="kwitansi_ls_ket" name="kwitansi_ls_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="skb_sktd" class="form-label">SKB/SKTD (Bebas PPN)</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="skb_sktd" name="skb_sktd"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="skb_sktd">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="skb_sktd" name="skb_sktd"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="skb_sktd">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="skb_sktd_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="skb_sktd_ket" name="skb_sktd_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="efaktur" class="form-label">e-Faktur</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="efaktur" name="efaktur"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="efaktur">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="efaktur" name="efaktur"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="efaktur">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="efaktur_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="efaktur_ket" name="efaktur_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="spm_spp" class="form-label">SPM/SPP</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="spm_spp" name="spm_spp"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="spm_spp">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="spm_spp" name="spm_spp"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="spm_spp">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="spm_spp_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="spm_spp_ket" name="spm_spp_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="ssp" class="form-label">SPP (Surat Setoran Pajak)</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="ssp" name="ssp"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="ssp">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="ssp" name="ssp"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="ssp">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="ssp_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="ssp_ket" name="ssp_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="karwas" class="form-label">Karwas (Data Kontrak)</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="karwas" name="karwas"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="karwas">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="karwas" name="karwas"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="karwas">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="karwas_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="karwas_ket" name="karwas_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="catatan_simak" class="form-label">Catatan Simak</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="catatan_simak" name="catatan_simak"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="catatan_simak">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="catatan_simak" name="catatan_simak"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="catatan_simak">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="catatan_simak_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="catatan_simak_ket" name="catatan_simak_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="sptjm" class="form-label">SPTJM</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="sptjm" name="sptjm"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="sptjm">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="sptjm" name="sptjm"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="sptjm">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="sptjm_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="sptjm_ket" name="sptjm_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="kwitansi_dgn_npwp" class="form-label">Kwitansi Dengan NPWP</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="kwitansi_dgn_npwp" name="kwitansi_dgn_npwp"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="kwitansi_dgn_npwp">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="kwitansi_dgn_npwp" name="kwitansi_dgn_npwp"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="kwitansi_dgn_npwp">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="kwitansi_dgn_npwp_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="kwitansi_dgn_npwp_ket" name="kwitansi_dgn_npwp_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="faktur_barang" class="form-label">Faktur Barang</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="faktur_barang" name="faktur_barang"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="faktur_barang">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="faktur_barang" name="faktur_barang"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="faktur_barang">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="faktur_barang_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="faktur_barang_ket" name="faktur_barang_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                            </div> <!-- end col -->

                                            <div class="col-lg-6"> 
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="ba_pembayaran" class="form-label">Berita Acara Pembayaran</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="ba_pembayaran" name="ba_pembayaran"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="ba_pembayaran">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="ba_pembayaran" name="ba_pembayaran"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="ba_pembayaran">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="ba_pembayaran_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="ba_pembayaran_ket" name="ba_pembayaran_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="ba_prestasi_pekerjaan" class="form-label">Berita Acara Prestasi Pekerjaan</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="ba_prestasi_pekerjaan" name="ba_prestasi_pekerjaan"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="ba_prestasi_pekerjaan">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="ba_prestasi_pekerjaan" name="ba_prestasi_pekerjaan"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="ba_prestasi_pekerjaan">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="ba_prestasi_pekerjaan_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="ba_prestasi_pekerjaan_ket" name="ba_prestasi_pekerjaan_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="bast" class="form-label">Berta Acara Serah Terima</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="bast" name="bast"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="bast">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="bast" name="bast"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="bast">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="bast_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="bast_ket" name="bast_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="jaminan_bank_garansi" class="form-label">Jaminan Bank Garansi</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="jaminan_bank_garansi" name="jaminan_bank_garansi"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="jaminan_bank_garansi">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="jaminan_bank_garansi" name="jaminan_bank_garansi"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="jaminan_bank_garansi">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="jaminan_bank_garansi_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="jaminan_bank_garansi_ket" name="jaminan_bank_garansi_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="pakta_integritas" class="form-label">Pakta Integritas</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="pakta_integritas" name="pakta_integritas"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="pakta_integritas">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="pakta_integritas" name="pakta_integritas"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="pakta_integritas">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="pakta_integritas_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="pakta_integritas_ket" name="pakta_integritas_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="uji_fungsi" class="form-label">Uji Fungsi</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="uji_fungsi" name="uji_fungsi"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="uji_fungsi">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="uji_fungsi" name="uji_fungsi"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="uji_fungsi">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="uji_fungsi_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="uji_fungsi_ket" name="uji_fungsi_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="sprin_komisi" class="form-label">Sprin Komisi</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="sprin_komisi" name="sprin_komisi"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="sprin_komisi">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="sprin_komisi" name="sprin_komisi"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="sprin_komisi">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="sprin_komisi_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="sprin_komisi_ket" name="sprin_komisi_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="siup_npwp_dll" class="form-label">SIUP, NPWP, dan Kelengkapan Lainnya</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="siup_npwp_dll" name="siup_npwp_dll"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="siup_npwp_dll">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="siup_npwp_dll" name="siup_npwp_dll"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="siup_npwp_dll">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="siup_npwp_dll_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="siup_npwp_dll_ket" name="siup_npwp_dll_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="kontrak_spk" class="form-label">Kontrak/SPK</label>
                                                            <div class="form-check">
                                                                <input type="radio" id="kontrak_spk" name="kontrak_spk"
                                                                    value="ada" class="form-check-input">
                                                                <label class="form-check-label" for="kontrak_spk">Ada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" id="kontrak_spk" name="kontrak_spk"
                                                                   value="tidak" class="form-check-input">
                                                                <label class="form-check-label" for="kontrak_spk">Tidak Ada</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <label for="kontrak_spk_ket" class="form-label">Keterangan</label>
                                                            <input type="text" id="kontrak_spk_ket" name="kontrak_spk_ket" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> <!-- end col -->

                                            <hr>
                                            <div class="col-lg-6"> 
                                                <div class="mb-3">
                                                    <label for="jml_barang" class="form-label">Jumlah Barang</label>
                                                    <input type="text" id="jml_barang" name="jml_barang" class="form-control">
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="jml_jasa" class="form-label">Jumlah Jasa</label>
                                                    <input type="text" id="jml_jasa" name="jml_jasa" class="form-control">
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="dpp" class="form-label">DPP </label>
                                                    <input type="text" id="dpp" name="dpp" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ppn_11" class="form-label">PPN 11%</label>
                                                    <input type="text" id="ppn_11" name="ppn_11" class="form-control">
                                                </div>
                                                 
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="ppn" class="form-label">PPN</label>
                                                    <input type="text" id="ppn" name="ppn" class="form-control">
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="pph_22" class="form-label">PPH - 22</label>
                                                    <input type="text" id="pph_22" name="pph_22" class="form-control">
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="pph_23" class="form-label">PPH - 23 </label>
                                                    <input type="text" id="pph_23" name="pph_23" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="denda" class="form-label">Denda</label>
                                                    <input type="text" id="denda" name="denda" class="form-control">
                                                </div>

                                            </div> <!-- end col -->

                                            <hr>
                                            <div class="col-lg-6"> 
                                                <div class="mb-3">
                                                    <label for="jumlah_potongan" class="form-label">JUMLAH POTONGAN</label>
                                                    <input type="text" id="jumlah_potongan" name="jumlah_potongan" class="form-control">
                                                </div>  

                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="jumlah_terima" class="form-label">JUMLAH YANG DITERIMA</label>
                                                    <input type="text" id="jumlah_terima" name="jumlah_terima" class="form-control">
                                                </div>  

                                            </div> <!-- end col -->

                                            <hr>
                                            <div class="col-lg-6"> 
                                                <div class="mb-3">
                                                    <label for="verifikator" class="form-label">Verifikator</label>
                                                    <input type="text" id="verifikator" name="verifikator" class="form-control">
                                                </div>  
                                                
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="kasi_urji" class="form-label">Kasi Urji</label>
                                                    <input type="text" id="kasi_urji" name="kasi_urji" class="form-control">
                                                </div>  

                                            </div> <!-- end col -->


                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    </div>
                </div>

            </div>
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('function-js')
<script>
$(document).ready(function() {
    // Add Data
    $('#fullWidthModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        modal.find('.modal-title').text('Tambah Data');
        modal.find('.modal-body #id').val('');
        modal.find('.modal-body #no_kontrak').val('');
        // modal.find('.modal-body #position').val('');
        // modal.find('.modal-body #office').val('');
        // modal.find('.modal-body #age').val('');
        // modal.find('.modal-body #start_date').val('');
        // modal.find('.modal-body #salary').val('');
    });

    // Edit Data
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $.get('/route-to-fetch-data/' + id, function (data) {
            $('#fullWidthModal').modal('show');
            $('#fullWidthModalLabel').text('Edit Data');
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#position').val(data.position);
            $('#office').val(data.office);
            $('#age').val(data.age);
            $('#start_date').val(data.start_date);
            $('#salary').val(data.salary);
        })
    });

    // Submit Form
    $('#dataForm').on('submit', function (event) {
        // console.log("submit ");
        event.preventDefault();
        var id = $('#id').val();
        var url = id ? '/route-to-update-data/' + id : '/lembar-kontrol/add';
        var data = {
            id: $('#id').val(),
            fullname: $('#fullname').val(),
            _token: '{{ csrf_token() }}' // Include CSRF token
        };

        $.ajax({
            url: url,
            method: id ? 'PUT' : 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#fullWidthModal').modal('hide');
                // Refresh table or redirect
                toastr.success('Data berhasil ditambah.');
                    setTimeout(function() {
                        location.reload();
                    }, 2000); // Memuat ulang halaman setelah 2 detik
            },
            error: function (error) {
                // Handle error
                toastr.error('Terjadi kesalahan saat menambah data.');
            }
        });
    });

    // Delete Data
    $('body').on('click', '.delete', function () {
        var id = $(this).data('id');
        if (confirm('Are you sure want to delete this data?')) {
            $.ajax({
                url: '/route-to-delete-data/' + id,
                method: 'DELETE',
                success: function (response) {
                    // Refresh table or redirect
                    toastr.success('Data berhasil dihapus.');
                    setTimeout(function() {
                        location.reload();
                    }, 2000); // Memuat ulang halaman setelah 2 detik
                },
                error: function (error) {
                    // Handle error
                    toastr.error('Terjadi kesalahan saat menghapus data.');
                }
            });
        }
    });
});
</script>
@endsection