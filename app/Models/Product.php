<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded;

    public function category(){
        return $this->belongsTo(Category::class);
    }

     public function author(){
         return $this->belongsTo(Author::class);
    }

      public function publisher(){
          return $this->belongsTo(Publisher::class);
      }
    //  public function orders() {
    //     return $this->hasMany(Order::class);
        
    //  }
    public function increaseStock($quantity)
    {
        $this->stock += $quantity;
        $this->save();
    }
}
