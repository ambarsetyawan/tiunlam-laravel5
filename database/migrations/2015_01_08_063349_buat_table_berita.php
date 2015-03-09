<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableBerita extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('berita', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('judul', 50);
			$table->string('slug', 50)->unique();
			$table->text('konten');
			$table->boolean('tampilkan')->default(false);
			$table->text('gambar');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('berita');
	}

}
