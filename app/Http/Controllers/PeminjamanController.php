<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Infokus;

class PeminjamanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // ADMIN LIHAT SEMUA
        if(auth()->user()->role == 'admin')
        {
            $peminjaman = Peminjaman::with('user', 'infokus')
                ->latest()
                ->get();
        }

        // USER HANYA LIHAT MILIKNYA
        else
        {
            $peminjaman = Peminjaman::with('user', 'infokus')
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->get();
        }

        return view('peminjaman.index', compact('peminjaman'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        // INFOCUS TERSEDIA
        $infokus = Infokus::where(
            'status',
            'tersedia'
        )->get();

        // SEMUA RUANGAN
        $semuaRuangan = [

            'FF01',
            'FF02',
            'FF03',
            'FF04',
            'FF05',
            'FF06',
            'FF07',
            'FF08',
            'FF09',
            'FF10',
            'FF11',
            'FF12',

        ];

        // RUANGAN YANG DIPAKAI
        $ruanganDipakai = Peminjaman::where(
            'status',
            'dipinjam'
        )->pluck('ruangan')->toArray();

        // FILTER RUANGAN TERSEDIA
        $ruanganTersedia = array_diff(
            $semuaRuangan,
            $ruanganDipakai
        );

        return view(
            'peminjaman.create',
            compact(
                'infokus',
                'ruanganTersedia'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'infokus_id' => 'required',

            'nama_dosen' => 'required',

            'mata_kuliah' => 'required',

            'ruangan' => 'required',

        ]);

        // CEK INFOCUS
        $infokus = Infokus::findOrFail(
            $request->infokus_id
        );

        // JIKA INFOCUS DIPINJAM
        if ($infokus->status == 'dipinjam')
        {
            return back()->with(
                'error',
                'Infokus sedang dipinjam'
            );
        }

        // CEK RUANGAN
        $cekRuangan = Peminjaman::where(
            'ruangan',
            $request->ruangan
        )
        ->where(
            'status',
            'dipinjam'
        )
        ->exists();

        // JIKA RUANGAN SUDAH DIPAKAI
        if($cekRuangan)
        {
            return back()->with(
                'error',
                'Ruangan sedang dipakai'
            );
        }

        // SIMPAN PEMINJAMAN
        Peminjaman::create([

            'user_id' => auth()->user()->id,

            'infokus_id' => $request->infokus_id,

            'nama_dosen' => $request->nama_dosen,

            'mata_kuliah' => $request->mata_kuliah,

            'ruangan' => $request->ruangan,

            'tanggal_pinjam' => now(),

            'jam_pinjam' => now()->format('H:i:s'),

            'tanggal_kembali' => null,

            'status' => 'dipinjam'

        ]);

        // UPDATE INFOCUS
        $infokus->update([

            'status' => 'dipinjam',

            'lokasi' => $request->ruangan

        ]);

        return redirect('/peminjaman')
            ->with(
                'success',
                'Peminjaman berhasil'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(string $id)
    {
        $peminjaman = Peminjaman::with(
            'user',
            'infokus'
        )->findOrFail($id);

        // USER TIDAK BOLEH LIHAT DATA ORANG LAIN
        if(
            auth()->user()->role == 'user'
            &&
            $peminjaman->user_id != auth()->user()->id
        )
        {
            abort(403);
        }

        return view(
            'peminjaman.show',
            compact('peminjaman')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(string $id)
    {
        // HANYA ADMIN
        if(auth()->user()->role != 'admin')
        {
            abort(403);
        }

        $peminjaman = Peminjaman::findOrFail($id);

        $infokus = Infokus::all();

        return view(
            'peminjaman.edit',
            compact(
                'peminjaman',
                'infokus'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([

            'status' => $request->status,

            'tanggal_kembali' => now()

        ]);

        // JIKA DIKEMBALIKAN
        if ($request->status == 'dikembalikan')
        {
            $peminjaman->infokus->update([

                'status' => 'tersedia',

                'lokasi' => 'Ruang Peminjaman'

            ]);
        }

        return redirect('/peminjaman')
            ->with(
                'success',
                'Status peminjaman berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // USER TIDAK BOLEH HAPUS
        // JIKA BELUM DIKEMBALIKAN
        if(
            auth()->user()->role == 'user'
            &&
            $peminjaman->status != 'dikembalikan'
        )
        {
            return redirect('/peminjaman')
                ->with(
                    'error',
                    'Peminjaman belum dikembalikan'
                );
        }

        $peminjaman->delete();

        return redirect('/peminjaman')
            ->with(
                'success',
                'Data peminjaman berhasil dihapus'
            );
    }
}