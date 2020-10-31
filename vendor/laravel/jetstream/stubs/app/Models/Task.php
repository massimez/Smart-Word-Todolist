<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'todolist_id',
        'taskname',
        'description',
        'duedate',
        'priority',
        'completed',
    ];
    public function todolist()
    {
        return $this->belongsTo(Todolist::class, 'todolist_id');
    }
}
