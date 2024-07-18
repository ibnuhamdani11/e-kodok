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
                                <h4 class="mt-0 header-title">Data Petugas Pembayar</h4>
                            </div>
                            <div class="col-md-2 text-end">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#fullWidthModal" class="btn btn-primary waves-effect waves-light">Tambah Data</button>
                            </div>
                        </div> 

                        <table id="responsive-datatable"
                            class="table table-bordered table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Pangkat</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>No Handphone</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                            <tr>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->pangkat }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->status }}</td> 
                                    <td>{{ $item->no_phone }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success edit" data-id="{{ $item->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger delete" data-id="{{ $item->id }}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                      
<!-- Modal -->
<div class="modal fade " id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="dataFormqqqq">
            @csrf
            <input type="hidden" id="id" name="id">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Default</label>
                        <input type="text" id="selectize-tags"
                            value="Awesome, Admin, Dashboard">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Select</label> <br />
                        <select id="selectize-select">
                            <option data-display="Select">Nothing</option>
                            <option value="1">Some option</option>
                            <option value="2">Another option</option>
                            <option value="3" disabled>A disabled option</option>
                            <option value="4">Potato</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="no_kontrak" name="no_kontrak" required>
            </div>
            <div class="form-group">
                <label for="pangkat">Pangkat</label>
                <input type="text" class="form-control" id="pangkat" name="pangkat" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <!-- <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div> -->
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" required>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


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
                                        <div class="row">
                                            <div class="col-lg-6"> 
                                                <div class="mb-3">
                                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                                    <input type="text" id="fullname" name="fullname" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="satuan" class="form-label">Satuan</label>
                                                    <input type="text" id="satuan" name="satuan" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="pangkat" class="form-label">Pangkat</label>
                                                    <select class="form-select" id="pangkat" name="pangkat">
                                                        <option value="pangkat 1">pangkat 1</option>
                                                        <option value="pangkat 2">pangkat 2</option>
                                                        <option value="pangkat 3">pangkat 3</option>
                                                        <option value="pangkat 4">pangkat 4</option>
                                                        <option value="pangkat 5">pangkat 5</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="npwp" class="form-label">NPWP</label>
                                                    <input type="number" id="npwp" name="npwp" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="status_p" class="form-label">Status</label>
                                                    <select class="form-select" id="status_p" name="status_p">
                                                        <option value="aktif">Aktif</option>
                                                        <option value="non-aktif"> Tidak Aktif</option> 
                                                    </select>
                                                </div> 

                                                
                                            </div> <!-- end col -->

                                            <div class="col-lg-6">
                                                
                                                <div class="mb-3">
                                                <input type="text" id="role" name="role" class="form-control" value="verifikator">
                                                    <label for="jabatan" class="form-label">Jabatan</label>
                                                    <select class="form-select" id="jabatan" name="jabatan">
                                                        <option value="Jabatan 1">Jabatan 1</option>
                                                        <option value="Jabatan 2">Jabatan 2</option>
                                                        <option value="Jabatan 3">Jabatan 3</option>
                                                        <option value="Jabatan 4">Jabatan 4</option>
                                                        <option value="Jabatan 5">Jabatan 5</option>
                                                    </select>
                                                </div> 

                                                <div class="mb-3">
                                                    <label for="no_phone" class="form-label">No Handphone</label>
                                                    <input type="number" id="no_phone" name="no_phone" class="form-control">
                                                    
                                                </div>
                                                

                                                <div class="mb-3">
                                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" id="gender" name="gender">
                                                        <option value="male">Laki-Laki</option>
                                                        <option value="female">Perempuan</option>
                                                    </select>
                                                </div> 

                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat" name="alamat"
                                                        rows="5"></textarea>
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
        modal.find('.modal-body #fullname').val('');
        modal.find('.modal-body #pangkat').val('');
        modal.find('.modal-body #jabatan').val('');
        modal.find('.modal-body #satuan').val('');
        modal.find('.modal-body #no_phone').val('');
        modal.find('.modal-body #gender').val('');
        modal.find('.modal-body #npwp').val('');
        modal.find('.modal-body #status').val('');
        modal.find('.modal-body #alamat').val('');
        modal.find('.modal-body #role').val('pembayar');
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
        console.log("submit ");
        console.log("data ", $(this).serialize());
        event.preventDefault();
        var id = $('#id').val();
        var url = id ? '/route-to-update-data/' + id : '/petugas/add';
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
                url: '/petugas/delete/' + id,
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