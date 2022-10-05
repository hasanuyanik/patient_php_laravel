<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'person_id'
    ];

    /**
     * Get the user in the organization
     */
    public function person()
    {
        return $this->hasOne(Person::class, 'person_id', 'id');
    }

    /**
     * Get the user in the organization
     */
    public function medical()
    {
        return $this->hasOne(Medical::class, 'id', 'patient_id');
    }

}
