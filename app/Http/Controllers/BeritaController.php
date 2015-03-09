<?php namespace tiunlam\Http\Controllers;

use tiunlam\Http\Requests;
use tiunlam\Http\Controllers\Controller;

use Illuminate\Http\Request;

use tiunlam\Berita;
use tiunlam\News;

class BeritaController extends Controller {

	public function index()
    {
    $semua_berita = Berita::all();
    return view('berita.daftarberita', compact('semua_berita','semua_profil'));
    }

    public function show($slug)
    {
    $berita = Berita::whereSlug($slug)->firstOrFail();
    return view('berita.showberita', compact('berita','semua_profil'));
    }

    public function index_en()
    {
    $semua_berita = News::all();
    return view('berita.daftarberita', compact('semua_berita','about'));
    }

    public function show_en($slug)
    {
    $berita = News::whereSlug($slug)->firstOrFail();
    return view('berita.showberita', compact('berita','about'));
    }

}
