<div class="card mt-5 text-center">
    <h5 class="card-header">    {{$titolo}}    </h5>
  <div class="card-body">
    <p class="card-text">

    @if ($cliente->isNotEmpty())
    Cliente: <br> <b>{{ $cliente }}</b>
    @else
    <b>
        Progetto Personale  
    </b>
    @endif    
    </p>
    {{ $descrizione }}
    <p class="card-text">Sviluppatori:  <br> <b>{{ $devs }}</b></p>
    {{ $dettagli }}
  </div>
  <div class="card-footer text-body-secondary">
    {{$data}}
  </div>
</div>