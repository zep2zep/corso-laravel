<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'create_at',
    //     'update_at',
    // ];
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    //Funzione che restituisce l'utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
