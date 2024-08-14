<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    const STATUS_DEFAULT = 0; //pending
    const STATUS_COMPLETED = 1; // completed
    const STATUS_DELETED = 2;
    protected $table = 'tasks'; 
    protected $fillable = [
        'task_name',
        'status'
    ];

    // Other model methods and properties
}
