<style>
  .card{
    height: 500px;
  }
</style>
<div class="card mt-5 text-center">
  <h5 class="card-header"> {{$titolo}} </h5>
  <div class="card-body">
    @if (isset($typeName))
    <div class="accordion accordion-flush my-3" id="accordionFlush{{$id}}">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse{{$id}}" aria-expanded="false" aria-controls="flush-collapse{{$id}}">
            {{$typeName}}
          </button>
        </h2>
        <div id="flush-collapse{{$id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlush{{$id}}">
          <div class="accordion-body">
            {{ $typeDesc }}
          </div>
        </div>
      </div>
    </div>
    @else 
    <p class="card-text">
      <b>
        TypeLess
      </b>
    </p>
    @endif

    {{ $techs }}

    @if ($cliente->isNotEmpty())
    Cliente: <br> <b>{{ $cliente }}</b>
  @else
  <b>
    Progetto Personale
  </b>
@endif
    </p>
    {{ $descrizione }}
    <p class="card-text">Sviluppatori: <br> <b>{{ $devs }}</b></p>
    {{ $dettagli }}
  </div>
  <div class="card-footer text-body-secondary">
    {{\Carbon\Carbon::parse($data)->format("d-m-Y")}}
  </div>
</div>