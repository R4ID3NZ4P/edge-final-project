<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    // Define which fields are mass assignable
    protected $fillable = [
        'user_id', // Make sure this column exists in your database
        'title',
        'description',
        'is_completed', // Example field for task completion
    ];

    // Define relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
