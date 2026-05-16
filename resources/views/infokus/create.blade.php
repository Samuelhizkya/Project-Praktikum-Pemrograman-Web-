<x-default-layout>

<h1 class="mb-4">
    Tambah Infokus
</h1>

<form action="/infokus" method="POST">

    @csrf

    <div class="mb-3">

        <label>Nama Infokus</label>

        <input type="text"
               name="nama_infokus"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Kode Infokus</label>

        <input type="text"
               name="kode_infokus"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Lokasi</label>

        <input type="text"
               name="lokasi"
               class="form-control">

    </div>

    <button class="btn btn-primary">

        Simpan

    </button>

</form>

</x-default-layout>