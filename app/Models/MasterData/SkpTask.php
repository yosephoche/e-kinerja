<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class SkpTask extends Model
{
    protected $table = 'skp_task';
    protected $fillable = [
        'task','id_skp','uuid'
    ];

    public function skp(){
        return $this->belongsTo(Skp::class,'id_skp');
    }

    public function PegawaiTask(){
    	return $this->hasMany(PegawaiSkpTask::class)
}
