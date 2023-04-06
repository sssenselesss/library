<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'category_id',
        'content',
        'age',
        'count_list',
        'year',
        'image',
        'file_path'

    ];

    public function getImageUrlAttribute()
    {
        return asset(Storage::url($this->image));
    }

    public function getIFileUrlAttribute()
    {
        return asset(  Storage::url($this->file_path));
    }

}
