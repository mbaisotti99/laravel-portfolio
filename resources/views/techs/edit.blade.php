@extends("layouts.master")
@section("titolo", "Modifica Tecnologia")
@section("contenuto")
    <style>
        .cent {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            flex-direction: column;
        }
    </style>
    <div class="container cent">
        <h1 class="mb-5">Modifica Tecnologia</h1>
        <form method="POST" action="{{ route("techs.update", $tech) }}" class="row d-flex form-control p-5">
            @csrf
            @method("PUT")
            <div class="col-6">
                <label for="nome">Nome Tecnologia:</label>
                <input value="{{ $tech->nome }}" class="form-control" type="text" name="nome" id="nome">
            </div>

            <div class="col-6">
                <label for="descrizione">Descrizione:</label>
                <textarea style="height: 200px;" class="form-control" name="descrizione" id="descrizione">{{ $tech->descrizione }}</textarea>
            </div>
            
            <div class="col-6">
                <label for="colore">Colore:</label>
                <input value="{{ $tech->colore }}" class="form-control" type="color" name="colore" id="colore"></input>
            </div>
            <div class="col-6 d-flex justify-content-center"><button type="submit" class="btn btn-success mt-3 fs-5">Salva</button></div>
        </form>
    </div>
@endsection