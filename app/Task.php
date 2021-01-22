<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * 「状態」を表す数値に文字列とスタイルのクラスを設定する
     */
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'label-danger'],
        2 => ['label' => '着手中', 'class' => 'label-info'],
        3 => ['label' => '完了', 'class' => ''],
    ];

    /**
     * データベースからタスクを取得した時、自動で表示する文字列を変換する
     * 
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態の数値を取得する
        $status = $this->attributes['status'];
        // 数値と一致する設定したリストの文字列を表示する
        if (isset($status)) {
            return self::STATUS[$status]['label'];
        }
        // 数値が設定値と一致しない場合、空欄を返す
        else {
            return '';
        }
    }

    /**
     * データベースからタスクを取得した時、自動で状態のスタイルのクラスを設定する
     * 
     * @return string
     */
    public function getStatusClassAttribute()
    {
        // 状態の数値を取得する
        $status = $this->attributes['status'];
        // 数値と一致する設定したリストのクラスをタグに追加する
        if (isset($status)) {
            return self::STATUS[$status]['class'];
        }
        // 数値が設定値と一致しない場合、空欄を返す
        else {
            return '';
        }
    }

    /**
     * データベースからタスクを取得した時、自動で期限日の表示内容を変換する
     * 
     * @return string
     */
    public function getDueDateAttribute()
    {
        // 状態の数値を取得する
        $due_date = $this->attributes['due_date'];
        // 数値と一致する設定したリストのクラスをタグに追加する
        if (isset($due_date)) {
            return Carbon::parse($due_date)->format('Y/m/d');
        }
        // 数値が設定値と一致しない場合、空欄を返す
        else {
            return '';
        }
    }
}
