<?php

namespace App\Http\Controllers\API;

use App\Models\MasterData\Skp;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as Exception;

class SkpController extends ApiController
{
    public function listSkp(Request $request)
    {
        $this->show_limit = $request->has('s') ? $request->input('s') : $this->show_limit;
        try {
            $skp = Skp::with('task','skpd')->orderBy('created_at', 'DESC');
            if ($request->has('q')) {
                $skp = $skp->where('nama','like','%'.$request->input('q').'%');
                $skp = $skp->orWhereHas('task',function ($query)use($request){
                    $query->where('task','like','%'.$request->q.'%');
                });
            }
            $skp = $skp->paginate($this->show_limit);
            return $this->ApiSpecResponses($skp);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'NOT_FOUND'
            ], 404);
        }
    }

    public function detailSkp($id){
        try {
            $skp = Skp::with('task','skpd')->where('id',$id)->orWhere('uuid',$id)->firstOrFail();
            return $this->ApiSpecResponses($skp);
        } catch (\Exception $exception){
            return response()->json([
                'message' => 'NOT_FOUND'
            ], 404);
        }
    }

    public function storeSkp(Request $request){
        $skp = new \App\Http\Controllers\MasterData\SkpController();
        $data = $skp->store($request,false);
        return $this->ApiSpecResponses($data);
    }

    public function updateSkp(Request $request,$id){
        $skp = new \App\Http\Controllers\MasterData\SkpController();
        $data = $skp->update($request,$id,false);
        return $this->ApiSpecResponses($data);
    }

    public function deleteSkp($id){
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
