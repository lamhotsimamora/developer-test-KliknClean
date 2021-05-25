<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\DB;


class EmployeesController extends Controller
{

    public function addEmployees(Request $request){
        $client_token = $request->_token;
        
        $token_server = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {

                    $Companies = new Employees;
                    $Companies->company_name = $request->_name;
                    $Companies->company_email = $request->_email;
                    $Companies->company_address = $request->_address;
                    $Companies->company_phone = $request->_phone;

                    return  $Companies->save() ? response()->json([
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
        $id                = $request->_id;
        $token_server      = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
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

    public function viewDataPaginates(Request $request){
        $client_token = $request->_token;
        $token_server      = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                return response()->json([
                    'result' => true,
                    'data' => Employees::paginate(5)
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
