<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formation extends Model
{
    use HasFactory;

    protected $table = 'formations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'image',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
