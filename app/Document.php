<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = ['name', 'extension', 'id_user'];
    public $timestamps = true;
}
