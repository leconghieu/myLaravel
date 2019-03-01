<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoaiTinValidate;
use App\loaitin;
use App\tintuc;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Requests\validateUpdateLoaiTin;


class loaitinController extends Controller
{
    public function xemdanhsach(){
    	$loaitin = loaitin::all();
    	return view('loaitin', ['loaitin' => $loaitin]);

    }
    public function themdanhsach(){
    	return view('addloai');
    }
    public function suadanhsach(){
    	
    }
    public function add(LoaiTinValidate $request)
    {
        dd($request->all());
        DB::table('loaitin')->insert([
          'maloai' => $request->input('maloai'), 'tenloai' => $request->input('tenloai')
        ]);
        return redirect()->route('xemds');
    }
    public function xoadanhsach(Request $request)
    {
        $id = $request->id_loai;

        $count = tintuc::where('id_loai', $id)->count();
        if($count == 0){
            $loaitin = loaitin::where('id_loai', $id);
            $loaitin->delete();
            $loaitin = loaitin::all();
            return $loaitin;
        }
        else {
            return ['error' => 'Vẫn còn bài viết thuộc loại tin này.'];
        }

    }

    public function updateLoaitin($id){
        $loaiTin = loaitin::where('id_loai', '=', $id)->first();

        return view('formUpdateLoaiTin', ['loaitin' => $loaiTin]);
    }
    public function update(validateUpdateLoaiTin $request){
        $r = $request;
        $loaitin = [
            'maloai' => $r->maloai,
            'tenloai' => $r->tenloai,
            'status' => $r->status
        ];
        loaitin::where('id_loai', '=', $r->id_loai)->update($loaitin, ['timestamps' => false]);
        return redirect()->route('xemds');
    }

}
