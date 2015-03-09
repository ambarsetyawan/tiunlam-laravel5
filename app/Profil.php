<?php namespace tiunlam;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model {

	protected $table = 'profil';

    protected $fillable = ['judul', 'konten', 'slug'];

}
