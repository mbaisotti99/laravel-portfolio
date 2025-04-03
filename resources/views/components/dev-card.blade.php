@props(["dev"])

<div class="card mb-5 text-center">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$dev->nome}}</h5>
    <h5 class="card-title text-secondary">{{$dev->soprannome}}</h5>
    <p class="card-text">{{$dev->descrizione}}</p>
  </div>
  <h5 class="card-title">Specialità:</h5>
  <ul class="list-group list-group-flush">
    @foreach ($dev->technologies as $tech)

    <li class="list-group-item"><span class="badge fs-6"
      style="background-color:{{ $tech->colore }}">{{ $tech->nome }}</span></li>
  @endforeach
  </ul>
  <div class="card-body d-flex justify-content-around">
    <a href="{{route("devs.edit", $dev)}}" class="btn btn-warning fs-3" style="color:white;">Modifica</a>
    <button type="button" class="btn btn-danger fs-3" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $dev->id }}">
                            Elimina
                        </button>
  </div>
</div>

<div class="modal fade" id="deleteModal{{ $dev->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $dev->id }}Label"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModal{{ $dev->id }}Label">Elimina Tipo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare questo sviluppatore? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
        <form action="{{ route("devs.destroy", $dev) }}" method="POST" id="deleteForm">
          @csrf
          @method("DELETE")
          <button class="btn btn-outline-danger" type="submit">Elimina</button>
        </form>
      </div>
    </div>
  </div>
</div>