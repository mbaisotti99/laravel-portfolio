@extends("layouts.master")
@section("titolo", "Modifica il progetto ".$project->id)
@section("contenuto")
<style>
    .cent{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        flex-direction: column;
    }
</style>
<div class="container cent">
    <h1 class="text-center">Modifica il progetto</h1>
    <form action="{{ route("projects.update", $project) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="row mt-5 justify-content-center">

            <div class="col-6">
                <label for="titolo" class="form-label">Titolo: </label>
                <input required value="{{ $project->titolo }}" type="text" name="titolo" id="titolo" class="form-control">
            </div>
            <div class="col-6">
                <label for="cliente" class="form-label">Cliente: </label>
                <input value="{{ $project->cliente }}" type="text" name="cliente" id="cliente" class="form-control">
            </div>
            <div class="col-6">
                <label for="devs" class="form-label">Sviluppatori (separa con la ,): </label>
                <input required value="{{ implode(", ",$project->devs) }}" type="text" name="devs" id="devs" class="form-control">
            </div>
            <div class="col-6">
                <label for="descrizione" class="form-label">Descrizione: </label>
                <textarea required name="descrizione" id="descrizione" class="form-control"> {{ $project->descrizione }}</textarea>
            </div>
            <div class="col-6">
                <label for="data" class="form-label">Data completamento: </label>
                    <input required value="{{ $project->data }}" type="date" name="data" id="data" class="form-control">
            </div>
            
            <button class="btn btn-success mt-5 w-50" type="submit">Salva</button>
        </div>
    </form>
    <a href="{{ route("projects.index") }}" class="btn btn-primary fs-3 mt-5">Torna alla lista progetti</a>

</div>
@endsection