@extends('layouts.users.partial.main')
@section('content')
    <div class="main">
        <div class="nav-top-container">
            <div class="nav-top">
                <div class="title-nav">
                    <h4 class="mr-4">Rekap Bulanan</h4>
                    <span class="badge text-white">23 September 2018</span>
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
                <input type="text" class="form-control" placeholder="Cari Nama / NIP Pegawai">
            </div>



            <div class="menu">
                <!-- <div> -->
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li><a class="listSelect active" data-toggle="tab" href="#user1" role="tab" aria-selected="true"><span
                                class="img-user" id="img-user1" style="background-image: url('images/img-user.png');">
                                </span>
                            <span>
                                    <label>Alfian Labeda <br><small>1929298282929000</small></label>
                                </span>
                            <div class="float-right badge badge-green text-white mr-2">75 %</div>
                        </a>
                    </li>
                    <li><a class="listSelect" data-toggle="tab" href="#user2" role="tab" aria-selected="false">
                                <span class="img-user" id="img-user2" style="background-image: url('images/bill.jpg');">
                                </span>
                            <span>
                                    <label>Bill <br><small>1929298282929000</small></label>
                                </span>
                            <div class="float-right badge badge-blue text-white mr-2">100 %</div>
                        </a>
                    </li>

                    <li><a class="listSelect" data-toggle="tab" href="#user3" role="tab" aria-selected="false"><span
                                class="img-user" id="img-user3" style="background-image: url('images/img-user.png');">
                                </span>
                            <span>
                                    <label>Alfian Labeda <br><small>1929298282929000</small></label>
                                </span>
                            <div class="float-right badge badge-red text-white mr-2">15 %</div>
                        </a>
                    </li>
                    <li><a class="listSelect" data-toggle="tab" href="#user4" role="tab" aria-selected="false">
                                <span class="img-user" id="img-user4" style="background-image: url('images/bill.jpg');">
                                </span>
                            <span>
                                    <label>Bill <br><small>1929298282929000</small></label>
                                </span>
                            <div class="float-right badge badge-orange text-white mr-2">45 %</div>
                        </a>
                    </li>

                    <li><a class="listSelect" data-toggle="tab" href="#user5" role="tab" aria-selected="false">
                                <span class="img-user" id="img-user5" style="background-image: url('images/steve.jpg');">
                                </span>
                            <span>
                                    <label>Jobs <br><small>1929298282929000</small></label>
                                </span>
                        </a></li>
                </ul>
                <!-- </div> -->
            </div>
        </div>
        <!-- isi tab pane -->
        <div class="main-content tab-content">
            <!-- start tab pane -->
            <div class="tab-pane active" id="user1" role="tabpanel">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="img-user" id="img-user1" style="background-image: url('images/img-user.png');">
                            </div>
                            <div class="nama-id">
                                <h6>Alfian Labeda</h6>
                                <span>1929298282929000</span>
                            </div>
                            <div class="btn-control float-right">
                                <button class="btn btn-rounded prev"><i class="fas fa-angle-left"></i></button>
                                <button class="btn btn-rounded next active"><i class="fas fa-angle-right"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-12 mt-3 control-date-btn">
                            <div class="date-group float-left">
                                <span class="icon-date"><i class="fas fa-calendar-alt"></i></span>
                                <input id="date-rekap" class="datepicker" placeholder="Pilih Bulan" />
                            </div>

                            <div class="float-right">
                                <button class="btn"><i class="fas fa-angle-left"></i></button>
                                <button class="btn"><i class="fas fa-angle-right"></i></button>
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
                                <tbody>
                                <tr>
                                    <td>Senin, 23/09/2018</td>
                                    <td>Hadir</td>
                                    <td>
                                        <span class="check-list"><i class="fas fa-lg fa-check"></i></span>
                                    </td>
                                    <td>
                                        <div class="badge badge-blue text-white mr-2">100 %</div>
                                    </td>
                                    <td>
                                        <button class="btn rounded btn-detail" title="Detail">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Selasa, 24/09/2018</td>
                                    <td>Sakit</td>
                                    <td>
                                        <span class="not-list"><i class="fas fa-lg fa-times"></i></span>
                                    </td>
                                    <td>
                                        <div class="badge badge-green text-white mr-2">75 %</div>
                                    </td>
                                    <td>
                                        <button class="btn rounded btn-detail" title="Detail">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Rabu, 25/09/2018</td>
                                    <td>Hadir</td>
                                    <td>
                                        <span class="check-list"><i class="fas fa-lg fa-check"></i></span>
                                    </td>
                                    <td>
                                        <div class="badge badge-blue text-white mr-2">100 %</div>
                                    </td>
                                    <td>
                                        <button class="btn rounded btn-detail" title="Detail">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Kamis, 26/09/2018</td>
                                    <td>Perjalanan Dinas</td>
                                    <td>
                                        <span class="check-list"><i class="fas fa-lg fa-check"></i></span>
                                    </td>
                                    <td>
                                        <div class="badge badge-blue text-white mr-2">100 %</div>
                                    </td>
                                    <td>
                                        <button class="btn rounded btn-detail" title="Detail">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end tab pane -->

            <!-- start pane -->
            <div class="tab-pane" id="user2" role="tabpanel">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="img-user" id="img-user2" style="background-image: url('images/bill.jpg');">
                            </div>
                            <div class="nama-id">
                                <h6>Bill Gates</h6>
                                <span>1929298282929000</span>
                            </div>
                            <div class="btn-control float-right">
                                <button class="btn btn-rounded"><i class="fas fa-angle-left"></i></button>
                                <button class="btn btn-rounded active"><i class="fas fa-angle-right"></i></button>
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
                                <tbody>
                                <tr>
                                    <td>Senin, 23/09/2018</td>
                                    <td>Hadir</td>
                                    <td>
                                        <span class="check-list"><i class="fas fa-lg fa-check"></i></span>
                                    </td>
                                    <td>
                                        <div class="badge badge-blue text-white mr-2">100 %</div>
                                    </td>
                                    <td>
                                        <button class="btn rounded btn-detail" title="Detail">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Selasa, 24/09/2018</td>
                                    <td>Sakit</td>
                                    <td>
                                        <span class="not-list"><i class="fas fa-lg fa-times"></i></span>
                                    </td>
                                    <td>
                                        <div class="badge badge-green text-white mr-2">75 %</div>
                                    </td>
                                    <td>
                                        <button class="btn rounded btn-detail" title="Detail">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Rabu, 25/09/2018</td>
                                    <td>Hadir</td>
                                    <td>
                                        <span class="check-list"><i class="fas fa-lg fa-check"></i></span>
                                    </td>
                                    <td>
                                        <div class="badge badge-blue text-white mr-2">100 %</div>
                                    </td>
                                    <td>
                                        <button class="btn rounded btn-detail" title="Detail">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Kamis, 26/09/2018</td>
                                    <td>Perjalanan Dinas</td>
                                    <td>
                                        <span class="check-list"><i class="fas fa-lg fa-check"></i></span>
                                    </td>
                                    <td>
                                        <div class="badge badge-blue text-white mr-2">100 %</div>
                                    </td>
                                    <td>
                                        <button class="btn rounded btn-detail" title="Detail">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end tab pane -->
            </div>
        </div>

        <!-- MODAL DETAIL -->
        <div class="modal-detail">
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
                                    <div class="img-user" id="user-modal" style="background-image: url('images/img-user.png');">
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
                                    <div class="img-user" id="user-modal" style="background-image: url('images/bill.jpg');">
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
@endsection