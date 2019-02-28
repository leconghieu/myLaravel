<?php

namespace App\Http\Controllers;

use App\loaitin;
use Illuminate\Http\Request;
use Validator;
use DB;


class loaitinController extends Controller
{
    public function xemdanhsach(){
    	$loaitin = loaitin::where('status', 1)->get();
    	return view('loaitin', ['loaitin' => $loaitin]);

    }
    public function themdanhsach(){
    	return view('addloai');
    }
    public function suadanhsach(){
    	
    }
    public function add(Request $request)
    {
        $this->validate($request,
            [
                'maloai' => 'bail|required|max:10|unique:loaitin',
                'tenloai' => 'bail|required|max:100|unique:loaitin'
            ],
            [
                'maloai.unique' => 'Mã loại đã tồn tại',
                'maloai.required' => 'Không được để trống mã loại',
                'tenloai.unique' => 'Tên loại đã tồn tại',
                'tenloai.required' => 'Không được để trống tên loại'
            ]
        );

        DB::table('loaitin')->insert([
          'maloai' => $request->input('maloai'), 'tenloai' => $request->input('tenloai')
        ]);
        return redirect()->route('xemds');

    }
    public function xoadanhsach(Request $request){
        $id = $request->id_loai;
        $loaitin = loaitin::where('id_loai', $id);
        $loaitin->delete();
        $loaitin = DB::select('SELECT * FROM loaitin');
        return $loaitin;
    }

}
