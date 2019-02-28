<?php

namespace App\Http\Controllers;
use App\Http\Requests\validateFormTintuc;
use App\loaitin;
use App\tintuc;
use Illuminate\Http\Request;
use DB;

class tintucController extends Controller
{
    public function xemdanhsach()
    {
        $tintuc = DB::select('SELECT * FROM tintuc, loaitin WHERE tintuc.id_loai = loaitin.id_loai && loaitin.status = 1');
        return view('baiviet', ['tintuc' => $tintuc]);

    }
    public function themdanhsach()
    {
        $loaitin = loaitin::all();
    	return view('addTintuc', ['loaitin' => $loaitin]);
    }
    public function suadanhsach()
    {
    	
    }
    public function add(validateFormTintuc $request)
    {

        $tieude = $request->tieude;
        $tomtat = $request->tomtat;
        $noidung = $request->noidung;
        $loaitin = $request->loaitin;
        $pic = $request->pic;
        $pic-> move('img', $pic->getClientOriginalName());
        $path = 'img/' . $pic->getClientOriginalName();
        $tintuc = DB::table('tintuc')->insert([
            'tieude' => $tieude, 'tomtat' => $tomtat, 'thumbnail' => $path, 'noidung' => $noidung, 'id_loai' => $loaitin
        ]);
        return redirect()->route('xemtt');
    }

    public function xoadanhsach(Request $request)
    {
        $id = $request->id;
        $tintuc = tintuc::where('id_tintuc', $id);
        $tintuc->delete();
        $tintuc = DB::select('SELECT tieude, tomtat, tenloai, thumbnail FROM tintuc, loaitin WHERE tintuc.id_loai = loaitin.id_loai && loaitin.status = 1');
        return $tintuc;
    }

}