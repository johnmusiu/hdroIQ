<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static findorFail(int $id)
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date_assigned', 'date_due', 'user_id'];
}
