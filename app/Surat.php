<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surats';
    protected $fillable = ['dari', 'sampai', 'subjek', 'pesan', 'bukti', 'guru_id','status'];

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }
}
