<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cve;

class CveController extends Controller
{
    public function list()
    {
        $cves = Cve::all();

        return view('cves',['cves'=>$cves]);
    }

    public function save()
    {
        $data = request()->validate([
            'information' => 'required|min:5',
            'link' => 'required',
        ]);
        $cve = new Cve();
        $cve->information = request('information');
        $cve->link = request('link');
        $cve->save();

        return back();
    }
}
