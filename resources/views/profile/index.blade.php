<x-default-layout>

<div class="row justify-content-center">

    <div class="col-md-7">

        <div class="card shadow border-0 rounded-4">

            <div class="card-header bg-dark text-white">

                <h4 class="mb-0">
                    Profile User
                </h4>

            </div>

            <div class="card-body">

                <div class="mb-3">

                    <label class="fw-bold">
                        Nama
                    </label>

                    <p>
                        {{ auth()->user()->name }}
                    </p>

                </div>

                <div class="mb-3">

                    <label class="fw-bold">
                        Email
                    </label>

                    <p>
                        {{ auth()->user()->email }}
                    </p>

                </div>

                <div class="mb-3">

                    <label class="fw-bold">
                        Role
                    </label>

                    <p class="text-capitalize">
                        {{ auth()->user()->role }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</x-default-layout>