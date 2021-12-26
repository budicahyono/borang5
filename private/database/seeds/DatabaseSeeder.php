<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		# Kita akan beri nama Seeder dengan 'SeederRelasi'
		$this->call('SeederRelasi');
		# Tampilkan informasi berikut bila Seeder telah dilakukan
		$this->command->info('SeederRelasi berhasil.');
	}

}
