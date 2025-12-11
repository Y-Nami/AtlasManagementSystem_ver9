<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'over_name' => ['required', 'string', 'max:10'],
            'under_name' => ['required', 'string', 'max:10'],
            'over_name_kana' => ['required', 'string', 'regex:/\A[ァ-ヴー]+\z/u', 'max:30'],
            'under_name_kana' => ['required', 'string', 'regex:/\A[ァ-ヴー]+\z/u', 'max:30'],
            'mail_address' => ['required', 'email', 'unique:users,mail_address', 'max:100'],
            'sex' => ['required', 'regex:/[1,2,3]/'],
            'old_year' => ['required'],
            'old_month' => ['required'],
            'old_day' => ['required'],
            'role' => ['required', 'regex:/[1,2,3,4]/'],
            'password' => ['required', 'min:8', 'max:30', 'confirmed']
            //
        ];
    }
    public function after(){    //★うまく動いてない！！！
        return [
            function($validator){
                $y = $this->input('old_year');
                $m = $this->input('old_month');
                $d = $this->input('old_day');

                if(!checkdate($m, $d, $y)){
                    $validator->errors()->add('birthday', '存在しない日付です');
                }

                $inputDate = $y."-".$m."-".$d;
                if($inputDate >= date('Y-m-d')){
                    $validator->errors()->add('birthday', '未来の日付です');
                }
                if($inputDate <= '2000-1-1'){
                    $validator->errors()->add('birthday', '2000年1月1日以降の日付を入力してください');
                }
            }
        ];
    }
}
