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
            'over_name_kana' => [
                'required', 'string', 'regex:/\A[ァ-ヴー]+\z/u', 'max:30'
            ],
            'under_name_kana' => [
                'required', 'string', 'regex:/\A[ァ-ヴー]+\z/u', 'max:30'
            ],
            'mail_address' => [
                'required', 'email', 'unique:users,mail_address', 'max:100'
            ],
            'sex' => ['required', 'regex:/[1,2,3]/'],
            'old_year' => ['required'],
            'old_month' => ['required'],
            'old_day' => ['required'],
            'role' => ['required', 'regex:/[1,2,3,4]/'],
            'password' => ['required', 'min:8', 'max:30', 'confirmed'],

            'date' => ['date', 'after:2000-01-01', 'before:today']
        ];
    }

    public function validationData(){
        $data = $this->all();
        $data['date'] = "{$data['old_year']}-{$data['old_month']}-{$data['old_day']}";
        return $data;
    }

    public function messages(){
        return[
            '*.required' => '必ず入力してください。',
            '*.string' => ':attributeは文字列である必要があります。',
            '*.min' => ':min文字以上で入力してください。',
            '*.max' => ':max文字以下で入力してください。',
            'over_name_kana.regex' => 'セイはカタカナで入力してください。',
            'under_name_kana.regex' => 'メイはカタカナで入力してください。',
            'mail_address.email' => '有効なメールアドレスを入力してください。',
            'mail_address.unique' => '既に登録されています。',
            'date.date' => '入力された日付が存在しません。',
            'date.before' => ':dateより前の日付を入力してください。',
            'date.after' => ':dateより後の日付を入力してください。',
            'password.confirmed' => 'パスワードが一致していません。'
        ];
    }
}
