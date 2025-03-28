@extends("layouts.master")
@section("titolo", "Crea nuovo post")
@section("contenuto")
<style>
    .cent{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
</style>
<div class="container cent">
    <form action="{{ route("projects.store") }}" method="POST">
        @csrf
        <div class="row mt-5 justify-content-center">

            <div class="col-6">
                <label for="titolo" class="form-label">Titolo: </label>
                <input type="text" name="titolo" id="titolo" class="form-control">
            </div>
            <div class="col-6">
                <label for="cliente" class="form-label">Cliente: </label>
                <input type="text" name="cliente" id="cliente" class="form-control">
            </div>
            <div class="col-6">
                <label for="devs" class="form-label">Sviluppatori (separa con la ,): </label>
                <input type="text" name="devs" id="devs" class="form-control">
            </div>
            <div class="col-6">
                <label for="descrizione" class="form-label">Descrizione: </label>
                <textarea name="descrizione" id="descrizione" class="form-control"></textarea>
            </div>
            <div class="col-6">
                <label for="data" class="form-label">Data completamento: </label>
                    <input type="date" name="data" id="data" class="form-control">
            </div>
            
            <button class="btn btn-success mt-5 w-50" type="submit">Salva</button>
        </div>
    </form>
</div>
@endsection
