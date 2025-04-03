@extends("layouts.master")
@section("titolo", "Tecnologie")
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
        <a href="{{ route("techs.create") }}" class="btn btn-success mt-5 fs-3">Crea nuova Tecnologia</a>
        <table class="table table-striped my-5">
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($techs as $tech)
                <tr>
                    <td>{{ $tech->nome }}</td>
                    <td>{{ $tech->descrizione }}</td>
                    <td><a href="{{ route("techs.edit", $tech) }}" class="btn btn-warning">Modifica</a></td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $tech->id }}">
                            Elimina
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="deleteModal{{ $tech->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $tech->id }}Label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModal{{ $tech->id }}Label">Elimina Tipo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler eliminare questa tecnologia? Questo eliminerà anche tutti i progetti con questa tecnologia
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route("techs.destroy", $tech) }}" method="POST" id="deleteForm">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-outline-danger" type="submit">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>

@endsection