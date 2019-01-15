<?php

namespace App\Http\Controllers\MasterData;

use App\Models\MasterData\Pegawai;
use App\Models\MasterData\SkpTask;
use App\Models\MasterData\PegawaiSkpTask;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PegawaiSkpTaskController extends MasterDataController
{
    public function index(){
        return view('layouts.admin.pegawaiskp.index');
    }

    public function show($id){
        $skp = Skp::with('task','skpd')->where('id',$id)->orWhere('uuid',$id)->firstOrFail();
        return view('layouts.admin.skp.detail',compact('skp'));
    }

    public function add(){
        $data_option = new \stdClass();
        $data_option->skpd = Skpd::get();
        return view('layouts.admin.skp.add',compact('data_option'));
    }

    public function edit($id){
        $skp = PegawaiSkpTask::where('id',$id)->orWhere('uuid',$id)->firstOrFail();
        return view('layouts.admin.pegawaiskp.edit',compact('skp'));
    }

    public function store(Request $request,$json = true){
        $this->validate($request,[
            'nama' => 'required',
            'id_skpd' => 'required|in:'.$this->getListSkpd(),
            'task' => 'array'
        ]);
        $input = $request->input();
        $input['uuid'] = (string)Str::uuid();

        $skp = Skp::create($input);
        if ($skp){
            if ($request->has('task')) {
                foreach ($request->task AS $task) {
                    $skp->task()->create([
                        'uuid' => (string)Str::uuid(),
                        'task' => $task
                    ]);
                }
            }
            $skp->load('task','skpd');
        }
        if ($json)
            return response()->json($skp->toArray());
        return $skp;
    }

    public function update(Request $request,$id,$json = true){
        $skp = Skp::where('id',$id)->orWhere('uuid',$id)->firstOrFail();
        $this->validate($request,[
            'nama' => 'required',
            'id_skpd' => 'required|in:'.$this->getListSkpd(),
            'task_edit' => 'array',
            'task_delete' => '',
            'task' => 'array'
        ]);
        $input = $request->input();
        $skp->update($input);
        if ($request->has('task_delete')){
            $task_delete = explode(',',$request->task_delete);
            foreach ($task_delete AS $delete){
                SkpTask::where('uuid',$delete)->delete();
            }
        }
        if ($request->has('task_edit')){
            foreach ($request->task_edit AS $key => $value){
                if ($value) {
                    SkpTask::where('uuid', $key)->update([
                        'task' => $value
                    ]);
                }
            }
        }
        if ($request->has('task')){
            foreach ($request->task AS $new){
                $skp->task()->create([
                    'uuid' => (string)Str::uuid(),
                    'task' => $new
                ]);
            }
        }
        $skp->load('task','skpd');
        if ($json)
            return response()->json($skp->toArray());
        return $skp;
    }

    public function delete($id,$json=true){
        $skp = Skp::whereId($id)->orWhere('uuid',$id)->firstOrFail();
        try {
            $skp->delete();
        } catch (QueryException $exception){
            if ($json)
                return response()->json([
                    'status' => '500',
                    'message' => 'Tidak dapat menghapus Skp, Skp memiliki pegawai aktif'
                ]);
            return [
                'status' => '500',
                'message' => 'Tidak dapat menghapus Skp, Skp memiliki pegawai aktif'
            ];
        } catch (\Exception $exception){
            if ($json)
                return response()->json([
                    'status' => '500',
                    'message' => $exception->getMessage()
                ]);
            return [
                'status' => '500',
                'message' => $exception->getMessage()
            ];
        }
        if ($json)
            return response()->json([
                'status' => '200',
                'message' => 'data berhasil dihapus'
            ]);

        return [
            'status' => '200',
            'message' => 'data berhasil dihapus'
        ];
    }

    private function getListSkpd(){
        return implode(',',Skpd::select('id')->pluck('id')->all());
    }

}
