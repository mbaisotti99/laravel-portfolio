@extends("layouts.master")
@section("titolo", "Sviluppatori")
@section("contenuto")
    <style>
        .cent {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100% !important;
            flex-direction: column;
        }
        .row{
            height: 100% !important;
        }

    </style>
    <div class="container cent">
        <h1 class="mt-5">Sviluppatori</h1>
        <a href="{{ route("devs.create") }}" class="btn btn-primary fs-3 mt-3">Crea un nuovo Sviluppatore</a>
        <div class="row mt-5 w-100">
            @foreach ($devs as $dev)
                <div class="col-6">
                    <x-dev-card :dev="$dev">
                        
                    </x-dev-card>
                </div>
            @endforeach
        </div>

        <div class="mt-5">
            {{ $devs->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection