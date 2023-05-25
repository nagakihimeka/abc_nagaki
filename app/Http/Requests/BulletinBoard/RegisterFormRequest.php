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
            'over_name' => 'required|string|max:10'
            //
        ];
    }

    public function messages(){
        return [
            // 'post_title.min' => 'タイトルは4文字以上入力してください。',
            'over_name.register' => '姓は入力必須です'

        ];
    }
}
