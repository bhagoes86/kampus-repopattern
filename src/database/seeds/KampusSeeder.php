<?php

use Illuminate\Database\Seeder;

class KampusSeeder extends Seeder
{
	public function run()
	{
		$prefix = Config::get('kampus.prefix', '');

		$tablename = Config::get('kampus.tables', '');

		// -- START MAHASISWA --//

		$mahasiswa_rahyan = DB::table($prefix . $tablename['mahasiswa'])->insertGetId([
			'nama'			=> 'rahyan',
			'kelas'			=> 'ti-7',
			'email'			=> 'odenktools86@gmail.com',
			'aktif' 		=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' => null
		]);

		// -- END MAHASISWA --//

		$this->command->info('Mahasiswa tables are seeded!');
	}
}