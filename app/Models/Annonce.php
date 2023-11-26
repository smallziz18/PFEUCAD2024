<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Application;

class Annonce extends Model
{
    protected $table ='annonce';
    use HasFactory;
    protected $fillable = [

        'user_id','titre','description','prix','categorie','statu'

    ];


    public function user()
    {
        return $this->belongsTo(User::class, );
    }
    public function images()
    {
        return $this->belongsToMany(Image::class, 'annonce_images');
    }


    protected $with = ['images'];
}


