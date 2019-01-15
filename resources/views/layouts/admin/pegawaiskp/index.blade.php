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
            <a href="{{route('skp.add')}}" class="btn btn-success">Tambah SKP Pegawai</a>
            <br><br>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    {{-- skp_task_id', 'nip', 'tgl_penunjukan', 'tgl_tunda', 'tgl_selesai --}}
                    <th scope="col">Nip</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Detail Tugas SKP</th>
                    <th scope="col">Taggal Penunjukan</th>
                    <th scope="col">Target Selesai</th>
                    <th scope="col">Taggal Tunda</th>
                    <th scope="col">Taggal Selesai</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="list_pegawai_skp">
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
                    $.get('{{route('api.web.master-data.pegawaiSkpTask.page')}}?q='+search)
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
                    var selector = $('.list_pegawai_skp');
                    $('#preload').show();
                    $.ajax({
                        url: "{{ route('api.web.master-data.pegawaiSkpTask') }}?page="+page+'&q='+search,
                        data: '',
                        success: function(res) {
                            var data = res.response.map(function (val) {
                                console.log(val);
                                var row = '';
                                row += "<tr>";
                                // 'skp_task_id', 'nip', 'tgl_penunjukan', 'tgl_tunda', 'tgl_selesai'
                                row += "<td>"+val.nip+"</td>";
                                row += "<td>"+val.pegawai.nama+"</td>";
                                row += "<td>"+val.skp_task.task+"</td>";
                                row += "<td>"+val.tgl_penunjukan+"</td>";
                                row += "<td>target_selesai</td>"; //target selesai
                                row += "<td>"+val.tgl_tunda+"</td>";
                                row += "<td>"+val.tgl_selesai+"</td>";
                                row += "<td><div class='btn-group mr-2' role='group' aria-label='Edit'><a href='"+val.edit_link+"' class='btn btn-success'><i class='fas fa-edit'></i></a><button type='button' delete-uri='"+val.delete_link+"' class='btn btn-danger btn-delete'><i class='fas fa-trash'></i></button></div></td>";
                                row += "</tr>";
                                // row += val.task.map(function (val) {
                                //     var row = '' +
                                //         '<tr style="background-color: aqua">' +
                                //         '<td colspan="2">'+val.task+'</td>' +
                                //         '<td></td>' +
                                //         '</tr>'
                                //     return row;
                                // });
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
