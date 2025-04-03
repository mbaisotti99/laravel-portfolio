@extends("layouts.master")
@section("titolo", "Nuova Tecnologia")
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
        <h1 class="mb-5">Crea nuova Tecnologia</h1>

        <form method="POST" action="{{ route("techs.store") }}" class="row d-flex form-control p-5">
            @csrf
            <div class="col-6">
                <label for="nome">Nome Tecnologia:</label>
                <input class="form-control" type="text" name="nome" id="nome">
            </div>

            <div class="col-6">
                <label for="descrizione">Descrizione:</label>
                <textarea style="height: 200px;" class="form-control" name="descrizione" id="descrizione"></textarea>
            </div>

            <div class="col-6">
                <label for="colore">Colore:</label>
                <input class="form-control" type="color" name="colore" id="colore"></input>
            </div>
            <div class="col-6 d-flex justify-content-center"><button type="submit"
                    class="btn btn-success mt-3 fs-5">Salva</button></div>
        </form>
    </div>
@endsection