<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStory extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'project_id', 'status', 'code', 'condtion', 'expectation', 'objective', ' test', ' feedbacks', 'tested_at'
    // ];

    protected $guarded = [];

    // protected $with = ['project_id'];

    public function project()
    {
        $this->belongsTo(Project::class);
    }

    // public function test()
    // {
    //     $this->hasMany(Test::class);
    // }
}
