<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'main_category_id' => 'required | exists:main_categories,id',
            'sub_category' => 'required | max:100 | string | unique:sub_categories'
        ];
    }

    public function messages() {
        return [
            'main_category_id.required' =>'必ず選択してください',
            'main_category_id.exists' => '存在しないメインカテゴリーです',
            'sub_category.required' => 'サブカテゴリーは入力必須です',
            'sub_category.max' => 'サブカテゴリーは100文字以内で入力してください',
            'sub_category.string' => 'サブカテゴリーは文字列で入力してください',
            'sub_category.unique' => 'すでに登録されています'

        ];
    }
}
