<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use Illuminate\Support\Facades\DB;


class CompaniesController extends Controller
{

    public function viewDataPaginates(Request $request){
     //   $token = $request->input('_token');
        $companies = companies::paginate(5);
        return view('companies', $companies);
        //if ($request->accepts(['text/html', 'application/json'])) {
            // ...
       // }
    }
    
    public function viewDetail()
    {
        return companies::all();
    }

}
