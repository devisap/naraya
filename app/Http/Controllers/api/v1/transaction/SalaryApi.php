<?php

namespace App\Http\Controllers\api\v1\transaction;

use App\Http\Controllers\Controller;
use App\Models\master\Country;
use App\Models\transaction\Salary;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalaryApi extends Controller
{
    public function index(Request $req){
        try {
            if(!$req->date){
                return response([
                    'status_code' => 400,
                    'status_message' => 'Parameter date required'
                ], 200);
            }

            $salary = Salary::where('s_u_id', $req->uId);
            if($req->date == 'all'){
                $res = $salary->orderBy('s_date', 'desc')
                    ->get();
            }else{
                $date = explode('-', $req->date);
                $res = $salary->whereYear('s_date', $date[0])
                    ->whereMonth('s_date', $date[1])
                    ->first();
            }

            if(!$res){
                return response([
                    'status_code'    => 200,
                    'status_message' => 'Data not found'
                ], 200);
            }else{
                return response([
                    'status_code'    => 200,
                    'status_message' => 'Data found',
                    'data'           => $res
                ], 200);
            }
        } catch (Exception $err) {
            return response([
                'status_code' => 500,
                'status_message' => $err->getMessage()
            ], 200);
        }
    }
    public function store(Request $req){
        try {

            $validator = Validator::make($req->all(), [
                'date'      => 'required',
                'nominal'   => 'required|integer'
            ], [
                'required'  => 'Parameter :attribute required',
                'integer'   => 'Parameter :attribute must be interger'
            ]);

            if($validator->fails()){
                return response([
                    'status_code' => 400,
                    'status_message' => $validator->errors()->first()
                ], 400);
            }

            $date = explode('-', $req->date);
            $salaryInMonth = Salary::where('s_u_id', $req->uId)
                ->whereYear('s_date', $date[0])
                ->whereMonth('s_date', $date[1])
                ->first();
            if($salaryInMonth){
                return response([
                    'status_code'    => 400,
                    'status_message' => 'The salary for this month has been entered' 
                ], 200);
            }
            
            $currency = Country::find($req->uCId)->c_currency;
            $formData['s_u_id']     = $req->uId;
            $formData['s_date']     = $req->date;
            $formData['s_nominal']  = $req->nominal;
            $formData['s_currency'] = $currency;
            $formData['created_at'] = Carbon::now();
            Salary::create($formData);

            return response([
                'status_code'    => 200,
                'status_message' => 'Insert data successfuly'
            ], 200);
        } catch (Exception $err) {
            return response([
                'status_code' => 500,
                'status_message' => $err->getMessage()
            ], 200);
        }
    }
}
