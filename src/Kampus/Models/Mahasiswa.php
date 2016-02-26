<?php

/*
 * Step - 3
 */
namespace Odenktools\Kampus\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primaryKey = 'nim';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'odk_mahasiswa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'nama',
        'kelas',
        'email',
        'aktif',
    ];

    public static $rules = array(
		'nama'		=> 'required',
		'kelas'		=> 'required',
        'email'		=> 'required|email',
		'aktif'		=> 'required'
    );

    public function selectAll()
    {
        throw new \InvalidArgumentException('not implement.');
    }
	
	 public function findById($data)
	 {
		 return Mahasiswa::find($data);
	 }
}