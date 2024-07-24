@extends('layouts.admin')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">


        <div class="row">

            <div class="col-xl-12 col-lg-12">
                <div class="card chat-list-card mb-xl-0">
                    <div class="card-body">
                       
                        <div class="d-flex">
                            
                            <div class="flex-grow-1 align-items-center ms-2">
                                <h5 class="mt-0 mb-1">Pencarian Lembar Dokumen Kontrol</h5>
                                <p class="font-13 text-muted mb-0">Silahkan masukan kata kunci untuk mencari dokumen berdasarkan bla bla</p>
                            </div>

                        </div>

                        <hr class="my-3">

                        <div class="search-box chat-search-box">
                            <!-- <input type="text" class="form-control" placeholder="Search...">
                            <i class="mdi mdi-magnify search-icon"></i>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Search</button> -->
                            <form id="search">
                            @csrf
                                <div class="row"> 
                                    <div class="col">
                                        <div>
                                            <input type="text" id="search-keyword" class="form-control" placeholder="Masukan kata kunci yang akan dicari...">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary chat-send width-md waves-effect waves-light">
                                            <span class="d-none d-sm-inline-block me-2">Cari</span> 
                                            <i class="mdi mdi-magnify search-icon"></i>
                                        </button>
                                    </div> 
                                </div>
                            </form>
                        </div>

                        <hr class="my-3">

                        <div class="">
                            <ul class="list-unstyled chat-list mb-0" style="max-height: 413px;" id="search-results" data-simplebar>
                                <!-- hasilnya pencarian di sini -->
                                <!-- <li class="active">
                                                <a href="#">
                                                    <div class="d-flex">
                                                        <div
                                                            class="flex-shrink-0 chat-user-img active align-self-center me-2">
                                                            <img src="/images/users/user-2.jpg"
                                                                class="rounded-circle avatar-sm" alt="">
                                                        </div>

                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="text-truncate font-14 mt-0 mb-1">Margaret Clayton
                                                            </h5>
                                                            <p class="text-truncate mb-0">I've finished it! See you
                                                                so...</p>
                                                        </div>
                                                        <div class="font-11">05 min</div>
                                                    </div>
                                                </a>
                                            </li> -->
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
        <!-- end row -->
    </div> <!-- container -->

</div> 
            <!-- content -->
@endsection

@section('function-js')
<script>
    $(document).ready(function() {
        $('#search').on('submit', function(e) {
            e.preventDefault();
            var keyword = $('#search-keyword').val();
            
            $.ajax({
                url: '/lembar-kontrol/cari',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    keyword: keyword
                },
                success: function(response) {
                    var resultsContainer = $('#search-results');
                    resultsContainer.empty();
                    if (response.length > 0) {
                        response.forEach(function(item) {
                            var listItem = '<li class="active">'+
                                                '<a href="#">'+
                                                    '<div class="d-flex">'+
                                                        
                                                        '<div class="flex-grow-1 overflow-hidden">'+
                                                            '<h5 class="text-truncate font-14 mt-0 mb-1"> No Kontrak '+ item.no_kontrak+'</h5>'+
                                                            '<p class="text-truncate mb-0">Tahun Anggaran '+item.tahun_anggaran+'</p>'+
                                                            '<p class="text-truncate mb-0">Sub Satker '+item.sub_satker+'</p>'+
                                                            '<p class="text-truncate mb-0">Suplier '+item.pic_vendor+'</p>'+
                                                            '<p class="text-truncate mb-0">Uraian Tagihan '+item.uraian_tagihan+'</p>'+
                                                            '<p class="text-truncate mb-0">SKB SKTD '+item.skb_sktd+'</p>'+
                                                        '</div>'+
                                                        '<div class="font-11">'+new Date(item.updated_at)+'</div>'+
                                                    '</div>'+
                                                '</a>'+
                                            '</li>';
                            // var listItem = '<li>' + 
                            //     '<div class="d-flex align-items-center">' +
                            //         '<div class="flex-grow-1 ms-2">' +
                            //             '<h5 class="mt-0 mb-1">' + item.tahun_anggaran + '</h5>' +
                            //             '<p class="font-13 text-muted mb-0">' + item.no_kontrak + '</p>' +
                            //         '</div>' +
                            //     '</div>' +
                            //     '<hr class="my-3">' +
                            // '</li>';
                            resultsContainer.append(listItem);
                            console.log("cari ", item.tahun_anggaran);
                        });
                    } else {
                        resultsContainer.append('<li><p class="text-muted">No results found</p></li>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>

@endsection