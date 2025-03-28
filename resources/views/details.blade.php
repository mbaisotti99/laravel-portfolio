@extends("layouts.master")
@section("titolo", "Progetto " . $project->id)
@section("contenuto")
    <style>
        .cent {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            flex-direction: column;
        }
        .card{
            width: 450px;
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
                {{ implode(" - ", $project->devs) }}
            </x-slot:devs>
            <x-slot:descrizione>
                <p class="card-text">Descrizione: <br> {{ $project->descrizione }}</p>
            </x-slot:descrizione>
            <x-slot:dettagli>
                <!-- <a href="{{route("projects.show", $project->id)}}" class="btn btn-primary">Dettagli</a> -->
            </x-slot:dettagli>
        </x-project-card>
        <a href="{{ route("projects.index") }}" class="btn btn-success fs-3 my-5">Torna alla lista progetti</a>
    </div>
@endsection