<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'patient_id',
        'name',
        'notes',
        'type',
        'start_date',
        'end_date'
    ];

    /**
     * Get the user in the organization
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
