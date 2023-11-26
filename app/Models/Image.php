<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table ='images';
    use HasFactory;
    protected $fillable = [

        'url_images','idAnnonce','idUser'
    ];
    public function annonces()
    {
        return $this->belongsToMany(Annonce::class, 'annonce_images', 'image_id', 'annonce_id');
    }

}
