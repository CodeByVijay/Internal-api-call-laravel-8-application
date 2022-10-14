<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyApiController extends Controller
{
    public function createCompany(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:min_width=100,min_height=100',
            'website' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors->toJson();
        }
        if(!$req->id){
            $company = new Company();

        }else{
            $company = Company::find($req->id);
        }

        $company->name = $req->name;
        $company->email = $req->email;
        $path = $req->file('logo')->store('/public/logo');
        $company->logo = $path;
        $company->website = $req->website;
        $company->save();

        return response()->json(["result" => "success"], 200);
    }

    public function getCompany()
    {
        $compnies = Company::get();
        return response()->json($compnies, 200);
    }
    public function getCompanybyId($id)
    {
        $company = Company::find($id);
        return response()->json($company, 200);
    }
    public function deleteCompany($id){
        Company::find($id)->delete();
        return response()->json(["response"=>"success"], 200);
    }

   
}
