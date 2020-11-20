<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $table = 'kategoris';
    protected $primarykey = 'id';
    protected $guarded = [];
    public $timestamps = true;
}
