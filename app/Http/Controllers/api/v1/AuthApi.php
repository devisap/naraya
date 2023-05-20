<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthApi extends Controller
{
    public function login(Request $req){
        try {
            $validator = Validator::make($req->all(), [
                'email'     => 'required|email:rfc,dns',
                'password'  => 'required' 
            ], [
                'required'  => 'Paramater :attribute required',
                'email'     => 'Paramter :attribute not valid'
            ]);
    
            if($validator->fails()){
                return response([
                    'status_code'    => 400,
                    'status_message' => $validator->errors()->first()
                ], 400);
            }
    
            $user = User::where([
                ['u_email', '=', $req->email],
                ['u_password', '=', hash('sha256', md5($req->password))]
            ])
            ->select('u_id', 'u_email', 'u_name', 'u_c_id')
            ->first();
    
            if($user == null){
                return response([
                    'status_code'       => 200,
                    'status_message'    => 'Your email or password is incorrect'
                ]);
            }
    
            $jwt = JWT::encode($user->toArray(), env('JWT_SECRET_KEY'), env("JWT_ALGO"));
            return response([
                'status_code'    => 200,
                'status_message' => 'Login successfuly',
                'data'           => (object)['jwt' => $jwt]
            ], 200);
        } catch (Exception $err) {
            return response([
                'status_code'    => 500,
                'status_message' => $err->getMessage()
            ], 200);
        }
    }
    public function register(Request $req){
        try {
            $validator = Validator::make($req->all(), [
                'email'             => 'required|email:rfc,dns|unique:user,u_email',
                'password'          => 'required',
                'name'              => 'required',
                'passporNumber'     => 'required',
                'passporImage'      => 'required|mimes:jpg,bmp,png|max:500',
                'passporExpDate'    => 'required',
                'permitDate'        => 'required',
                'permitExpDate'     => 'required',
                'paymentNominal'    => 'required|integer',
                'paymentDate'       => 'required',
                'photo'             => 'required|mimes:jpg,bmp,png|max:500',
                'countryId'         => 'required|integer|exists:m_country,c_id',
                'cidb'              => 'required',
                'perkeso'           => 'required',
                'insuran'           => 'required',
                'numberPhone'       => 'required',
            ], [
                'required'  => 'Paramater :attribute required',
                'email'     => 'Parameter :attribute not valid',
                'unique'    => 'Parameter :attribute already exists',
                'exists'    => 'Parameter :attribute not exists',
                'mimes'     => 'Parameter :attribute must be JPG or BMP or PNG',
                'max'       => 'Parameter :attribute max 500Kb',
                'integer'   => 'Parameter :attribute must be integer'
            ]);

            if($validator->fails()){
                return response([
                    'status_code' => 400,
                    'status_message' => $validator->errors()->first()
                ], 400);
            }

            $filePassporImage   = $req->file('passporImage');
            $extension          = $filePassporImage->extension();
            $newFileName        = md5(Carbon::now()->format('YmdHis')."passpor");
            $upPassporImage     = $filePassporImage->storeAs('public/passpor-image', $newFileName.'.'.$extension);
            $urlPassporImage    = Storage::url($upPassporImage);
            
            $fileUserImage  = $req->file('photo');
            $extension      = $fileUserImage->extension();
            $newFileName    = md5(Carbon::now()->format('YmdHis')."usr");
            $upUserImage    = $fileUserImage->storeAs('public/user-image', $newFileName.'.'.$extension);
            $urlUserImage   = Storage::url($upUserImage);

            $formData['u_email']            = $req->email;
            $formData['u_password']         = hash('sha256', md5($req->password));
            $formData['u_r_id']             = 2;
            $formData['u_name']             = $req->name;
            $formData['u_passpor_number']   = $req->passporNumber;
            $formData['u_passpor_img']      = $urlPassporImage;
            $formData['u_passpor_exp_date'] = $req->passporExpDate;
            $formData['u_permit_date']      = $req->permitDate;
            $formData['u_permit_exp_date']  = $req->permitExpDate;
            $formData['u_payment_nominal']  = $req->paymentNominal;
            $formData['u_payment_date']     = $req->paymentDate;
            $formData['u_img']              = $urlUserImage;
            $formData['u_c_id']             = $req->countryId;
            $formData['u_cidb']             = $req->cidb;
            $formData['u_perkeso']          = $req->perkeso;
            $formData['u_insuran']          = $req->insuran;
            $formData['u_number_phone']     = $req->numberPhone;
            $formData['created_at']         = Carbon::now();
            User::create($formData);

            return response([
                'status_code' => 200,
                'status_message' => 'Register successfuly'
            ], 200);

        } catch (Exception $err) {
            return response([
                'status_code'    => 500,
                'status_message' => $err->getMessage()
            ], 200);
        }
    }
}
