<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $all)
 * @method static findOrFail(int $id)
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date_assigned', 'date_due', 'user_id'];

    /**
     * define a many to one relationship between task and user
     *  a task can only be created by 1 user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
