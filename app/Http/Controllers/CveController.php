<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CveController extends Controller
{
    public function list()
    {
        $list=['test1','test2'];

        return view('internals.cves',['list',$list]);
    }
}
