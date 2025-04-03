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
        <div class="d-flex justify-content-around w-100">
            <a href="{{ route("types.create") }}" class="btn btn-success mb-5 fs-3 ">Crea un nuovo Tipo</a>
            <a href="{{ route("projects.index") }}" class="btn btn-success mb-5 fs-3">Progetti</a>
        </div>
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
                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $type->id }}">
                            Elimina
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="deleteModal{{ $type->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $type->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModal{{ $type->id }}Label">Elimina Tipo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler eliminare questo tipo? Questo eliminerà anche tutti i progetti con questo tipo
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route("types.destroy", $type) }}" method="POST" id="deleteForm">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-outline-danger"
                                    type="submit">Elimina</button>                
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            </table>
            </div>
@endsection