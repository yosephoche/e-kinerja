@extends('layouts.admin.partial.main')
@section('content')
    <div class="main">
        <div class="main-content tab-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-2">Detail SKP</h2>
                        <div class="form-group">
                            <label for="skp">Nama SKP</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="form-control">{{$skp->nama}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="golongan">SKPD</label>
                            <input id="golongan" type="text" class="form-control" name="golongan" placeholder="Golongan SKP" value="{{$skp->skpd->nama_skpd}}" readonly="">
                        </div>
                        <hr>
                        @foreach($skp->task AS $value)
                        <div class="form-group">
                            <label for="skp">Task {{$loop->iteration}}</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="form-control">{{$value->task}}</textarea>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    @endpush
@endsection
