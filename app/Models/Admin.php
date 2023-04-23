<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public function entreprises()
    {
        return $this->hasMany(Entreprise::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function history(){

        return $this->hasMany(History::class);
    }

    public function invite(){
        
        return $this->hasMany(Invite::class);
    }
}
