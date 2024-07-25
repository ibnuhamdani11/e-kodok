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
                                    <th>Tahun Anggaran</th>
                                    <th>Nomor Kontrak</th>
                                    <th>Nomor SKB/SKTD</th>
                                    <th>Sub Satker</th>
                                    <th>Suplier</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->tahun_anggaran }}</td>
                                    <td>{{ $item->no_kontrak }}</td>
                                    <td>{{ $item->nomor_skb_sktd }}</td>
                                    <td>{{ $item->sub_satker }}</td>
                                    <td>{{ $item->pic_vendor }}</td>
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
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="tahun_anggaran" class="form-label">Tahun Anggaran</label>
                                                            <input type="year" id="tahun_anggaran" name="tahun_anggaran" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="no_kontrak" class="form-label">Kontrak/SPK</label>
                                                            <input type="text" id="no_kontrak" name="no_kontrak" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="sub_satker" class="form-label">Sub Satker</label>
                                                            <input type="text" id="sub_satker" name="sub_satker" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="pic_vendor" class="form-label">Suplier</label>
                                                            <input type="text" id="pic_vendor" name="pic_vendor" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="file" class="form-label">Dokumen Wabku</label>
                                                            <input class="form-control" type="file" 
                                                            name="file"  id="file">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="nomor_skb_sktd" class="form-label">Nomor SKB/SSKTD</label>
                                                            <input type="text" id="nomor_skb_sktd" name="nomor_skb_sktd" class="form-control">
                                                        </div> 
                                                    </div>
                                                </div>
                                                 
                                            </div> 
                                            <!-- end col -->

                                            <div class="col-lg-6"> 
                                                <div class="mb-3">
                                                    <label for="uraian_tagihan" class="form-label">Uraian Tagihan</label>
                                                    <textarea class="form-control" id="uraian_tagihan" name="uraian_tagihan"
                                                    rows="10"></textarea>
                                                </div> 

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
        modal.find('.modal-title').text('Tambah Data Lembar Kontrol');
        modal.find('.modal-body #id').val('');
        modal.find('.modal-body #no_kontrak').val(''); 
    });

    // Edit Data
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $.get('/lembar-kontrol/get-id/' + id, function (data) {
            $('#fullWidthModal').modal('show');
            $('#fullWidthModalLabel').text('Edit Data');
            $('#id').val(data.id);
            $('#tahun_anggaran').val(data.tahun_anggaran);
            $('#no_kontrak').val(data.no_kontrak);
            $('#sub_satker').val(data.sub_satker);
            $('#pic_vendor').val(data.pic_vendor);
            $('#uraian_tagihan').val(data.uraian_tagihan);
            $('#nomor_skb_sktd').val(data.nomor_skb_sktd);
        })
    });

    // Submit Form
    $('#dataForm').on('submit', function (event) {
        // 
        event.preventDefault();
        var id = $('#id').val();
        var url = id ? '/lembar-kontrol/update/' + id : '/lembar-kontrol/add';
        var formData = new FormData(this); 
        // console.log("submit ", formData);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            method: 'POST', 
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#fullWidthModal').modal('hide');
                // Refresh table or redirect
                toastr.success('Data berhasil disimpan.');
                    setTimeout(function() {
                        location.reload();
                    }, 2000); // Memuat ulang halaman setelah 2 detik
            },
            error: function (error) {
                // Handle error
                toastr.error('Terjadi kesalahan saat menyimpan data.');
            }
        });
    });

    // Delete Data
    $('body').on('click', '.delete', function () {
        var id = $(this).data('id');
        if (confirm('Are you sure want to delete this data?')) {
            $.ajax({
                url: '/lembar-kontrol/delete/' + id,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
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