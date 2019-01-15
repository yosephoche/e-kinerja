@extends('layouts.admin.partial.main')
@section('content')
    <div class="main">
        <div class="main-content tab-content">
            <div class="container-fluid">
                <form id="form-store-skp" action="{{route('api.web.master-data.skp.store')}}" class="form">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="mb-2">Tambah SKP</h2>
                            <div class="form-group">
                                <label for="keterangan">Nama SKP</label>
                                <textarea name="nama" id="keterangan" rows="3" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="golongan">SKPD</label>
                                <select class="form-control" name="id_skpd" id="SKPD" required>
                                    <option value="">Pilih SKPD</option>
                                    @foreach($data_option->skpd AS $skpd)
                                        <option value="{{$skpd->id}}">{{$skpd->nama_skpd}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div data="task">
                                <h5 class="mb-2">Task SKP</h5>
                            </div>
                            <input type="hidden" name="task_delete">
                            <a onclick="tambahTask()" class="btn btn-default"><span class="fas fa-plus"></span> Tambah Task </a>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            var hapusTask = function (button) {
                var form_group = $(button).closest('.form-group');
                var id_sub_rute = form_group.find('input[data=id-sub-rute]').val();
                if (typeof id_sub_rute !== 'undefined') {
                    var value_deleted = $('[name=task_delete]').val()
                    var value =  value_deleted+ (value_deleted === '' ? '' : ',') + id_sub_rute;
                    $('[name=task_delete]').val(value);
                }
                form_group.remove();
            }
            var tambahTask = function () {
                var div = '<div class="row form-group">' +
                    '         <div class="col-sm-9">' +
                    '            <textarea  type="text" name="task[]" value="" class="form-control" placeholder="Task" required></textarea> ' +
                    '         </div>' +
                    '         <div class="col-sm-3">' +
                    '            <a class="btn btn-warning btn-sm" onclick="hapusTask(this)" title="hapus Task "><span class="fas fa-trash"></span></a>' +
                    '         </div>' +
                    '   </div>'
                $('div[data=task]').append(div);
            };
            $('#form-store-skp').on('submit',function (e) {
                e.preventDefault();
                var action = this.action;
                var formData = new FormData($(this)[0]);
                swal({
                    title: 'Ingin Menyimpan Data?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Iya, simpan data!',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: action,
                            type: "POST",
                            data: formData,
                            success: function (res) {
                                swal(
                                    'Berhasil Menyimpan Data!',
                                    '',
                                    'success'
                                )
                                setTimeout(function () {
                                    location.href = res.response.detail_uri
                                }, 3000);
                            },
                            error: function () {
                                swal(
                                    'Gagal Menyimpan Data!',
                                    '',
                                    'error'
                                )
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    }
                })
            })
        </script>
    @endpush
@endsection
