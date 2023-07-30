<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name','path','link','user_id'];

    // public static $disk = '';

    function getRouteKey()
    {
        return 'link';
    }

    public static function uploadFile($file)
    {
        $path = $file->store('uploads');
        return $path;
    }

}
