<?php

namespace App\Http\Controllers\APIMobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterData\HariKerja;
use App\Models\MasterData\Pegawai;
use App\Models\Absen\Kinerja;
use App\Models\Absen\Etika;
use App\Models\Absen\Checkinout;

class RekapBulananController extends ApiController
{
    public function getBawahan(){
        // $user = auth('web')->user();
        $user = Pegawai::whereIdJabatan(2)->first();
        $user->load('jabatan.pegawai_bawahan');
        $bawahan = $user->jabatan->pegawai_bawahan;

        $data = [];
        foreach($bawahan as $b) {
            $data[] = [
                'uuid' => $b->uuid,
                'nama' => $b->nama,
                'foto' => $b->foto,
                'nip' => $b->nip,
            ];
        }
        return $this->ApiSpecResponses($data);
    }

    public function getRekap($nip,$bulan = null,$tahun = null){
        $bulan = (int)($bulan?:date('m'));
        $tahun = ($tahun?:date('Y'));
        $hari_kerja = HariKerja::where('bulan',$bulan)->where('tahun',$tahun)->whereHas('statusHari',function ($query){
            $query->where('status_hari','kerja');
        })->get();
        $pegawai = Pegawai::whereNip($nip)->first();
        $data_inout = [];
        foreach ($hari_kerja AS $key => $hk){
            $kinerja = $pegawai->kinerja()->where('tgl_mulai','<=',$hk->tanggal)->where('tgl_selesai','>=',$hk->tanggal)->first();
            $etika = $pegawai->etika()->where('tanggal',$hk->tanggal)->first();
            $data_inout[] = [
                'tanggal' => $hk->tanggal,
                'hari' => ucfirst($hk->Hari->nama_hari),
                'status' => ucfirst(str_replace('_',' ',isset($kinerja->jenis_kinerja)?$kinerja->jenis_kinerja:'')),
                'persentase' => isset($etika->persentase)?$etika->persentase : '',
                'approve' => isset($kinerja->approve) ? $kinerja->approve : ''
            ];
        }
        return $this->ApiSpecResponses([
            'uuid' => $pegawai->uuid,
            'nama' => $pegawai->nama,
            'nip' => $pegawai->nip,
            'foto' => $pegawai->foto,
            'rekap_bulanan' => $data_inout
        ]);
    }

    public function getDetailRekap($nip,$tgl) {
        $date = new HariKerja;

        /* Tarik tanggal sebelumnya */
        $date_prev = $date->whereDate('tanggal','<',$tgl)
        ->whereIdStatusHari(1)
        ->orderBy('tanggal','desc')
        ->first();

        /* Tarik tanggal setelahnya */
        $date_next = $date->whereDate('tanggal','>',$tgl)
        ->whereIdStatusHari(1)
        ->orderBy('tanggal','asc')
        ->first();

        /* Data kinerja */
        $pegawai = Pegawai::where('nip',$nip)->first();
        $kinerja = Kinerja::where('userid',$pegawai->userid)
        ->select('jenis_kinerja', 'rincian_kinerja', 'approve', 'keterangan_approve')
        ->whereDate('tgl_mulai',$tgl)
        ->first();

        /* Data etika */
        $etika = Etika::where("userid",$pegawai->userid)
        ->select('persentase', 'keterangan')
        ->where("tanggal",$tgl)
        ->first();

        /* Data checkinout */
        $checkinout = Checkinout::where("userid",$pegawai->userid)
        ->select('checktime')
        ->whereDate("checktime",$tgl)
        ->get();

        /* Data array */
        $result = [
            'uuid' => $pegawai->uuid,
            'nama' => $pegawai->nama,
            'nip' => $pegawai->nip,
            'foto' => $pegawai->foto,
            'kinerja' => $kinerja,
            'etika' => $etika,
            'checkinout' => [
              'in' => $checkinout[0]->checktime,
              'out' => $checkinout[1]->checktime,
            ]
        ];

        return $this->ApiSpecResponses($result);
    }
}
