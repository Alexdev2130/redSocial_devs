<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Policies\PerfilPolicy;
use App\Policies\UserPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts()
    {
       return $this->hasMany(Post::class); /**One To Many (UNO A MUCHOS) */
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    protected $policies = [
        User::class => UserPolicy::class
    ];

    /** BelongsToMany:
     *
     * El tercer argumento es el nombre de clave externa del modelo en el que está definiendo la relación
     *
     * El cuarto argumento es el nombre de clave externa del modelo al que se está uniendo (Es la tabla a la que se le van a agregar la relacion del id, ejemplo: 'follower_id' )
     *
     */

    //Almacena los seguidores de un usuario

    public function followers() {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }


    //Ver cuantos estas siguiendo

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }


    //comprobar si un usuario ya sigue a otro


    public function siguiendo(User $user  /** Esta variable de user contendrá el resultado del registro del usuario de la tabla users CUYO ID que se usará para la consulta se pasará como parametro al emplear la función  */)  {

        //contains itera en la tabla de followers en busca de un registro que coincida con el id que se le esta pasando en dicho metodo
        return $this->followers->contains( $user->id );
    }

    //Almacenar los que seguimos
}
