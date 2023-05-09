<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function formations(): BelongsTo
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }
}
