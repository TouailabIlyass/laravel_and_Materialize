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
}
