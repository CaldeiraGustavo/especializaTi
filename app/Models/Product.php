<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'image'];

    function search($filter = '') {
        $results = $this->where(function ($query) use($filter) {
            if($filter) {
                $query->where('name', 'LIKE' , "%{$filter}%");
            }
        })->paginate();
        return $results;
    }
}
