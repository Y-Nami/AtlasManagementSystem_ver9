<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [];

        if($this->input('form_id') == "main"){
            $rules = [
                'main_category_name' => [
                    'required','max:100','string','unique:main_categories,main_category'
                ],
            ];
        }

        if($this->input('form_id') == "sub"){
            $rules = [
                'main_category_id' => [
                    'required','exists:main_categories,id'
                ],
                'sub_category_name' => [
                    'required','max:100','string','unique:sub_categories,sub_category'
                ]
            ];
        }

        return $rules;
    }

    public function messages(){
        return [
            '*.required' => ':attributeは必ず入力してください。',
            '*.max' => ':attributeは:max文字以下で入力してください。',
            '*.string' => ':attributeは文字列のみ入力可能です。',
            '*.unique' => ':attributeは既に登録されています。',
            '*.exists' => ':attributeが存在しません。'
        ];
    }

    public function attributes(){
        return [
            'main_category_name' => 'メインカテゴリー',
            'sub_category_name' => 'サブカテゴリー',
            'main_category_id' => 'メインカテゴリー'
        ];
    }
}
