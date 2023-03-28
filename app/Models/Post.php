<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        /** Muchos A uno BELONGS TO, RELACION CONTRARIA, el select hace que se traiga solo los resultados que se expresen ahi */
        return $this->belongsTo(User::class)->select(['username', 'name']);
    }


    public function comentarios(){
        return $this->hasMany(comentario::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
