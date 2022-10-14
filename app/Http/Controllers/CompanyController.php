<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class CompanyController extends Controller
{
    public function getCompany()
    {
        $data = Request::create('/api/get-company', 'GET');
        $compnies = Route::dispatch($data)->getContent();
        $datas = json_decode($compnies);
        return view('compnies', compact('datas'));
    }

    public function addCompanyForm()
    {
        return view('add-company');
    }

    public function editCompanyForm($cid){
        $data = Request::create('/api/get-company/'.$cid, 'GET');
        $compnies = Route::dispatch($data)->getContent();
        $datas = json_decode($compnies);
        return view('edit-company', compact('datas'));
    }

    public function addCompany(Request $req)
    {
        $request = Request::create('/api/create-company', 'POST', [
            'name' => $req->name,
            'email' => $req->email,
            'logo' => $req->logo?$req->logo:'',
            'website' => $req->website,
            'id' => $req->id ? $req->id : NULL,
        ]);
        $response = Route::dispatch($request);
        return redirect()->route('home')->with('success','Company Successfully Created.');
    }

    public function deleteCompany($cid)
    {
        $data = Request::create('/api/delete-company/' . $cid, 'GET');
        Route::dispatch($data)->getContent();
        return redirect()->back()->with('success','Company Successfully delete.');
    }
}
