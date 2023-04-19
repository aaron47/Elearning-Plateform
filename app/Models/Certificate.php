<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_name',
        'name',
        'description',
        'image',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
