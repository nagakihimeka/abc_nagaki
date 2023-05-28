<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;


class RegisterFormRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'under_name_kana' => 'required|string|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'mail_address' => 'required|max:100|email:filter,dns|unique:users',
            'sex' => 'required|in:1,2,3',
            'old_year' => 'required | before_or_equal:today | after:2000',
            'old_month' => 'required | before_or_equal:today',
            'old_day' => 'required',
            'role' => 'required',
            'password' => 'required|between:8,30',
            'password-con' => 'required|between:8,30|same:password'
        ];
    }

    public function messages(){
        return [
            'over_name.required' => '姓は必ず入力してください',
            'over_name.string' => '姓は文字列で入力してください',
            'over_name.max' => '姓は10文字以下で入力してください',

            'under_name.required' => '名は必ず入力してください',
            'under_name.string' => '名は文字列で入力してください',
            'under_name.max' => '名は10文字以下で入力してください',

            'over_name_kana.required' => 'セイは必ず入力してください',
            'over_name_kana.string' => 'セイは文字列で入力してください',
            'over_name_kana.max' => 'セイは30文字以下で入力してください',
            'over_name_kana.max' => 'セイはカタカナで入力してくださき',

            'under_name_kana.required' => 'メイは必ず入力してください',
            'under_name_kana.string' => 'メイは文字列で入力してください',
            'under_name_kana.max' => 'メイは30文字以下で入力してください',
            'under_name_kana.max' => 'メイはカタカナで入力してくださき',

            'sex.required' => '必ず選択してください',
            'sex.in' => '男性、女性、その他から選択してください',

            'old_year.required' => '必ず入力してください',
            'old_year.before_or_equal' => '今日までの日付で入力してください',
            'before_or_equal.after' => '2000年以降が有効です',

            'old_month.required' => '必ず入力してください',
            'old_month.before_or_equal' => '今日までの日付で入力してください',
            'old_month.after' => '2000年以降が有効です'

        ];
    }
}
