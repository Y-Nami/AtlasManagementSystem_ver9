<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
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
            'post_title' => [
                'required', 'string', 'max:100'
            ],
            'post_body' => [
                'required', 'string', 'max:2000'
            ]
        ];
    }

    public function messages(){
        return [
            '*.required' => ':attributeは必ず入力してください。',
            '*.string' => ':attributeは文字列である必要があります。',
            '*.max' => ':attributeは:max以下で入力してください。'
        ];
    }

    public function attributes(){
        return [
            'post_title' => 'タイトル',
            'post_body' => '本文'
        ];
    }
}
