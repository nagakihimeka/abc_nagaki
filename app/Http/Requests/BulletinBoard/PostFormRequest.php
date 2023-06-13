<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $sub_category = ['国語','数学','英語'];
        return [
            'post_category_id' => 'required|Rule::in($sub_category)',
            'post_title' => 'required | string | max:100',
            'post_body' => 'required|string|min:10|max:5000',
        ];
    }

    public function messages(){
        return [
            'post_category_id.required' => 'サブカテゴリーを選択してください',
            'post_category_id.Rule::in' => '国語、数学、英語の中から選択してください',
            'post_title.required' => 'タイトルは必ず入力してください',
            'post_title.string' => 'タイトルは文字列で入力してください',
            'post_title.max' => 'タイトルは100文字以内で入力してください。',
            'post_body.required' => '内容は必ず入力してください。',
            'post_body.string' => '内容は文字列で入力してください。',
            'post_body.min' => '内容は10文字以上入力してください。',
            'post_body.max' => '最大文字数は5000文字です。',

        ];
    }
}
