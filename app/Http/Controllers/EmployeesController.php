<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\DB;


class EmployeesController extends Controller
{

    public  function searchDataEmployees(Request $request)
    {
        $client_token = $request->_token;
        $employees_name = $request->_employees_name;
        
        $token_server = csrf_token();

        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                $data = DB::table('view_employees')->where('fullname','LIKE','%'.$employees_name.'%')
                ->get();
                if (count($data)>0){
                    return response()->json([
                        'result' => true,
                        'data' =>  $data
                    ]);
                }else{
                    return response()->json([
                        'result' => false
                    ]);
                }
                
            }else{
                return response()->json([
                    'result' => false,
                    'message' => 'Request is not application/json'
                ]);
            }
        }else{
            return response()->json([
                'result' => false,
                'message' => 'Token is not valid'
            ]);
        }
    }


    public function addEmployees(Request $request){
        $client_token = $request->_token;
        
        $token_server = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {

                    $request->validate([
                        '_company_id' => 'required',
                        '_fullname' => 'required',
                        '_email' => 'required|email:rfc,dns',
                        '_department' => 'required'
                    ]);

                    $Employees = new Employees;
                    $Employees->company_id = $request->_company_id;
                    $Employees->fullname = $request->_fullname;
                    $Employees->email = $request->_email;
                    $Employees->department = $request->_department;

                    return  $Employees->save() ? response()->json([
                        'result'=>true
                    ]) : response()->json([
                        'result' => false,
                        'message' => 'Add failed !'
                    ]);
            }else{
                return response()->json([
                    'result' => false,
                    'message' => 'Request is not application/json'
                ]);
            }
        }else{
            return response()->json([
                'result' => false,
                'message' => 'Token is not valid'
            ]);
        }
    }

    public function deleteEmployees(Request $request){
        $client_token       = $request->_token;
        $token_server      = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {

                    $request->validate([
                        '_id' => 'required'
                    ]);
                    
                    $id  = $request->_id;

                    $Companies = Employees::find($id);

                    return $Companies->delete() ? response()->json([
                        'result'=>true
                    ]) : response()->json([
                        'result' => false,
                        'message' => 'Delete failed !'
                    ]);
            }else{
                return response()->json([
                    'result' => false,
                    'message' => 'Request is not application/json'
                ]);
            }
        }else{
            return response()->json([
                'result' => false,
                'message' => 'Token is not valid'
            ]);
        }
    }

    public function getDataCompaniesEmployees(Request $request){
        $client_token = $request->_token;
        $token_server      = csrf_token();

        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                return response()->json([
                    'result' => true,
                    'data' => DB::table('view_employees')->paginate(5)
                ]);
            }else{
                return response()->json([
                    'result' => false,
                    'message' => 'Request is not application/json'
                ]);
            }
        }else{
            return response()->json([
                'result' => false,
                'message' => 'Token is not valid'
            ]);
        }
    }

    public function getDataEmployeesByCompany(Request $request){
        $client_token = $request->_token;
        $token_server = csrf_token();
        $company_id = $request->_company_id;
         

        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                return response()->json([
                    'result' => true,
                    'data' => Employees::where('company_id',$company_id)->get()
                ]);
            }else{
                return response()->json([
                    'result' => false,
                    'message' => 'Request is not application/json'
                ]);
            }
        }else{
            return response()->json([
                'result' => false,
                'message' => 'Token is not valid'
            ]);
        }
    }

     public function getCountEmployees(Request $request)
    {
        $client_token = $request->_token;
        $token_server = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                return response()->json([
                    'result' => true,
                    'total' => Employees::count()
                ]);
            }else{
                return response()->json([
                    'result' => false,
                    'message' => 'Request is not application/json'
                ]);
            }
        }else{
            return response()->json([
                'result' => false,
                'message' => 'Token is not valid'
            ]);
        }
    }
    
    public function viewDetail()
    {
        return Employees::all();
    }

}
