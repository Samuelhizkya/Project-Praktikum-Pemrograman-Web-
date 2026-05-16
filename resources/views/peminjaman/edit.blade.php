<x-default-layout>

<h1 class="mb-4">
    Edit Peminjaman
</h1>

<form action="/peminjaman/{{ $peminjaman->id }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Pilih Infokus</label>

        <select name="infokus_id"
                class="form-control">

            @foreach($infokus as $item)

            <option value="{{ $item->id }}">

                {{ $item->nama_infokus }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Tanggal Pinjam</label>

        <input type="date"
               name="tanggal_pinjam"
               class="form-control"
               value="{{ $peminjaman->tanggal_pinjam }}">

    </div>

    <div class="mb-3">

        <label>Tanggal Kembali</label>

        <input type="date"
               name="tanggal_kembali"
               class="form-control"
               value="{{ $peminjaman->tanggal_kembali }}">

    </div>

    <div class="mb-3">

        <label>Status</label>

        <select name="status"
                class="form-control">

            <option value="dipinjam">
                Dipinjam
            </option>

            <option value="dikembalikan">
                Dikembalikan
            </option>

        </select>

    </div>

    <button class="btn btn-primary">

        Update

    </button>

</form>

</x-default-layout>