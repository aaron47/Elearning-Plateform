<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $table = 'formation_participants';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'formation_id'
    ];

    public $timestamps = false;
}
