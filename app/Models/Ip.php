<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
