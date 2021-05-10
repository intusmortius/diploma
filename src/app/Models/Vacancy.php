<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\App;


class Vacancy extends Model
{

    use HasFactory;

    protected $fillable = [
        'author_id',
        'name',
        'description',
        'about_worker',
        'responsibilities',
        'requirements',
        'personal_skills',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function getDiffDate()
    {
        return $this->created_at->locale(App::currentLocale())->diffForHumans();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/vacancies/' . $this->getKey());
    }
}
