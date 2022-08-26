<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name','label'];

    public function abilities(){
        return $this->belongsToMany(Ability::class)->withTimeStamps();
    }

    public function allowTo($ability){
        $this->abilities()->sync($ability, false);
    }
}
