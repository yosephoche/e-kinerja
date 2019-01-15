<div class="sidebar1">
    <div class="brand">
        <a href="{{ url('/master-data') }}">
          <img src="{{ asset('assets/images/logo.svg') }}" width="120">
        </a>
    </div>
    <ul>
        <li class="{{str_contains(url()->current(),route('pegawai.index')) ? 'active' : ''}}"><a href="{{route('pegawai.index')}}">Pegawai</a></li>
        <li class="{{str_contains(url()->current(),route('hari_kerja')) ? 'active' : ''}}"><a href="{{route('hari_kerja')}}">Hari Kerja</a></li>
{{--        <li><a href="{{route('eselon.index')}}" class="{{str_contains(url()->current(),route('eselon.index')) ? 'active' : ''}}">Kelas Jabatan</a></li>--}}
        <li class="{{str_contains(url()->current(),route('golongan.index')) ? 'active' : ''}}"><a href="{{route('golongan.index')}}">Golongan Jabatan</a></li>
        <li class="{{str_contains(url()->current(),route('jabatan.index')) ? 'active' : ''}}"><a href="{{route('jabatan.index')}}">Jabatan</a></li>
        <li class="{{str_contains(url()->current(),route('checkinout.index')) ? 'active' : ''}}"><a href="{{route('checkinout.index')}}">Absensi</a></li>
        <li class="{{str_contains(url()->current(),route('skpd.index')) ? 'active' : ''}}"><a href="{{route('skpd.index')}}">SKPD</a></li>
        <li class="{{url()->current() == route('skp.index') ? 'active' : ''}}"><a href="{{route('skp.index')}}">SKP (Sasaran kerja Pegawai)</a></li>
        <li class="{{str_contains(url()->current(),route('role-pegawai.index')) ? 'active' : ''}}"><a href="{{route('role-pegawai.index')}}">Role Pegawai</a></li>
        <li class="{{str_contains(url()->current(),'mesin-absen-upacara') ? 'active' : ''}}"><a href="{{route('absen-upacara.index')}}">Mesin Absen Upacara</a></li>
        {{--<li><a href="penilaian-etika.html">Penilaian Etika</a></li>--}}
        {{--<li><a href="tunjangan-kinerja.html">Tunjangan Kinerja</a></li>--}}
        @stack('sidebar')
    </ul>
    <ul class="wrapToggle">
        <li>
            <a href="panduan-monitoring-absen.html">
                Panduan Pengguna
                <i class="material-icons">help_outline</i>
            </a>
        </li>
        <li>
            <div class="toggleSwitch">
                <label class="mr-2">Mode Malam</label>
                <label class="switch">
                    <input id="toggle-switch" type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </li>
    </ul>
</div>
