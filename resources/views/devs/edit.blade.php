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
        <h1 class="mb-5">Modifica Sviluppatore</h1>
        <form method="POST" action="{{ route("devs.update", $dev) }}" class="row d-flex form-control p-5"
        enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="col-6">
                <label for="nome">Nome:</label>
                <input value="{{ $dev->nome }}" class="form-control" type="text" name="nome" id="nome">
            </div>

            <div class="col-6">
                <label for="soprannome">Soprannome:</label>
                <input value="{{ $dev->soprannome }}" class="form-control" type="text" name="soprannome" id="soprannome">
            </div>

            <div class="col-6">
                <label for="descrizione">Descrizione:</label>
                <textarea style="height: 200px;" class="form-control" name="descrizione"
                    id="descrizione">{{ $dev->descrizione }}</textarea>
            </div>

            <div class="col-6">
                <div class="d-flex form-control flex-wrap mt-3">
                    @foreach ($techs as $tech)
                        <div class="me-3 mb-3 ">
                            <input type="checkbox" name="techs[]" value="{{ $tech->id }}" id="tech{{ $tech->id }}" {{ $dev->technologies->contains($tech) ? "checked" : "" }}>
                            <label style="font-size: 22px" for="tech{{ $tech->id }}">{{ $tech->nome }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-6">
                <label for="image">Immagine Profilo:</label>
                <input type="file" name="img" id="image" >
                <label for="delImg">Eliminare l'immagine attuale?</label>
                <input type="checkbox" id="delImg" name="deleteImg">
            </div>

            <div class="col-6 d-flex justify-content-center"><button type="submit"
                    class="btn btn-success mt-3 fs-5">Salva</button></div>
        </form>
        <a href="{{ route("devs.index") }}" class="btn btn-primary mt-5">Torna alla lista Sviluppatori</a>
    </div>
@endsection