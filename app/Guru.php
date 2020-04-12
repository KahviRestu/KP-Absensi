<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['user_id', 'nip', 'nama', 'jk', 'agama', 'tgl_lahir', 'alamat', 'email', 'nomor_telp', 'avatar', 'about'];

    public function surat()
    {
         return $this->hasMany(Surat::class);
    }

    public function absen()
    {
    	return $this->hasMany('App\Absen');
    }
}
