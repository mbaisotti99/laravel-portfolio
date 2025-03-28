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
                        <x-slot:devs>
                            {{ implode(" - ", $project->devs) }}
                        </x-slot:devs>
                        <x-slot:descrizione>
                            <!-- <p class="card-text">Descrizione: <br> {{ $project->descrizione }}</p> -->
                        </x-slot:descrizione>
                        <x-slot:dettagli>
                            <a href="{{route("projects.show", $project->id)}}" class="btn btn-primary mt-3">Dettagli</a>
                        </x-slot:dettagli>
                    </x-project-card>
                </div>
            @endforeach
        </div>
    </div>
@endsection