<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';
    protected $fillable = [
        'name',
        'description',
        'about_worker',
        'responsibilities',
        'requirements',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }


    public function getDiffDate()
    {
        return $this->created_at->locale(App::currentLocale())->diffForHumans();
    }
}
