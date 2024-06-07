<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Repley ;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['full_name','email','object','read','tel','msg','user_id'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];
    public function repleys() {
        return $this->hasMany(Repley::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
