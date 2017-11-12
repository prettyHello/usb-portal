<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Testing\FileFactory;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = ['name', 'extension', 'id_user', 'real_name'];
    public $timestamps = true;

    public static function fake()
    {
        return new FileFactory();
    }
}
