<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
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
        'gender',
        'name',
        'surname',
        'date_of_birth',
        'address',
        'post_code',
        'contact_number_1',
        'contact_number_2'
    ];

    /**
     * Get the user in the organization
     */
    public function kin()
    {
        return $this->hasOne(Kin::class, 'id_card', 'id_card');
    }
}
