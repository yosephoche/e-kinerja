<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Skp extends Model
{
    protected $table = 'skp';
    protected $fillable = [
        'nama','id_skpd','uuid'
    ];
    protected $appends = ['detail_uri','delete_uri','edit_uri','update_uri'];

    public function skpd(){
        return $this->belongsTo(Skpd::class,'id_skpd');
    }

    public function task(){
        return $this->hasMany(SkpTask::class,'id_skp');
    }

    public function getDetailUriAttribute(){
        return route('skp.detail',['id' => $this->id]);
    }

    public function getDeleteUriAttribute(){
        return route('api.web.master-data.skp.delete',['id' => $this->uuid]);
    }

    public function getEditUriAttribute(){
        return route('skp.edit',['id' => $this->id]);
    }

    public function getUpdateuriAttribute(){
        return route('api.web.master-data.skp.update',['id' => $this->uuid]);
    }
}
