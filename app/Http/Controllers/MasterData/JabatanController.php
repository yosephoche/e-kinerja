<?php

namespace App\Http\Controllers\MasterData;

use App\Models\MasterData\Eselon;
use App\Models\MasterData\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class JabatanController extends MasterDataController
{
    public function index(Request $request){
        /*$this->show_limit = $request->has('s') ? $request->input('s') : $this->show_limit;
        $this->query = $request->has('q') ? $request->input('q') : $this->query;
        $jabatan = new Jabatan();
        if ($this->query){
            $jabatan = $jabatan->where('jabatan','like','%'.$this->query.'%')
                ->orWhere('id_eselon','like','%'.$this->query.'%')
                ->orWhere('id_atasan','like','%'.$this->query.'%');
        }
        $jabatan = $jabatan->paginate($this->show_limit);*/
        return view('layouts.admin.jabatan.index');
    }

    public function show($id){
        $jabatan = Jabatan::with('atasan','eselon')->where('id',$id)->orWhere('uuid',$id)->firstOrFail();
        return view('layouts.admin.jabatan.detail',compact('jabatan'));
    }

    public function add(){
        $data_option = new \stdClass();
        $data_option->eselon = Eselon::get();
        $data_option->jabatan = Jabatan::get();
        return view('layouts.admin.jabatan.add',compact('data_option'));
    }

    public function edit($id){
        $jabatan = Jabatan::with('atasan','eselon')->where('id',$id)->orWhere('uuid',$id)->firstOrFail();
        $data_option = new \stdClass();
        $data_option->eselon = Eselon::get();
        $data_option->jabatan = Jabatan::get();
        return view('layouts.admin.jabatan.edit',compact('jabatan','data_option'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'jabatan' => 'required',
            'id_eselon' => 'required|in:'.$this->getListEselon(),
//            'id_atasan' => 'in:'.$this->getListJabatan(),
        ]);
        $input = $request->input();
        $input['uuid'] = (string)Str::uuid();

        $agama = Jabatan::create($input);
        return response()->json($agama->toArray());
    }

    public function update(Request $request,$id){
        $jabatan = Jabatan::where('id',$id)->orWhere('uuid',$id)->firstOrFail();
        $this->validate($request,[
            'jabatan' => 'required',
            'id_eselon' => 'required|in:'.$this->getListEselon(),
//            'id_atasan' => 'in:'.$this->getListJabatan().'|not_in:'.$jabatan->id,
        ]);
        $input = $request->input();
        $jabatan->update($input);
        return response()->json($jabatan->toArray());
    }

    public function delete($id){
        $jabatan = Jabatan::whereId($id)->orWhere('uuid',$id)->firstOrFail();
        try {
            $jabatan->delete();
        } catch (\Exception $exception){}
        return response()->json([
            'message' => 'berhasil menghapus data'
        ]);
    }

    private function getListEselon(){
        return implode(',',Eselon::select('id')->pluck('id')->all());
    }

    private function getListJabatan(){
        return implode(',',Jabatan::select('id')->pluck('id')->all());
    }
}
