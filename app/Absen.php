<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';
    protected $fillable = ['tanggal','guru_id','keterangan'];

    public function guru()
    {
    	return $this->belongsTo('App\Guru');
    }
}
