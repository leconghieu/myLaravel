<?php

namespace App\Http\Controllers;

use App\loaitin;
use App\tintuc;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $loaitin = loaitin::where('status', 1);
        $tintuc = tintuc::all();
        return view('home', ['loaitin' => $loaitin, 'tintuc' => $tintuc]);
    }
}
