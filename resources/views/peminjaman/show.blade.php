<x-default-layout>

<h1 class="mb-4">
    Detail Peminjaman
</h1>

<div class="card p-4">

    {{-- NAMA USER --}}
    <div class="mb-3">

        <h5>Nama User</h5>

        <p>{{ $peminjaman->user->name }}</p>

    </div>

    {{-- NIM --}}
    <div class="mb-3">

        <h5>NIM</h5>

        <p>{{ $peminjaman->user->nim }}</p>

    </div>

    {{-- PRODI --}}
    <div class="mb-3">

        <h5>Program Studi</h5>

        <p>{{ $peminjaman->user->prodi }}</p>

    </div>

    {{-- NOMOR HP --}}
    <div class="mb-3">

        <h5>Nomor HP</h5>

        <p>{{ $peminjaman->user->no_hp }}</p>

    </div>

    {{-- NAMA INFOCUS --}}
    <div class="mb-3">

        <h5>Nama Infokus</h5>

        <p>{{ $peminjaman->infokus->nama_infokus }}</p>

    </div>

    {{-- KODE INFOCUS --}}
    <div class="mb-3">

        <h5>Kode Infokus</h5>

        <p>{{ $peminjaman->infokus->kode_infokus }}</p>

    </div>

    {{-- LOKASI PEMINJAMAN --}}
    <div class="mb-3">

        <h5>Lokasi Peminjaman</h5>

        <p>{{ $peminjaman->ruangan }}</p>

    </div>

    {{-- NAMA DOSEN --}}
    <div class="mb-3">

        <h5>Nama Dosen</h5>

        <p>{{ $peminjaman->nama_dosen }}</p>

    </div>

    {{-- MATA KULIAH --}}
    <div class="mb-3">

        <h5>Mata Kuliah</h5>

        <p>{{ $peminjaman->mata_kuliah }}</p>

    </div>

    {{-- TANGGAL PINJAM --}}
    <div class="mb-3">

        <h5>Tanggal Pinjam</h5>

        <p>{{ $peminjaman->tanggal_pinjam }}</p>

    </div>

    {{-- JAM PINJAM --}}
    <div class="mb-3">

        <h5>Jam Pinjam</h5>

        <p>{{ \Carbon\Carbon::parse($peminjaman->jam_pinjam)->format('H:i') }} WITA</p>

    </div>

    {{-- TANGGAL KEMBALI --}}
    <div class="mb-3">

        <h5>Tanggal Kembali</h5>

        <p>

            @if($peminjaman->tanggal_kembali)

                {{ $peminjaman->tanggal_kembali }}

            @else

                Belum Dikembalikan

            @endif

        </p>

    </div>

    {{-- STATUS --}}
    <div class="mb-3">

        <h5>Status</h5>

        <p>

            @if($peminjaman->status == 'dipinjam')

                <span class="badge bg-danger">
                    Dipinjam
                </span>

            @else

                <span class="badge bg-success">
                    Dikembalikan
                </span>

            @endif

        </p>

    </div>

    {{-- BUTTON --}}
    <a href="/peminjaman"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

</x-default-layout>