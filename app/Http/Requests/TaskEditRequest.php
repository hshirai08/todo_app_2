<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskEditRequest extends TaskCreateRequest
{
    /**
     * バリデーションの条件をオーバーライド
     *
     * @return array
     */
    public function rules()
    {
        // タスク作成時のバリデーションの条件を取得する
        $rules = parent::rules();
        // 状態のバリデーションルールを設定する
        $status_rule = Rule::in(array_keys(Task::STATUS));

        return $rules + ['status' => 'required|' . $status_rule];
    }

    /**
     * エラーメッセージの内容をオーバーライド
     *
     * @return array
     */
    public function messages()
    {
        // タスク作成時のエラーメッセージを取得する
        $messages = parent::messages();
        // モデルクラスで設定した状態のラベルを文字列に置き換える
        $status_labels = array_map(function ($item) {
            return $item['label'];
        }, Task::STATUS);
        $status_labels = implode('、', $status_labels);
        // 状態のエラーメッセージを設定する
        $status_labels = ':attribute には ' . $status_labels . ' のいずれかを指定してください。';

        return $messages + ['status.in' => $status_labels];
    }
}
