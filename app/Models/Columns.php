<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color', 'dashboard_id'];

    public function dashboard(){
        return $this->belongsTo(Dashboard::class);
    }

    public function cards(){
        return $this->hasMany(Card::class, 'column_id');
    }
}
