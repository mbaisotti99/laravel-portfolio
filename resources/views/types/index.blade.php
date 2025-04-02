@extends("layouts.master")
@section("titolo", "Lista Tipi")
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
        <a href="{{ route("types.create") }}" class="btn btn-success mb-5">Crea un nuovo Tipo</a>
        <table class="table table-striped">
            <tr>
                <th>Tipo</th>
                <th>Descrizione</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($types as $type)
                <tr>
                    <td>{{$type->nome}}</td>
                    <td>{{$type->descrizione}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route("types.edit", $type) }}">
                            Modifica
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Elimina
                        </button>
                    </td>
                </tr>
            @endforeach
            <form action="{{ route("types.destroy", $type) }}" method="POST" id="deleteForm">
                @csrf
                @method("DELETE")
            </form>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Tipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare questo tipo? Questo eliminerà anche tutti i progetti con questo tipo
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-outline-danger"
                    onclick="event.preventDefault(); document.getElementById('deleteForm').submit()">Elimina</button>                </div>
            </div>
        </div>
    </div>
@endsection