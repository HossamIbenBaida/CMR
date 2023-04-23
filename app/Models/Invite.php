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
        'token',
        'admin_id'
    ];
    public function admin(){
        
        return $this->belongsTo(Admin::class);
    }
}
