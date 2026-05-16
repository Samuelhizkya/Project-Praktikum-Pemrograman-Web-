<x-default-layout>

<h1 class="mb-4">
    Data Peminjaman
</h1>

<!-- BUTTON TAMBAH -->
<a href="/peminjaman/create"
   class="btn btn-primary mb-3">

    Tambah Peminjaman

</a>

<!-- SUCCESS MESSAGE -->
@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<!-- ERROR MESSAGE -->
@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

<div class="card shadow border-0">

    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">

                <tr>

                    <th>No</th>
                    <th>User</th>
                    <th>Infokus</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th width="250">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($peminjaman as $item)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $item->user->name }}
                    </td>

                    <td>
                        {{ $item->infokus->nama_infokus }}
                    </td>

                    <td>
                        {{ $item->tanggal_pinjam }}
                    </td>

                    <td>

                        @if($item->tanggal_kembali)

                            {{ $item->tanggal_kembali }}

                        @else

                            -

                        @endif

                    </td>

                    <td>

                        @if($item->status == 'dipinjam')

                            <span class="badge bg-warning text-dark">

                                Dipinjam

                            </span>

                        @elseif($item->status == 'dikembalikan')

                            <span class="badge bg-success">

                                Dikembalikan

                            </span>

                        @endif

                    </td>

                    <td>

                        <!-- DETAIL -->
                        <a href="/peminjaman/{{ $item->id }}"
                           class="btn btn-info btn-sm">

                            Detail

                        </a>

                        <!-- ADMIN -->
                        @if(auth()->user()->role == 'admin')

                        <!-- EDIT -->
                        <a href="/peminjaman/{{ $item->id }}/edit"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <!-- DELETE -->
                        <form action="/peminjaman/{{ $item->id }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                        @else

                            <!-- USER -->

                            @if($item->status == 'dikembalikan')

                            <form action="/peminjaman/{{ $item->id }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                            @endif

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center">

                        Data peminjaman kosong

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-default-layout>