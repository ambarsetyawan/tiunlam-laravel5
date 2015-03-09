<?php namespace tiunlam;

use Illuminate\Database\Eloquent\Model;

class About extends Model {

    protected $table = 'about';

    protected $fillable = ['judul', 'konten', 'slug'];

}
