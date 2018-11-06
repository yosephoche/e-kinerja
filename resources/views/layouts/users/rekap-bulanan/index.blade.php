@extends('layouts.users.partial.main')
@section('content')
    <div class="main">
        <div class="nav-top-container">
            <div class="nav-top">
                <div class="title-nav">
                    <h4 class="mr-4">Rekap Bulanan</h4>
                    <span
                        class="badge text-white">{{date('d')}} {{ucfirst(\App\Models\MasterData\Bulan::find((int)date('m'))->nama_bulan)}} {{date('Y')}}</span>
                </div>
                <div class="img-profile" id="user-profile" style="background-image: url('images/img-user.png');">
                </div>

                <div class="profile">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img">
                                <!-- image profile show -->
                                <div class="img-profile" style="background-image: url('images/img-user.png');">
                                </div>
                                <!-- end -->
                            </div>
                            <br>
                            <div class="profile-name">
                                <label>Administrator</label>
                            </div>
                        </div>
                    </div>
                    <a href="login.html" class="btn btn-block" id="btn-logout">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar2">

            <div class="group-search">
                <span><i class="fas fa-search"></i></span>
                <input id="search" type="text" class="form-control" placeholder="Cari Nama / NIP Pegawai">
            </div>


            <div class="menu">
                <!-- <div> -->
                <input type="hidden" name="total-index">
                <ul class="nav nav-pills" id="myTab" role="tablist" data="data-bawahan">

                </ul>
                <!-- </div> -->
            </div>
        </div>
        <!-- isi tab pane -->
        <div class="main-content tab-content">
            <!-- start tab pane -->
            <div class="tab-pane active" id="user1" role="tabpanel">
                <div class="container">
                    <input type="hidden" name="index" value="0">
                    <div class="loading">
                        <img src="{{ asset('assets/images/loading.gif') }}" alt="loading">
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="img-user" id="detail-img" style="background-image: url('images/img-user.png');">
                            </div>
                            <div class="nama-id">
                                <h6 id="detail-nama"></h6>
                                <span id="detail-nip"></span>
                            </div>
                            <div class="btn-control float-right">
                                <button id="pegawai-sebelumnya" inc-index="-1" class="btn btn-rounded prev"><i
                                        class="fas fa-angle-left"></i></button>
                                <button id="pegawai-selanjutnya" inc-index="1" class="btn btn-rounded next active"><i
                                        class="fas fa-angle-right"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-12 mt-3 control-date-btn">
                            <div class="date-group float-left">
                                <span class="icon-date"><i class="fas fa-calendar-alt"></i></span>
                                <input id="date-rekap" class="datepicker" placeholder="Pilih Bulan"/>
                            </div>

                            <div class="float-right">
                                <button id="bulan-sebelumnya" data-value="-1" class="btn"><i
                                        class="fas fa-angle-left"></i></button>
                                <button id="bulan-selanjutnya" data-value="1" class="btn"><i
                                        class="fas fa-angle-right"></i></button>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-responsive table-pegawai">
                                <thead>
                                <tr>
                                    <th scope="col">Hari, Tanggal</th>
                                    <th scope="col">Absen</th>
                                    <th scope="col">Kinerja</th>
                                    <th scope="col">Etika</th>
                                    <th scope="col">Detail</th>
                                </tr>
                                </thead>
                                <tbody id="detail-rekap-bulanan">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DETAIL -->
        <div class="modal-detail" id="modal-detail">
            <div class="modal-overlay">
                <!-- button close -->
                <div class="close">
                    <i class="fas fa-times"></i>
                </div>
                <!-- button control -->
                <a class="control-left" onclick="plusSlides(-1)">
                    <i class="fas fa-angle-left"></i>
                </a>
                <a class="control-right" onclick="plusSlides(1)">
                    <i class="fas fa-angle-right"></i>
                </a>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal-konten mySlides">
                                <div class="title-name">
                                    <div class="img-user" id="user-modal"
                                         style="background-image: url('images/img-user.png');">
                                    </div>
                                    <h6>Alfian Labeda</h6>
                                    <span>1929298282929000</span>
                                    <span class="badge text-white float-right">23 September 2018</span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="desc-detail">
                                    <h4>Hadir</h4>
                                    <small>Jam Masuk - Jam Pulang</small>
                                    <br>
                                    <label>07:15 - 16:00</label>
                                    <hr>
                                    <h4>Penilaian Kinerja</h4>
                                    <span class="check-list float-right"><i class="fas fa-lg fa-check"></i></span>
                                    <h6>Rincian Kinerja</h6>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus nostrum
                                        possimus asperiores aliquid eaque iusto aut aspernatur earum nihil magnam
                                        saepe odit officiis, ipspsa delectus tempora? Magni, atque totam dicta
                                        accusantium, velit itaque dolores magnam nihil repellendus!</p>
                                    <h6>Keterangan Penilaian</h6>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus nostrum
                                        possimus asperiores aliquid eaque iusto aut aspernatur earum nihil magnam
                                        saepe odit officiis, ipsam excepturi maiores? Possimus odit alias fugiat
                                        excepturi dolorem doloripsa delectus tempora? Magni, atque totam dicta
                                        accusantium, velit itaque dolores magnam nihil repellendus!</p>
                                    <hr>
                                    <h4>Penilaian Etika</h4>
                                    <span class="float-right value-etika">100%</span>
                                    <h6>Keterangan Penilaian</h6>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, fugiat
                                        doloremque error aliquid consequuntur, nostrum deleniti incidunt
                                        perferendis quasi explicabo dolorum repellat, esse minus ipsam alias
                                        impedit sapiente culpa aspernatur?</p>
                                </div>
                            </div>

                            <!--  -->
                            <div class="modal-konten mySlides">
                                <div class="title-name">
                                    <div class="img-user" id="user-modal"
                                         style="background-image: url('images/bill.jpg');">
                                    </div>
                                    <h6>Bill Gates</h6>
                                    <span>1929298282929000</span>
                                    <span class="badge text-white float-right">23 September 2018</span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="desc-detail">
                                    <h4>Hadir</h4>
                                    <small>Jam Masuk - Jam Pulang</small>
                                    <br>
                                    <label>07:15 - 16:00</label>
                                    <hr>
                                    <h4>Penilaian Kinerja</h4>
                                    <span class="check-list float-right"><i class="fas fa-lg fa-check"></i></span>
                                    <h6>Rincian Kinerja</h6>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus nostrum
                                        possimus asperiores aliquid eaque iusto aut aspernatur earum nihil magnam
                                        saepe odit officiis, ipspsa delectus tempora? Magni, atque totam dicta
                                        accusantium, velit itaque dolores magnam nihil repellendus!</p>
                                    <h6>Keterangan Penilaian</h6>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus nostrum
                                        possimus asperiores aliquid eaque iusto aut aspernatur earum nihil magnam
                                        saepe odit officiis, ipsam excepturi maiores? Possimus odit alias fugiat
                                        excepturi dolorem doloripsa delectus tempora? Magni, atque totam dicta
                                        accusantium, velit itaque dolores magnam nihil repellendus!</p>
                                    <hr>
                                    <h4>Penilaian Etika</h4>
                                    <span class="float-right value-etika">100%</span>
                                    <h6>Keterangan Penilaian</h6>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, fugiat
                                        doloremque error aliquid consequuntur, nostrum deleniti incidunt
                                        perferendis quasi explicabo dolorum repellat, esse minus ipsam alias
                                        impedit sapiente culpa aspernatur?</p>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- end Modal Detail -->
    </div>
    @push('script')
        <script>

            var getBawahan = function () {
                $.get('{{route('api.web.rekap-bulanan.get-bawahan')}}')
                    .then(function (res) {
                        if (res.response.length > 0) {
                            var data = res.response.map(function (val, i) {
                                var foto = val.foto ? "{{url('')}}/storage/" + val.foto : "{{url('assets/images/img-user.png')}}"
                                return '<li class="list-bawahan" data-foto="' + foto + '" data-index="' + i + '" data-nip="' + val.nip + '" data-nama="' + val.nama + '"><a class="listSelect ' + (i == 0 ? 'active' : '') + '" data-toggle="tab" href="#' + val.nip + '" role="tab" aria-selected="true"><span\n' +
                                    '                                class="img-user" id="img-user1" style="background-image: url(' + foto + ');">\n' +
                                    '                                </span>\n' +
                                    '                            <span>\n' +
                                    '                                    <label>' + val.nama + '<br><small>' + val.nip + '</small></label>\n' +
                                    '                                </span>\n' +
                                    '                            <div class="float-right badge badge-green text-white mr-2"></div>\n' +
                                    '                        </a>\n' +
                                    '                    </li>'
                            })
                            $('[data=data-bawahan]').html(data.join(''));
                            $('[name=total-index]').val(data.length - 1);
                            setTimeout(function () {
                                $('[data-index=0]').click();
                            }, 1000)
                        } else {
                            $('[data=data-bawahan]').html("<label>Data Tidak Ditemukan</label>");
                        }
                    })
            };
            $('#search').on('keyup', function (e) {
                e.preventDefault();
                key = $(this).val()
                $('.list-bawahan').hide();
                if (key) {
                    find = $('[data-nip*="' + key + '"],[data-nama*="' + key + '"]');
                    find.attr('search', true);
                    find.show()
                } else {
                    $('.list-bawahan').show();
                    $('.list-bawahan').removeAttr('search');
                }
            })
            window['trigger'] = 0;
            $('#date-rekap').on('changeDate', function (e) {
                e.preventDefault();
                if (window['trigger'] == 0) {
                    window['trigger'] = 1;
                    var value = $(this).val();
                    var date = value.split(' ');
                    var tahun = date[1];
                    var bulan;
                    switch (date[0]) {
                        case 'January' :
                            bulan = 1;
                            break;
                        case 'February' :
                            bulan = 2;
                            break;
                        case 'March' :
                            bulan = 3;
                            break;
                        case 'April' :
                            bulan = 4;
                            break;
                        case 'May' :
                            bulan = 5;
                            break;
                        case 'June' :
                            bulan = 6;
                            break;
                        case 'July' :
                            bulan = 7;
                            break;
                        case 'August' :
                            bulan = 8;
                            break;
                        case 'September' :
                            bulan = 9;
                            break;
                        case 'October' :
                            bulan = 10;
                            break;
                        case 'November' :
                            bulan = 11;
                            break;
                        case 'December' :
                            bulan = 12;
                            break;
                    }
                    var nip = $('#detail-nip').html();
                    getRekap(nip, bulan, tahun)
                }
            })
            $(document).on('click', '.list-bawahan[data-index]', function (e) {
                e.preventDefault();
                $('.list-bawahan').find('.listSelect').removeClass('active')
                $(this).addClass('active').siblings().removeClass('active');
                $(this).find('.listSelect').addClass('active')
                var nama = $(this).attr('data-nama');
                var nip = $(this).attr('data-nip');
                var foto = $(this).attr('data-foto');
                var index = $(this).attr('data-index');
                $('#date-rekap').val('');
                $('[name=index]').val(index);
                $('#detail-nama').html(nama);
                $('#detail-nip').html(nip);
                $('#detail-img').css({'background-image': 'url(' + foto + ')'})
                if (index == 0) {
                    $('#pegawai-sebelumnya').removeClass('active')
                } else {
                    $('#pegawai-sebelumnya').addClass('active')
                }
                if (index == $('[name=total-index]').val()) {
                    $('#pegawai-selanjutnya').removeClass('active')
                } else {
                    $('#pegawai-selanjutnya').addClass('active')
                }
                getRekap(nip, null, null);
            })
            var getRekap = function (nip, bulan, tahun) {
                $('.loading').show();
                $.get('{{route('api.web.rekap-bulanan',['nip' => ''])}}/' + nip + (bulan ? '/' + bulan : '') + (tahun ? '/' + tahun : ''))
                    .then(function (res) {
                        if (res.response.rekap_bulanan.length > 0) {
                            var rekap = res.response.rekap_bulanan.map(function (val) {
                                var color = approve = ''
                                if (val.approve == 1) {
                                    approve = 'fa-check';
                                    color = 'check-list'
                                } else if (val.approve === 0) {
                                    approve = 'fa-times'
                                    color = 'not-list'
                                } else if (val.approve == '') {
                                    color = ''
                                    approve = ''
                                }
                                return '<tr>\n' +
                                    '                                    <td>' + val.hari + ', ' + val.tanggal + '</td>\n' +
                                    '                                    <td>' + val.status + '</td>\n' +
                                    '                                    <td>\n' +
                                    '                                        <span class="' + color + '"><i class="fas fa-lg ' + approve + '"></i></span>\n' +
                                    '                                    </td>\n' +
                                    '                                    <td>\n' +
                                    '                                        <div class="badge badge-blue text-white mr-2">' + val.persentase + ' %</div>\n' +
                                    '                                    </td>\n' +
                                    '                                    <td>\n' +
                                    '                                        <button class="btn rounded btn-detail" id="detailRekap" title="Detail">\n' +
                                    '                                            <i class="fas fa-search-plus"></i>\n' +
                                    '                                        </button>\n' +
                                    '                                    </td>\n' +
                                    '                                </tr>'
                            });
                            $('#detail-rekap-bulanan').html(rekap.join(''));
                        } else {
                            $('#detail-rekap-bulanan').html('<tr><td class="text-center" colspan="100">Data Tidak ditemukan</td></tr>');
                        }
                        $('.loading').hide();
                        window['trigger'] = 0;
                    }, function () {
                    })
            }
            $(document).on('click', '.btn-detail', function (e) {
                e.preventDefault();
                $('.modal-overlay').addClass('show');
            })
            $('#bulan-sebelumnya,#bulan-selanjutnya').on('click', function (e) {
                e.preventDefault();
                d = $("#date-rekap").datepicker("getDate");
                if (d == 'Invalid Date') {
                    d = new Date();
                }
                $("#date-rekap").datepicker("setDate", new Date(d.getFullYear(), d.getMonth() + parseInt($(this).attr('data-value')), d.getDate()));
            })
            $('#pegawai-sebelumnya,#pegawai-selanjutnya').on('click', function (e) {
                e.preventDefault();
                var index = $('[name=index]').val();
                var i = $(this).attr('inc-index');
                var new_index = parseInt(index) + parseInt(i);
                var total_index = $('[name=total-index]').val();
                if (new_index => 0 && new_index <= total_index) {
                    $('[data-index="' + new_index + '"]').click()
                }
            })
            $(document).ready(function () {
                getBawahan()
            })
            $(document).on('click','#detailRekap',function(){
              var nip = $('#detail-nip').html();
              var date = $(this).data('date');
              console.log(date);
              $.get('{{route('api.web.rekap-detail',['nip' => '','tanggal' => ''])}}/' + nip + '/' + tanggal)
              .then((res)=>{
                console.log(res)
              });
            });

        </script>
    @endpush
@endsection
