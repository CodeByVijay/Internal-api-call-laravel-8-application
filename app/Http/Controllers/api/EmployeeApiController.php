<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeApiController extends Controller
{
    public function addEmployee(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'phone' => 'required|min:10|max:10'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors->toJson();
        }

        if (!$req->id) {
            $employee = new Employee();
        } else {
            $employee = Employee::find($req->id);
        }
        $employee->first_name = $req->first_name;
        $employee->last_name = $req->last_name;
        $employee->company_id = $req->company_id;
        $employee->email = $req->email;
        $employee->phone = $req->phone;
        $employee->save();

        return response()->json(["result" => "Success"], 200);
    }

    public function getEmployee()
    {
        $employees = Employee::join('companies','companies.id','=','employees.company_id')->select('companies.name','employees.*')->get();
        return response()->json($employees, 200);
    }
    public function getEmployeebyId($id)
    {
        $company = Employee::find($id);
        return response()->json($company, 200);
    }
    public function deleteEmployee($id){
        Employee::find($id)->delete();
        return response()->json(["response"=>"success"], 200);
    }

    public function getEmployeebyCId($cid){
        $employees = Employee::join('companies','companies.id','=','employees.company_id')->where('employees.company_id',$cid)->select('companies.name','employees.*')->get();
        return response()->json($employees, 200);
    }
}
