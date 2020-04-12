<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Guru;
use App\Surat;

class SuratController extends Controller
{
    public function index()
    {               
        $user = Auth::user(); 
        $guru = Guru::where('user_id', $user->id)->first();
        $surat = Surat::with('Guru')
            ->where('guru_id', $guru->id)
            ->get(); 
        return view('surat.index', ['surat' => $surat]);
        
    }

    public function createSurat(Request $request)
    {
        $a = Guru::where('user_id', auth()->user()->id)->first();
        $surat = \App\Surat::create([   
            'guru_id'=>$a->id,
            'dari' => $request->dari,
            'sampai' => $request->sampai,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'bukti' => $request->bukti,
            'status' => 'pending',
        ]);
        return redirect('/surat');
    }

    public function approvel()
    {
        $approvel = Surat::with('Guru')
            ->get();    

        return view('surat.approvel', ['approvel' => $approvel]);
    }

    public function setuju(Request $request, $id)
    {
        $setuju = Surat::find($id);
        $setuju->update([
            'status' => 'Sukses'
        ]);
        return redirect('/approvel');
        
    }

    public function tolak(Request $request, $id)
    {
        $setuju = Surat::find($id);
        $setuju->update([
            'status' => 'tolak'
        ]);
        return redirect('/approvel');
        
    }


}
