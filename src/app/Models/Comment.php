<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'user_id',
        'vacancy_id',
    ];

    use HasFactory;

    public function getDiffDate()
    {
        return $this->created_at->locale(App::currentLocale())->diffForHumans();
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
