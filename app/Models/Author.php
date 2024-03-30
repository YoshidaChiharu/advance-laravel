<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'nationality'];

    public function getDetail()
    {
        // $txt = 'ID:'.$this->id.' '.$this->name.'('.$this->age.'歳 '.$this->nationality.')';
        $txt = "ID:{$this->id} {$this->name}({$this->age}歳) [{$this->nationality}]";
        return $txt;
    }

    public function book()
    {
        return $this->hasOne('App\Models\Book');
    }
}
