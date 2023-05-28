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
            'birth' => 'before:today | after:2000-01-01',
            'role' => 'required | in:1,2,3,4',
            'password' => 'required|between:8,30 | same:password-con'
        ];
    }

    //生年月日入力値を合体
    public function getValidatorInstance()
    {
        if ($this->input('old_day') && $this->input('old_month') && $this->input('old_year'))
        {
            $birthDate = implode('-', $this->only(['old_year', 'old_month', 'old_day']));

            $this->merge([
                'birth' => $birthDate,
            ]);
        }
    return parent::getValidatorInstance();
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
            'over_name_kana.max' => 'セイはカタカナで入力してください',

            'under_name_kana.required' => 'メイは必ず入力してください',
            'under_name_kana.string' => 'メイは文字列で入力してください',
            'under_name_kana.max' => 'メイは30文字以下で入力してください',
            'under_name_kana.max' => 'メイはカタカナで入力してくださき',

            'sex.required' => '必ず選択してください',
            'sex.in' => '男性、女性、その他から選択してください',

            'old_month.required' => '必ず入力してください',
            'old_month.before_or_equal' => '今日までの日付で入力してください',
            'old_month.after' => '2000年以降が有効です',
            'birth.before' => '今日までの日付で選択してください',
            'birth.after' => '2000年1月1日以降を選択してください',

            'role.required' => '役職は必ず選択してください',
            'role.in' => '教師(国語、数学,英語)または生徒を選択してください',

            'password.required' =>'パスワードは必ず入力してください',
            'password.between' =>'パスワードは8文字以上以上30文字以下で入力してください',
            'password.same' => '確認用パスワードが違います'
        ];
    }
}
