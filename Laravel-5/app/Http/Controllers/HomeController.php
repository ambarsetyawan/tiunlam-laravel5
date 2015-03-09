<?php namespace tiunlam\Http\Controllers;

use tiunlam\Http\Requests;
use tiunlam\Http\Controllers\Controller;

use Request;
use Redirect;
use Auth;
use DB;

use tiunlam\Profil;
use tiunlam\About;
use tiunlam\Berita;
use tiunlam\News;


class HomeController extends Controller {

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function search()
    {
    $cari = Request::get('cari');
    return Redirect::route('searchresults', compact('cari'));
    }

    #Search
    public function searchresults($cari)
    {
    $search_profil = Profil::where('judul', 'LIKE', '%'.$cari.'%')->orWhere('konten', 'LIKE', '%'.$cari.'%')
                    ->orderBy('created_at', 'desc')
                    ->get();

    $search_berita = Berita::where('judul', 'LIKE', '%'.$cari.'%')->orWhere('konten', 'LIKE', '%'.$cari.'%')
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('search', compact('search_profil', 'search_berita', 'cari','semua_profil'));
    }

    public function index()
    {
    return view('homepage', compact('semua_profil','about'));
    }

    public function show_profil($slug)
    {
    $profil = Profil::whereSlug($slug)->firstOrFail();
    return view('profil.showprofil', compact('profil','semua_profil'));
    }

    public function show_profil_en($slug)
    {
    $profil = About::whereSlug($slug)->firstOrFail();
    return view('profil.showprofil', compact('profil','all_about'));
    }

}
