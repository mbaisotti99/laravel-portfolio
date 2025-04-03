@extends("layouts.master")
@section("titolo", "I miei Progetti")
@section("contenuto")
<style>
    .card{
        height: 350px;
    }
    .card-body{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column; 
    }
</style>
    <div class="container pb-5">
        <h1 class="text-center mt-5">Tutti i Progetti</h1>
        <div class="d-flex justify-content-around w-100 ">
            <a href="{{ route("projects.create") }}" class="btn btn-success fs-3 mt-5">Crea un nuovo progetto</a>
            <a href="{{ route("types.index") }}" class="btn btn-success fs-3 mt-5">Visualizza tipologie</a>
        </div>
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-6">
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
                        <x-slot:id>
                            {{ $project->id }}
                        </x-slot:id>
                        <x-slot:devs>
                            {{ implode(" - ", $project->devs) }}
                        </x-slot:devs>
                        <x-slot:descrizione>
                            <!-- <p class="card-text">Descrizione: <br> {{ $project->descrizione }}</p> -->
                        </x-slot:descrizione>
                        <x-slot:dettagli>
                            <a href="{{route("projects.show", $project->id)}}" class="btn btn-primary mt-3">Dettagli</a>
                        </x-slot:dettagli>
                        <x-slot:typeName>
                            {{ $project->type->nome }}
                        </x-slot:typeName>
                        <x-slot:typeDesc>
                            {{ $project->type->descrizione }}
                        </x-slot:typeDesc>
                        <x-slot:techs>
                            @if (count($project->technologies) > 0)
                            <div class="d-flex justify-content-center flex-wrap">
                                @foreach ($project->technologies as $tech )
                                    <span class="badge me-3 mb-3 fs-6" style="background-color: {{$tech->colore}};">{{ $tech->nome }}</span>
                                @endforeach
                            </div>
                            @endif
                        </x-slot:techs>
                    </x-project-card>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection