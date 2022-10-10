<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    public function columns(){
        return $this->hasMany(Columns::class);
    }

    public function cardsColumns(){
        return $this->hasManyThrough(Card::class, Columns::class,'dashboard_id','column_id');
    }
}
