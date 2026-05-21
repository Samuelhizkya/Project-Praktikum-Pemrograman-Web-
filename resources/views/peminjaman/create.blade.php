<x-default-layout>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>
        <h1 class="page-title mb-1">Tambah Peminjaman</h1>
        <p class="page-subtitle mb-0">Pilih infokus dan tentukan tanggal pengembalian.</p>
    </div>

    <a href="/peminjaman" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>
        Kembali
    </a>

</div>

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <i class="bi bi-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mb-4">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="borrow-card">

    <form action="/peminjaman" method="POST">

        @csrf

        <div class="row g-4">

            <div class="col-md-6">

                <label class="form-label">Pilih Infokus</label>

                <div class="input-modern">
                    <span>
                        <i class="bi bi-display"></i>
                    </span>

                    <select name="infokus_id" class="form-select" required>
                        <option value="">-- Pilih Infokus --</option>

                        @foreach($infokus as $item)
                            <option value="{{ $item->id }}" {{ old('infokus_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->kode_infokus }} - {{ $item->nama_infokus }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-6">

                <label class="form-label">Tanggal Kembali</label>

                <div class="input-modern">
                    <span>
                        <i class="bi bi-calendar-check"></i>
                    </span>

                    <input type="date"
                           name="tanggal_kembali"
                           class="form-control"
                           value="{{ old('tanggal_kembali') }}"
                           required>
                </div>

            </div>

        </div>

        <div class="note-box mt-4">
            <i class="bi bi-info-circle"></i>
            <span>
                Setelah disimpan, status infokus otomatis berubah menjadi dipinjam.
            </span>
        </div>

        <div class="action-area">

            <a href="/peminjaman" class="btn btn-light">
                Batal
            </a>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-floppy me-1"></i>
                Simpan Peminjaman
            </button>

        </div>

    </form>

</div>

<style>
.borrow-card {
    background: white;
    padding: 32px;
    border-radius: 26px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 14px 40px rgba(15,23,42,.06);
}

.input-modern {
    display: flex;
    border: 1px solid #dbe3ee;
    border-radius: 16px;
    overflow: hidden;
    background: white;
    transition: .25s;
}

.input-modern:focus-within {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37,99,235,.12);
}

.input-modern span {
    width: 56px;
    background: #eff6ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.input-modern .form-select,
.input-modern .form-control {
    border: none;
    box-shadow: none;
    padding: 14px;
}

.input-modern .form-select:focus,
.input-modern .form-control:focus {
    box-shadow: none;
}

.note-box {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #eff6ff;
    color: #1e40af;
    border: 1px solid #bfdbfe;
    padding: 16px;
    border-radius: 18px;
    font-weight: 600;
}

.action-area {
    margin-top: 30px;
    display: flex;
    justify-content: flex-end;
    gap: 12px;
}

.btn-light {
    background: #f1f5f9;
    border: none;
}

@media(max-width:768px) {
    .borrow-card {
        padding: 22px;
    }

    .action-area {
        flex-direction: column;
    }

    .action-area .btn {
        width: 100%;
    }
}
</style>

</x-default-layout>