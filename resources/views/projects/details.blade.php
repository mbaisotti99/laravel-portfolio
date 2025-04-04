@extends("layouts.master")
@section("titolo", "Progetto " . $project->id)
@section("contenuto")
    <style>
        .cent {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100% !important;
            flex-direction: column;
            margin: 100px auto;
        }

        .card {
            width: 450px !important;
            height: fit-content !important;
        }
    </style>
    <div class="container cent">
        <x-project-card>
            <x-slot:titolo>
                {{ $project->titolo }}
            </x-slot:titolo>
            <x-slot:cliente>
                {{ $project->cliente }}
            </x-slot:cliente>
            <x-slot:data>
                {{ $project->data }}
            </x-slot:data>
            <x-slot:devs>
                {{ implode(" - ", $project->developers) }}
            </x-slot:devs>
            <x-slot:descrizione>
                <p class="card-text">Descrizione: <br> {{ $project->descrizione }}</p>
            </x-slot:descrizione>
            <x-slot:dettagli>
                <!-- <a href="{{route("projects.show", $project->id)}}" class="btn btn-primary">Dettagli</a> -->
            </x-slot:dettagli>
            <x-slot:typeName>
                {{ $project->type->nome }}
            </x-slot:typeName>
            <x-slot:typeDesc>
                {{ $project->type->descrizione }}
            </x-slot:typeDesc>
            <x-slot:id>
                {{ $project->id }}
            </x-slot:id>
            <x-slot:techs>
                @if (count($project->technologies) > 0)
                    <div class="d-flex justify-content-center flex-wrap">
                        @foreach ($project->technologies as $tech)
                            <span class="badge me-3 mb-3 fs-6" style="background-color: {{$tech->colore}};">{{ $tech->nome }}</span>
                        @endforeach
                    </div>
                @endif
            </x-slot:techs>
        </x-project-card>
        <div class="d-flex justify-content-around w-50 mt-5 ">
            <a href="{{ route("projects.edit", $project) }}" class="btn fs-3 btn-outline-warning">Modifica</a>
            <button type="button" class="btn btn-outline-danger fs-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina
            </button>
        </div>

        <form action="{{ route("projects.destroy", $project) }}" method="POST" id="destroy">
            @csrf
            @method("DELETE")
        </form>
        <a href="{{ route("projects.index") }}" class="btn btn-success fs-3 my-5">Torna alla lista progetti</a>
    </div>

    <!-- Modale   -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Progetto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare questo progetto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-outline-danger"
                        onclick="event.preventDefault(); document.getElementById('destroy').submit()">Elimina</button>
                </div>
            </div>
        </div>
    </div>
@endsection