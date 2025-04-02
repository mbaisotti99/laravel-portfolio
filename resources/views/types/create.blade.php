@extends("layouts.master")
@section("titolo", "Crea Tipo")
@section("contenuto")
    <style>
        .cent {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
    <div class="container cent">
        <form method="POST" action="{{ route("types.store") }}">
            @csrf

            <div class="row text-center">
                <div class="col-6">
                    <label for="nome">Nome:</label>
                    <input class="form-control" type="text" name="nome" id="nome">
                </div>
                <div class="col-6">
                    <label for="descrizione">Descrizione:</label>
                    <textarea class="form-control" type="text" name="descrizione" id="descrizione"></textarea>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-success">Salva</button>
                </div>
                <div class="col-12 mt-5">
                    <a href="{{ route("types.index") }}" class="btn btn-primary">Torna alla lista dei Tipi</a>
                </div>
            </div>
        </form>
    </div>
@endsection