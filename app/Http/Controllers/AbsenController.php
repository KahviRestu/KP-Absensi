<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use App\Guru;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AbsenController extends Controller
{
    public function index()
    {
    	$absen = Absen::all();
    	return view('absen.index',compact('absen'));
    }

    public function store(Request $request)
    {
    	$guru = Guru::where('user_id',$request->id)->first();
    	$absen = Absen::create([
    		'nip' => $request->nip,
    		'guru_id' => $guru->id,
    		'nama' => $request->nama,
    	]);
    	$data = [
    		"status" => 1,
    		"message" => "Berhasil"
    	];
    	return response()->json($data);
    }

    public function result()
    {
    	
    	// $all = Absen::first();
    	// $all->absen = Absen::all();
    	$all = Absen::all();
    	return response()->json($all);
	}
	
	public function absenGuru(Request $request)
    {
        $cek = Absen::where([
            'tanggal' => $request->tanggal
        ])->first();

        if ($cek) {
            return back()->with('failed', 'Anda telah mengabsen pada mata kuliah dan tanggal tersebut!');
        } else {     
            $guru = Guru::all();       
            $no = 1;
            if ($request->tanggal == null) {
                $tgl = date('Y-m-d');
            } else {
                $tgl = $request->tanggal;
            }

            return view('absen.guru', compact('no', 'tgl', 'guru'));
        }
    }

    public function absen(Request $request)
    {
        $absen = [];

        // $cek = Absen::

        $tgl = $request->tanggal;
        $now = date('Y-m-d H:i:s');
        // dd($matkul->semester_id);

        if ($request->absen == null) {
            return redirect()->route('absen.index')->with('failed', 'Anda telah mengabsen pada tanggal tersebut!');
        } else {
            foreach ($request->absen as $val) {

                $data = explode("-", $val);
                $guru = $data[0];
                // $user = $data[0];
                $ket = $data[1];

                $absen[] = [
                    'tanggal'  => $tgl,                  
                    'guru_id' => $guru,
                    // 'user_id' => $user,                    
                    'keterangan' => $ket,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }

            Absen::insert($absen);
            return redirect()->route('absen.index')->with('success', 'Anda telah mengabsen hari ini! Selamat mengajar :)');
        }
    }

    public function cetakpdf()
    {
        $absen = Absen::all();
        $pdf = PDF::loadview('absen.absen_pdf',['absen'=>$absen]);
        return $pdf->download('laporan-absen-pdf');
    }

    public function search(Request $request)
    {
        $request->validate([
            'tanggal' => ['required']
        ]);
        $absen = Absen::whereTanggal($request->tanggal)->orderBy('created_at')->paginate(6);        
        return view('absen.index', compact('absen'));
    }

    public function excelUser(Request $request, User $user)
    {
        return Excel::download(new PresentExport($user->id, $request->bulan), 'kehadiran-'.$user->nip.'-'.$request->bulan.'.xlsx');
    }

    public function excelUsers(Request $request)
    {
        return Excel::download(new UsersPresentExport($request->tanggal), 'kehadiran-'.$request->tanggal.'.xlsx');
    }
}
