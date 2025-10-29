<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adoption extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'pet_id',
    ];

    // RelationShip
    // Adoption belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Adoption belongs to Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}