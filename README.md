# Kampus Menggunakan Repository Pattern
======================================

#Install

Cara Install, masukan kode berikut ke dalam composer.json Anda.

	"require-dev": {
		"odenktools/kampus": "dev-master"
	}

Save, dan jalankan command prompt

	composer update --dev

#Setup

Setelah itu tambahkan Service Provider ke `providers` array di `config/app.php`

	'providers' => [
		..
		Odenktools\Kampus\KampusServiceProvider::class,
	]

Tambahkan Alias ke `aliases` array di `config/app.php`

	'aliases' => [
		..
		'Kampus'      => Odenktools\Kampus\Facades\Kampus::class,
	]

#Publish config dan migrasi database

Jalankan command prompt

	php artisan vendor:publish --provider="Odenktools\Kampus\KampusServiceProvider"
	composer dumpautoload
	php artisan migrate
	php artisan db:seed --class=KampusSeeder

#References

[Laravel Official Facades](https://laravel.com/docs/5.1/facades)
[Laravel Official Service Providers](https://laravel.com/docs/5.1/providers)
[Laravel Official Contracts](https://laravel.com/docs/5.1/contracts)
[Laravel Official Seed](https://laravel.com/docs/5.1/seeding)
