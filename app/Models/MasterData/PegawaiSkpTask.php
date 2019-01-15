<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class PegawaiSkpTask extends Model
{
	protected $table = 'pegawai_skp_tasks';
    protected $fillable = ['uuid', 'skp_task_id', 'nip', 'tgl_penunjukan', 'tgl_tunda', 'tgl_selesai', 'target_selesai', 'progres'];
    protected $appends = ['edit_link','delete_link','update_link'];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'nip','nip');
    }

    public function skpTask(){
    	return $this->belongsTo(SkpTask::class);
    }

    public function getDeleteLinkAttribute()
    {
        return route('api.web.master-data.pegawaiSkpTask.delete', ['id' => $this->id]);
    }

    public function getEditLinkAttribute()
    {
        return route('pegawaiSkpTask.edit', ['id' => $this->id]);
    }

    public function getUpdateLinkAttribute()
    {
        return route('api.web.master-data.pegawaiSkpTask.update', ['id' => $this->id]);
    }


}
