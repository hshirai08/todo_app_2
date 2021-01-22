<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FolderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 認証関係の判定を行わない場合は常にtrueを返す
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // バリデーションの条件を設定する
        return [
            'title' => 'required|max:20',
        ];
    }

    /**
     * エラー項目を日本語化
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'フォルダ名',
        ];
    }
}
