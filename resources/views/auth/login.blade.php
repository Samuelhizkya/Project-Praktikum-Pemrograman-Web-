<x-default-layout>

<div class="row justify-content-center align-items-center"
     style="min-height: 80vh;">

    <div class="col-md-5">

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            <!-- HEADER -->
            <div class="bg-dark text-white text-center p-4">

                <h2 class="fw-bold">
                    SIREKA INFOCUS
                </h2>

                <p class="mb-0">
                    Sistem Peminjaman Infokus
                </p>

            </div>

            <!-- BODY -->
            <div class="p-4">

                <h4 class="text-center mb-4">
                    Login Account
                </h4>

                <!-- ERROR -->
                @if(session('error'))

                    <div class="alert alert-danger">

                        {{ session('error') }}

                    </div>

                @endif

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
                <form action="/login"
                      method="POST">

                    @csrf

                    <!-- EMAIL -->
                    <div class="mb-3">

                        <label class="form-label">
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
                    <div class="mb-4">

                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control rounded-3"
                               placeholder="Masukkan Password"
                               required>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="btn btn-dark w-100 rounded-3">

                        Login

                    </button>

                </form>

                <!-- LINK REGISTER -->
                <div class="text-center mt-4">

                    <span class="text-muted">
                        Belum punya akun?
                    </span>

                    <a href="/register"
                       class="text-decoration-none fw-bold">

                        Register

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-default-layout>