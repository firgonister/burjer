<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $primarykey = 'id';
    protected $guarded = [];
    public $timestamps = true;

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function user()
    {
    	return $this->belongsTo(Kategori::class, 'id_user');
    }
}
