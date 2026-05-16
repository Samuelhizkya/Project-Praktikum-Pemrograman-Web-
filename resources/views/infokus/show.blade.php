<x-default-layout>

<h1 class="mb-4">
    Detail Infokus
</h1>

<div class="card p-4">

    <div class="mb-3">

        <h5>Nama Infokus</h5>

        <p>{{ $infokus->nama_infokus }}</p>

    </div>

    <div class="mb-3">

        <h5>Kode Infokus</h5>

        <p>{{ $infokus->kode_infokus }}</p>

    </div>

    <div class="mb-3">

        <h5>Lokasi</h5>

        <p>{{ $infokus->lokasi }}</p>

    </div>

    <div class="mb-3">

        <h5>Status</h5>

        <p>{{ $infokus->status }}</p>

    </div>

    <a href="/infokus"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

</x-default-layout>