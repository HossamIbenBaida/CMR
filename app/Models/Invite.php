<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'entreprise_id',
        'token',
        'admin_id'
    ];
    public function admin(){
        
        return $this->belongsTo(Admin::class);
    }
    public function entreprise(){
        
        return $this->belongsTo(Entreprise::class);
    }
}
