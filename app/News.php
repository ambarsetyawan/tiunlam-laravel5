<?php namespace tiunlam;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	protected $table = 'news';

    protected $fillable = ['judul', 'konten', 'slug', 'gambar'];

}
