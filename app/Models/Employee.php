<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
}
