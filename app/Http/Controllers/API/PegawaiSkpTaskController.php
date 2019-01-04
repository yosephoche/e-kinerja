<?php

namespace App\Http\Controllers\API;

use App\Models\MasterData\Skp;
use App\Models\MasterData\Skpd;
use App\Models\MasterData\PegawaiSkpTask;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as Exception;

class PegawaiSkpTaskController extends ApiController
{
    public function listSkpTask(Request $request)
    {
        $this->show_limit = $request->has('s') ? $request->input('s') : $this->show_limit;
        try {
            $skpTask = PegawaiSkpTask::with('skpTask', 'pegawai')->orderBy('created_at', 'DESC');
            if ($request->has('q')) {
                $skpTask = $skpTask->where('nip','like','%'.$request->input('q').'%');
                $skpTask = $skpTask->orWhereHas('pegawai',function ($query)use($request){
                    $query->where('nama','like','%'.$request->q.'%');
                });
            }
            $skpTask = $skpTask->paginate($this->show_limit);
            return $this->ApiSpecResponses($skpTask);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'NOT_FOUND'
            ], 404);
        }
    }

    public function detailSkpTask($id){
        try {
            $skp = Skp::with('task','skpd')->where('id',$id)->orWhere('uuid',$id)->firstOrFail();
            return $this->ApiSpecResponses($skp);
        } catch (\Exception $exception){
            return response()->json([
                'message' => 'NOT_FOUND'
            ], 404);
        }
    }

    public function storeSkpTask(Request $request){
        $skp = new \App\Http\Controllers\MasterData\SkpController();
        $data = $skp->store($request,false);
        return $this->ApiSpecResponses($data);
    }

    public function updateSkpTask(Request $request,$id){
        $skp = new \App\Http\Controllers\MasterData\SkpController();
        $data = $skp->update($request,$id,false);
        return $this->ApiSpecResponses($data);
    }

    public function deleteSkpTask($id){
        $skp = new \App\Http\Controllers\MasterData\SkpController();
        $data = $skp->delete($id,false);
        return $this->ApiSpecResponses($data);
    }

    public function getPage(Request $request)
    {
        if ($request->has('q')) {
            $data = Skp::count();
        }
        $data = ceil($data / $this->show_limit);
        return response()->json([
            'halaman' => $data
        ]);
    }
}
