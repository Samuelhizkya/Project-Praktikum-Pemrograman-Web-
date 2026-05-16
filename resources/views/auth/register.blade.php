<x-default-layout>

<div class="row justify-content-center align-items-center"
     style="min-height: 90vh;">

    <div class="col-md-6">

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            <!-- HEADER -->
            <div class="bg-primary text-white text-center p-4">

                <h2 class="fw-bold">
                    Register Account
                </h2>

                <p class="mb-0">
                    SIREKA INFOCUS
                </p>

            </div>

            <!-- BODY -->
            <div class="p-4">

                <h4 class="text-center mb-4">
                    Create New Account
                </h4>

                <!-- VALIDATION ERROR -->
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

                <!-- FORM -->
                <form action="/register"
                      method="POST">

                    @csrf

                    <!-- NAMA -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control rounded-3"
                               placeholder="Masukkan Nama Lengkap"
                               value="{{ old('name') }}"
                               required>

                    </div>

                    <!-- NIM -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            NIM
                        </label>

                        <input type="text"
                               name="nim"
                               class="form-control rounded-3"
                               placeholder="Masukkan NIM"
                               value="{{ old('nim') }}"
                               required>

                    </div>

                    <!-- PRODI -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Program Studi
                        </label>

                        <input type="text"
                               name="prodi"
                               class="form-control rounded-3"
                               placeholder="Contoh: Sistem Informasi"
                               value="{{ old('prodi') }}"
                               required>

                    </div>

                    <!-- NO HP -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Nomor HP
                        </label>

                        <input type="text"
                               name="no_hp"
                               class="form-control rounded-3"
                               placeholder="Masukkan Nomor HP"
                               value="{{ old('no_hp') }}"
                               required>

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control rounded-3"
                               placeholder="Masukkan Email"
                               value="{{ old('email') }}"
                               required>

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control rounded-3"
                               placeholder="Masukkan Password"
                               required>

                    </div>

                    <!-- KONFIRMASI PASSWORD -->
                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Konfirmasi Password
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               class="form-control rounded-3"
                               placeholder="Konfirmasi Password"
                               required>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="btn btn-primary w-100 rounded-3">

                        Register

                    </button>

                </form>

                <!-- LOGIN -->
                <div class="text-center mt-4">

                    <span class="text-muted">
                        Sudah punya akun?
                    </span>

                    <a href="/login"
                       class="text-decoration-none fw-bold">

                        Login

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-default-layout>