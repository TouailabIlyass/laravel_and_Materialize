<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Cve;

class CveController extends Controller
{
    public function list($limit = 0)
    {
        $cves = Cve::limit(2)->offset($limit)->get();
        $date = date('H:i');

        return view('cves',['cves'=>$cves,'limit' => $limit,'date'=> $date]);
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

    public function edit(Request $request, $id)
    {
        $cve = Cve::find($id);

        return redirect()->back()->with(['cveEdit' => $cve]);
    }

    public function update(Request $request, $id)
    {
        $cve = Cve::find($id);
        $data = request()->validate([
            'information' => 'required|min:5',
            'link' => 'required',
        ]);
        $cve->information = request('information');
        $cve->link = request('link');
        $cve->save();

        return back();
    }

    public function  delete(Request $request, $id)
    {
           # return $request->all();

           $cve =  Cve::find($id);
           $cve->delete();

           return back();
    }

    public function getData(Request $request, $next = 2)
    {
        $resp = Http::get('https://cve.circl.lu/api/last/'.$next)->json();
        
        //$data = array_slice($resp, $next-2,$next, true);
        //return view('data',compact('data','next'));
        $cve;
        foreach ($resp as $item){
            $cve = new Cve();
        $cve->id = $item['id'];
        $cve->cwe = $item['cwe'];
        $cve->cvss = $item['cvss'];
        $cve->assigner = $item['assigner'];
        $cve->link = $item['references'][0];
        $cve->information = $item['summary'];
        $cve->publie = $item['Published'];
        $cve->save();
        }
        return $resp;

    }
}
