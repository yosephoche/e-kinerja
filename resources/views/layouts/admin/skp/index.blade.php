@extends('layouts.admin.partial.main')
@section('content')
  <div class="main">
      <div class="nav-top-container">
          <div class="group-search">
              <span><i class="fas fa-search"></i></span>
              <input id="search" type="text" class="form-control" placeholder="Cari SKP">
          </div>
          @include('layouts.admin.partial.part.logout')
      </div>
    <div class="main-content">
        <div class="container-fluid">
            <a href="{{route('skp.add')}}" class="btn btn-success">Tambah SKP</a>
            <br><br>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama SKP</th>
                    <th scope="col">SKPD</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="list_skp">
                </tbody>
              </table>
            </div>
          <div class="box-pagination">
            <ul class="pagination pagination-custome" id="pagination"></ul>
          </div>
        </div>
    </div>
  </div>
    @push('script')
            <script>
                $(document).ready(function(){
                    getPage('');
                });
                var getPage = function (search) {
                    $('#pagination').twbsPagination('destroy');
                    $.get('{{route('api.web.master-data.skp.page')}}?q='+search)
                        .then(function (res) {
                            if (res.halaman == 0){
                                $('#preload').hide();
                            }
                            if (res.halaman == 1){
                                $('#pagination').hide();
                            } else {
                                $('#pagination').show();
                            }
                            $('#pagination').twbsPagination({
                                totalPages: res.halaman,
                                visiblePages: 5,
                                onPageClick: function (event, page) {
                                    getData(page,search);
                                }
                            });
                        })
                };
                var getData = function (page,search) {
                    var selector = $('.list_skp');
                    $('#preload').show();
                    $.ajax({
                        url: "{{ route('api.web.master-data.skp') }}?page="+page+'&q='+search,
                        data: '',
                        success: function(res) {
                            var data = res.response.map(function (val) {
                                var row = '';
                                row += "<tr>";
                                row += "<td>"+val.nama+"</td>";
                                row += "<td>"+val.skpd.nama_skpd+"</td>";
                                row += "<td><div class='btn-group mr-2' role='group' aria-label='Edit'><a href='"+val.edit_uri+"' class='btn btn-success'><i class='fas fa-edit'></i></a><button type='button' delete-uri='"+val.delete_uri+"' class='btn btn-danger btn-delete'><i class='fas fa-trash'></i></button></div></td>";
                                row += "</tr>";
                                row += val.task.map(function (val) {
                                    var row = '' +
                                        '<tr style="background-color: aqua">' +
                                        '<td colspan="2">'+val.task+'</td>' +
                                        '<td></td>' +
                                        '</tr>'
                                    return row;
                                });
                                return row;
                            })
                            selector.html(data.join(''));
                            $('#preload').hide();
                        },
                        complete : function () {
                            $('#preload').hide();
                        }
                    });
                }
                $(document).on('click','.btn-delete',function (e) {
                    e.preventDefault();
                    var delete_uri = $(this).attr('delete-uri');
                    var search = $('#search').val();
                    swal({
                        title: 'Yakin Ingin Menghapus SKP?',
                        text: "Proses tidak dapat di kembalikan",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Iya, Hapus SKP!',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.value) {
                        $.post(delete_uri)
                            .then(function (res) {
                                if (res.response.status == '200') {
                                    getPage(search);
                                    swal(
                                        'Terhapus!',
                                        'Data SKP Berhasil Dihapus.',
                                        'success'
                                    )
                                } else {
                                    swal(
                                        'Gagal Menghapus Data SKP',
                                        res.response.message,
                                        'error'
                                    )
                                }
                            },function () {
                                swal(
                                    'Gagal Menghapus Data',
                                    '',
                                    'error'
                                )
                            })
                        }
                    })
                })
                $('#search').on('keyup',function (e) {
                    e.preventDefault();
                    var search = $(this).val();
                    getPage(search);
                })
            </script>
    @endpush
@endsection
