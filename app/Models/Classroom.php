<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'class_name',
        'description',
    ];

    // public funtion User()
    // {
    //     return $this->BelongsTo(User::class,'class_room');
    // }++


    public function students()
    {
        
        return $this->belongsToMany(Student::class, 'class_student', 'class_id', 'student_id');
    }
}
