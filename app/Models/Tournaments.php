<?php
use Illuminate\7Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use HasFactory;

namespace App\Models;


class Tournament extends Model
{

    protected $table = 'tournaments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'portada',
        'description',
        'code',
        'no_players',
        'isFree',
        'start_date',
        'game',
        'comunity',
        'name',
        // Add more fillable attributes here
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        // Add more hidden attributes here
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        // Add relationships to be eager loaded here
    ];

    /**
     * Get the user that owns the tournament.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}