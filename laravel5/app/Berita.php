<?php namespace tiunlam;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model {

	protected $table = 'berita';

    protected $fillable = ['judul', 'konten', 'slug', 'gambar'];

}
