<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @todo
 *
 * @license MIT
 *
 */
class KampusInit extends Migration
{
	public function __construct()
	{
		$this->prefix = Config::get('kampus.prefix', '');
	}

    /**
     * Run the migrations.
     * @return void
     */
	public function up()
	{
		$prefix = $this->prefix;

		Schema::create($prefix . 'mahasiswa', function($table)
		{
			$table->engine = 'InnoDB';

			//$table->primary('id_role');
			$table->increments('nim');
			$table->string('nama', 50)->index();
			$table->string('kelas', 50);
			$table->string('email', 50)->unique()
			$table->tinyInteger('aktif')->default(0);
			$table->timestamps();
			$table->softDeletes();

		});
	}

    /**
     * Reverse the migrations.
     * @return void
     */
	public function down()
	{

		//-- DETAIL --//


		//-- MASTER --//
		Schema::drop($this->prefix . 'mahasiswa');

	}
}
