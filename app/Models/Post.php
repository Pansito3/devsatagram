<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion' ,
        'imagen',
        'user_id'
    ];

    public function user()
    {
        ///Un post pertenece a un usuario
        return $this->belongsTo(User::class)->select(['name','username']);
    }
    public function comentarios()
    {
        //Un post tiene muchos comentarios
        return $this->hasMany(Comentario::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function checkLike(User $user)
    {
        //esta usuario ya dio like?
        return $this->likes->contains('user_id', $user->id);
    }
}
