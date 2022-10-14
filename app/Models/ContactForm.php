<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'email',
        'url',
        'gender',
        'age',
        'contact'
    ];

    public function scopeSearch($query, $search) // 検索フォーム用のクエリローカルスコープ
    {
        if ($search !== null) {
            $search_split = mb_convert_kana($search, 's'); // 全角の空白を半角空白に変換
            $search_split2 = preg_split('/[\s]+/', $search_split); // 空白区切りで配列に代入
            foreach ($search_split2 as $value) {
                $query->where('name', 'like', '%' .$value. '%');
            }
            return $query;
        }
    }
}
