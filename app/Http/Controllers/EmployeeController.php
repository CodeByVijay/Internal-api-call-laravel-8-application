<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EmployeeController extends Controller
{
    public function getEmployee($cid = NULL)
    {
        if ($cid == NULL) {
            $data = Request::create('/api/get-employee', 'GET');
        } else {
            $data = Request::create('/api/get-employee-company-wise/' . $cid, 'GET');
        }

        $employees = Route::dispatch($data)->getContent();
        $datas = json_decode($employees);
        return view('employees', compact('datas'));
    }

    public function addEmployeeForm()
    {
        $data = Request::create('/api/get-company', 'GET');
        $compnies = Route::dispatch($data)->getContent();
        $datas = json_decode($compnies);
        return view('add-employee', compact('datas'));
    }

    public function editEmployeeForm($eid)
    {
        $emp = Request::create('/api/get-employee/' . $eid, 'GET');
        $employee = Route::dispatch($emp)->getContent();
        $empdata = json_decode($employee);

        $data = Request::create('/api/get-company', 'GET');
        $compnies = Route::dispatch($data)->getContent();
        $datas = json_decode($compnies);

        return view('edit-employee', compact('datas', 'empdata'));
    }

    public function addEmployee(Request $req)
    {
        $request = Request::create('/api/add-employee', 'POST', [
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'email' => $req->email,
            'phone' => $req->phone,
            'company_id' => $req->company_id,
            'id' => $req->id ? $req->id : NULL,
        ]);
        Route::dispatch($request);
        return redirect()->route('employee')->with('success', 'Employee Successfully Created.');
    }

    public function deleteEmployee($eid)
    {
        $data = Request::create('/api/delete-employee/' . $eid, 'GET');
        Route::dispatch($data)->getContent();
        return redirect()->back()->with('success', 'Employee Successfully Delete.');
    }
}
