<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    public function ips()
    {
        return $this->hasMany(Ip::class);
    }
}
