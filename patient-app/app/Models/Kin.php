<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'id_card',
        'kin_id_card'
    ];

    /**
     * Get the user in the organization
     */
    public function person()
    {
        return $this->hasOne(Person::class, 'id_card', 'kin_id_card');
    }
}
