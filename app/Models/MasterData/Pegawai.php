<?php

namespace App\Models\MasterData;


use App\Models\Absen\Etika;
use App\Models\Absen\Kinerja;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    protected $table = 'pegawai';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $fillable = [
        'nip','nama','tanggal_lahir','id_agama','id_jabatan','jns_kel','tempat_lahir','foto','uuid','id_skpd'
    ];
    protected $appends = ['detail_uri','delete_uri','edit_uri','update_uri'];
    protected $hidden = ['password'];

    public function agama(){
        return $this->belongsTo(Agama::class,'id_agama');
    }

    public function jabatan(){
        return $this->belongsTo(Jabatan::class,'id_jabatan');
    }

    public function role(){
        return $this->belongsToMany(Role::class,'role_pegawai','nip_pegawai','id_role');
    }

    public function checkinout(){
        return $this->hasMany('App\Models\Absen\Checkinout','userid','userid');
    }

    public function etika(){
        return $this->hasMany(Etika::class,'userid','userid');
    }

    public function kinerja(){
        return $this->hasMany(Kinerja::class,'userid','userid');
    }

    public function hasAccess(array $permissions){
        foreach ($this->role as $role) {
            if ($role->hasAccess($permissions)) {
                return true;
            }
        }
    }

    public function skpd(){
        return $this->belongsTo('App\Models\MasterData\Skpd','id_skpd','id');
    }

    public function getDetailUriAttribute(){
        return route('pegawai.detail',['id' => $this->nip]);
    }

    public function getDeleteUriAttribute(){
        return route('api.web.master-data.pegawai.delete',['id' => $this->uuid]);
    }

    public function getEditUriAttribute(){
        return route('pegawai.edit',['id' => $this->nip]);
    }

    public function getUpdateuriAttribute(){
        return route('api.web.master-data.pegawai.update',['id' => $this->uuid]);
    }



}