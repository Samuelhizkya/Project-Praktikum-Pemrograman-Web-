<x-default-layout>

<h1 class="mb-4">
    Edit Infokus
</h1>

<form action="/infokus/{{ $infokus->id }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Nama Infokus</label>

        <input type="text"
               name="nama_infokus"
               class="form-control"
               value="{{ $infokus->nama_infokus }}">

    </div>

    <div class="mb-3">

        <label>Kode Infokus</label>

        <input type="text"
               name="kode_infokus"
               class="form-control"
               value="{{ $infokus->kode_infokus }}">

    </div>

    <div class="mb-3">

        <label>Lokasi</label>

        <input type="text"
               name="lokasi"
               class="form-control"
               value="{{ $infokus->lokasi }}">

    </div>

    <div class="mb-3">

        <label>Status</label>

        <select name="status"
                class="form-control">

            <option value="tersedia">
                Tersedia
            </option>

            <option value="dipinjam">
                Dipinjam
            </option>

        </select>

    </div>

    <button class="btn btn-primary">

        Update

    </button>

</form>

</x-default-layout>