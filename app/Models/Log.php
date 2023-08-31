<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id' , 'ip' , 'user_agent' , 'downloaded_at', 'country' , 'country_code'
    ];


    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
