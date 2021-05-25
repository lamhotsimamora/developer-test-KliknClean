<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Facades\DB;


class CompaniesController extends Controller
{

    public function addCompanies(Request $request){
        $client_token = $request->_token;
        
        $token_server = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {

                    $Companies = new Companies;
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

    public function deleteCompanies(Request $request){
        $client_token       = $request->_token;
        $id                = $request->_id;
        $token_server      = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                    $Companies = Companies::find($id);

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

    public function getFullDataCompanies(Request $request){
        $client_token = $request->_token;
        $token_server      = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                return response()->json([
                    'result' => true,
                    'data' =>  Companies::all('company_id','company_name')
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
                    'data' => Companies::paginate(5)
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

     public function getCountCompanies(Request $request)
    {
        $client_token = $request->_token;
        $token_server = csrf_token();
        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                return response()->json([
                    'result' => true,
                    'total' => Companies::count()
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
        return Companies::all();
    }

    public function getDataReportEmployees(Request $request){
        $client_token = $request->_token;
        $token_server = csrf_token();

        
        if ($client_token == $token_server){    
            if ($request->accepts(['text/html', 'application/json'])) {
                return response()->json([
                    'result' => true,
                    'data' =>DB::table('view_report_employees')->get()
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
}
