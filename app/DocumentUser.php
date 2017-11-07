<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentUser extends Model
{
    protected $table = 'document_user';
    protected $fillable = ['user_id', 'document_id', 'action'];
    public $timestamps = true;
}
