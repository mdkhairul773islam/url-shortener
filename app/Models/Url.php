<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class Url extends Model
{
    use HasFactory;

    public function generateShortUrl()
    {
        $hashids = new Hashids('your-secret-salt', 6); // 6 is the desired length of the short URL
        $id =  random_int(10, 100);
        
        return $hashids->encode($id);
    }

}
