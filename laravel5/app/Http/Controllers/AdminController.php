<?php namespace tiunlam\Http\Controllers;

use tiunlam\Http\Requests;
use tiunlam\Http\Controllers\Controller;

use Request;
use Redirect;
use Image;

use tiunlam\Berita;
use tiunlam\News;
use tiunlam\Profil;
use tiunlam\About;

class AdminController extends Controller {

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('homepage');
  }

	public function dashboard()
  {
  return view('admin.dashboard');
  }

  public function search()
  {
  $cari = Request::get('cari');
  return Redirect::route('searchresults-admin', compact('cari'));
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

  return view('search', compact('search_berita', 'search_profil', 'cari','semua_profil'));
  }

  public function home_profil($slug)
  {
  $profil = Profil::whereSlug($slug)->firstOrFail();
  return view('profil.showprofil', compact('profil','semua_profil'));
  }

  public function home_about($slug)
  {
  $profil = About::whereSlug($slug)->firstOrFail();
  return view('profil.showprofil', compact('profil','all_about'));
  }

  #Berita
  public function daftar_berita()
  {
  $semua_berita = Berita::all();
  $all_news = News::all();
  return view('admin.daftarberita', compact('semua_berita','all_news'));
  }

  public function show_berita($slug)
  {
  $berita = Berita::whereSlug($slug)->firstOrFail();
  return view('admin.showberita', compact('berita'));
  }

  public function show_berita_en($slug)
  {
  $berita = News::whereSlug($slug)->firstOrFail();
  return view('admin.showberita', compact('berita'));
  }


    public function tambah_berita()
    {
    return view('admin.tambahberita');
    }

    public function tambah_berita_en()
    {
    return view('admin.tambahberita_en');
    }

    public function store_berita()
    {
    $path = '/media/gambar/';
  $namafile = '';

   if (Request::hasFile('gambar')) {
        $file           = Request::file('gambar');
        $filepath       = public_path() . $path;
        $namafile       = $file->getClientOriginalName();
        $resize         = Image::make($file->getRealPath())->resize('640','480')->save($filepath . $namafile);
        Berita::create(['judul' => Request::get('judul'),
                      'konten'  => Request::get('konten'),
                      'slug'    => str_slug(Request::get('judul')),
                      'gambar'  => $path . $namafile]);
    }
    else
    {
        Berita::create(['judul' => Request::get('judul'),
                     'konten'   => Request::get('konten'),
                     'slug'     => str_slug(Request::get('judul')),
                     'gambar'   => $namafile]);
    }
    return Redirect::route('daftar_berita');
    }

  public function store_berita_en()
  {
  $path = '/media/gambar/';
  $namafile = '';

 if (Request::hasFile('gambar')) {
      $file           = Request::file('gambar');
      $filepath       = public_path() . $path;
      $namafile       = $file->getClientOriginalName();
      $resize         = Image::make($file->getRealPath())->resize('640','480')->save($filepath . $namafile);
      News::create(['judul' => Request::get('judul'),
                    'konten'  => Request::get('konten'),
                    'slug'    => str_slug(Request::get('judul')),
                    'gambar'  => $path . $namafile]);
  }
  else
  {
      News::create(['judul' => Request::get('judul'),
                   'konten'   => Request::get('konten'),
                   'slug'    => str_slug(Request::get('judul')),
                   'gambar'   => $namafile]);
  }
  return Redirect::route('daftar_berita');
  }


    public function edit_berita($slug)
    {
    $berita = Berita::whereSlug($slug)->firstOrFail();
    return view('admin.editberita', compact('berita'));
    }

    public function edit_berita_en($slug)
    {
    $berita = News::whereSlug($slug)->firstOrFail();
    return view('admin.editberita_en', compact('berita'));
    }

    public function update_berita($slug)
    {
    $path = '/media/gambar/';
    $namafile = '';

    $berita = Berita::whereSlug($slug)->firstOrFail();

    if (Request::hasFile('gambar')) {
        $file           = Request::file('gambar');
        $filepath       = public_path() . $path;
        $namafile       = $file->getClientOriginalName();
        $resize         = Image::make($file->getRealPath())->resize('640','480')->save($filepath . $namafile);
        $berita->fill(['judul'  => Request::get('judul'),
                     'konten'   => Request::get('konten'),
                     'slug' => str_slug(Request::get('judul')),
                     'gambar'   => $path . $namafile]);
    } else {
        $berita->fill(['judul'=> Request::get('judul'),
                     'slug' => str_slug(Request::get('judul')),
                     'konten'  => Request::get('konten')]);
    }

    if (Request::get('hapus_gambar') =='ya') {
        $berita->fill(['judul'=> Request::get('judul'),
                     'konten'  => Request::get('konten'),
                     'slug' => str_slug(Request::get('judul')),
                     'gambar'      => $namafile]);

    }

    $berita->save();

    return Redirect::route('daftar_berita');
    }

    public function update_berita_en($slug)
    {
    $path = '/media/gambar/';
    $namafile = '';

    $berita = News::whereSlug($slug)->firstOrFail();

    if (Request::hasFile('gambar')) {
        $file           = Request::file('gambar');
        $filepath       = public_path() . $path;
        $namafile       = $file->getClientOriginalName();
        $resize         = Image::make($file->getRealPath())->resize('640','480')->save($filepath . $namafile);
        $berita->fill(['judul'  => Request::get('judul'),
                     'konten'   => Request::get('konten'),
                     'slug' => str_slug(Request::get('judul')),
                     'gambar'   => $path . $namafile]);
    } else {
        $berita->fill(['judul'=> Request::get('judul'),
                     'slug' => str_slug(Request::get('judul')),
                     'konten'  => Request::get('konten')]);
    }

    if (Request::get('hapus_gambar') =='ya') {
        $berita->fill(['judul'=> Request::get('judul'),
                     'konten'  => Request::get('konten'),
                     'slug' => str_slug(Request::get('judul')),
                     'gambar'      => $namafile]);

    }

    $berita->save();

    return Redirect::route('daftar_berita');
    }

    public function delete_berita($slug)
    {
        $berita = Berita::whereSlug($slug)
        ->firstOrFail()
        ->delete();
        return Redirect::route('daftar_berita');
    }

    public function delete_berita_en($slug)
    {
        $berita = News::whereSlug($slug)
        ->firstOrFail()
        ->delete();
        return Redirect::route('daftar_berita');
    }

  #Profil
  public function daftar_profil()
  {
  $semua_profil = Profil::all();
  $all_profile = About::all();
  return view('admin.daftarprofil', compact('semua_profil','all_profile'));
  }

  public function show_profil($slug)
  {
  $profil = Profil::whereSlug($slug)->firstOrFail();
  return view('admin.showprofil', compact('profil'));
  }

  public function show_profil_en($slug)
  {
  $profil = About::whereSlug($slug)->firstOrFail();
  return view('admin.showprofil', compact('profil'));
  }


  public function tambah_profil()
  {
  return view('admin.tambahprofil');
  }

  public function tambah_profil_en()
  {
  return view('admin.tambahprofil_en');
  }

  public function store_profil()
  {
  Profil::create(['judul' => Request::get('judul'),
                 'slug' => str_slug(Request::get('judul')),
                 'konten'   => Request::get('konten')]);

  return Redirect::route('daftar_profil');
  }

  public function store_profil_en()
  {
  About::create(['judul' => Request::get('judul'),
                 'slug' => str_slug(Request::get('judul')),
                 'konten'   => Request::get('konten')]);

  return Redirect::route('daftar_profil');
  }


  public function edit_profil($slug)
  {
  $profil = Profil::whereSlug($slug)->firstOrFail();
  return view('admin.editprofil', compact('profil'));
  }

  public function edit_profil_en($slug)
  {
  $profil = About::whereSlug($slug)->firstOrFail();
  return view('admin.editprofil_en', compact('profil'));
  }

  public function update_profil($slug)
  {
    $profil = Profil::whereSlug($slug)->firstOrFail();
    $profil->fill(['judul'=> Request::get('judul'),
                   'slug' => str_slug(Request::get('judul')),
                   'konten'  => Request::get('konten')]);

    $profil->save();

  return Redirect::route('daftar_profil');
  }

  public function update_profil_en($slug)
  {
  $profil = About::whereSlug($slug)->firstOrFail();
  $profil->fill(['judul'=> Request::get('judul'),
                 'slug' => str_slug(Request::get('judul')),
                 'konten'  => Request::get('konten')]);

  $profil->save();

  return Redirect::route('daftar_profil');
  }

  public function delete_profil($slug)
  {
    $profil = Profil::whereSlug($slug)
    ->firstOrFail()
    ->delete();
    return Redirect::route('daftar_profil');
  }


  public function delete_profil_en($slug)
  {
      $profil = About::whereSlug($slug)
      ->firstOrFail()
      ->delete();
      return Redirect::route('daftar_profil');
  }

}
