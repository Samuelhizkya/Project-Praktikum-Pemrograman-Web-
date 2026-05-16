<x-default-layout>

<div class="row justify-content-center">

    <div class="col-md-7">

        <div class="card shadow border-0 rounded-4">

            {{-- HEADER --}}
            <div class="card-header bg-primary text-white">

                <h4 class="mb-0">
                    Tambah Peminjaman
                </h4>

            </div>

            <div class="card-body">

                {{-- NOTIFIKASI ERROR --}}
                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show"
                         role="alert">

                        {{ session('error') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif

                {{-- VALIDASI ERROR --}}
                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                {{-- FORM --}}
                <form action="/peminjaman"
                      method="POST">

                    @csrf

                    {{-- INFOCUS --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">

                            Pilih Infokus

                        </label>

                        <select name="infokus_id"
                                class="form-control"
                                required>

                            <option value="">

                                -- Pilih Infokus --

                            </option>

                            @foreach($infokus as $item)

                            <option value="{{ $item->id }}">

                                {{ $item->kode_infokus }}
                                -
                                {{ $item->nama_infokus }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- NAMA DOSEN --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">

                            Nama Dosen

                        </label>

                        <input type="text"
                               name="nama_dosen"
                               class="form-control"
                               required>

                    </div>

                    {{-- MATA KULIAH --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">

                            Mata Kuliah

                        </label>

                        <input type="text"
                               name="mata_kuliah"
                               class="form-control"
                               required>

                    </div>

                    {{-- RUANGAN --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">

                            Pilih Ruangan

                        </label>

                        <select name="ruangan"
                                class="form-control"
                                required>

                            <option value="">

                                -- Pilih Ruangan --

                            </option>

                            @foreach($ruanganTersedia as $ruangan)

                            <option value="{{ $ruangan }}">

                                {{ $ruangan }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- BUTTON --}}
                    <button class="btn btn-primary">

                        Simpan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</x-default-layout>