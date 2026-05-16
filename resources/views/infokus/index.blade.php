<x-default-layout>

<h1 class="mb-4">
    Data Infokus
</h1>

{{-- NOTIFIKASI SUCCESS --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif

{{-- BUTTON TAMBAH KHUSUS ADMIN --}}
@if(auth()->user()->role == 'admin')

<a href="/infokus/create"
   class="btn btn-primary mb-3">

    Tambah Infokus

</a>

@endif

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>

            <th>No</th>
            <th>Nama Infokus</th>
            <th>Kode</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th>Aksi</th>

        </tr>

    </thead>

    <tbody>

        @foreach($infokus as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->nama_infokus }}</td>

            <td>{{ $item->kode_infokus }}</td>

            <td>{{ $item->lokasi }}</td>

            <td>

                @if($item->status == 'tersedia')

                    <span class="badge bg-success">

                        Tersedia

                    </span>

                @else

                    <span class="badge bg-danger">

                        Dipinjam

                    </span>

                @endif

            </td>

            <td>

                {{-- DETAIL --}}
                <a href="/infokus/{{ $item->id }}"
                   class="btn btn-info btn-sm">

                    Detail

                </a>

                {{-- KHUSUS ADMIN --}}
                @if(auth()->user()->role == 'admin')

                {{-- EDIT --}}
                <a href="/infokus/{{ $item->id }}/edit"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                {{-- DELETE --}}
                <form action="/infokus/{{ $item->id }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data?')">

                        Hapus

                    </button>

                </form>

                @endif

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</x-default-layout>