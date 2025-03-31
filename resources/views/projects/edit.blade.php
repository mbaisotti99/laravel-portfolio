@extends("layouts.master")
@section("titolo", "Modifica il progetto " . $project->id)
@section("contenuto")
    <style>
        .cent {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            flex-direction: column;
        }

        #addBtn{
            padding: 0 !important;
        }
    </style>
    <script>
        let devs = <?php echo json_encode($project->devs); ?>;
        let count = devs.length;

        function updateInputs() {
            let devsCont = document.getElementById("devsCont")
            devsCont.innerHTML = ""

            devs.forEach((dev, i) => {
                
                let newCont = document.createElement("div")
                let newInput = document.createElement("input")
                let newBtn = document.createElement("button")

                newCont.classList.add("d-flex", "align-items-center", "mt-3")
                newCont.id = "dev" + i + "Cont"

                newBtn.classList.add("btn", "btn-outline-secondary", "my-2")
                newBtn.type = "button"
                newBtn.id = "remBtn" + i
                newBtn.textContent = "-"
                newBtn.setAttribute("onClick", "removeInput(" + i + ")")

                newInput.type = "text"
                newInput.name = "dev" + i
                newInput.id = "dev" + i
                newInput.value = dev
                newInput.classList.add("form-control")

                devsCont.appendChild(newCont)
                newCont.appendChild(newInput)
                i > 0 && newCont.appendChild(newBtn)

            });
        }

        function addInput() {
            let newCont = document.createElement("div")
            let newInput = document.createElement("input")
            let newBtn = document.createElement("button")
            let removeBtn = document.getElementById("remBtn")
            let devsCont = document.getElementById("devsCont")


            newCont.classList.add("d-flex", "align-items-center", "mt-3")
            newCont.id = "dev" + count + "Cont"

            newBtn.classList.add("btn", "btn-outline-secondary", "my-2")
            newBtn.type = "button"
            newBtn.id = "remBtn" + count
            newBtn.textContent = "-"
            newBtn.setAttribute("onClick", "removeInput(" + count + ")")

            newInput.type = "text"
            newInput.name = "dev" + count
            newInput.id = "dev" + count
            newInput.classList.add("form-control")

            devsCont.appendChild(newCont)
            newCont.appendChild(newInput)
            newCont.appendChild(newBtn)
            count++

        }
        function removeInput(curN) {

            count--
            let curCont = document.getElementById("dev" + curN + "Cont")

            curCont.remove()
            devs.splice(curN, 1)
            updateInputs()

        }
    </script>
    <div class="container cent">
        <h1 class="text-center">Modifica il progetto</h1>
        <form action="{{ route("projects.update", $project) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="row mt-5 justify-content-center">

                <div class="col-6">
                    <label for="titolo" class="form-label">Titolo: </label>
                    <input required value="{{ $project->titolo }}" type="text" name="titolo" id="titolo"
                        class="form-control">
                </div>
                <div class="col-6">
                    <label for="cliente" class="form-label">Cliente: </label>
                    <input value="{{ $project->cliente }}" type="text" name="cliente" id="cliente" class="form-control">
                </div>


                <div class="col-6 mb-3">
                    <div class="d-flex justify-content-between my-3 w-100">
                        <label for="dev1" class="form-label">Sviluppatori: </label>
                        <button type="button" id="addBtn" class="btn" onclick="addInput()"><x-bi-plus-square style="width: 32px; height: 32px" /></button>
                    </div>
                    <div id="devsCont">
                        @foreach ($project->devs as $key => $dev)
                            <div class="d-flex mt-3" id="dev{{$key}}Cont">
                                <input type="text" name="dev{{ $key }}" id="dev{{$key}}" value="{{ $dev }}" class="form-control">
                                @if ($key > 0)
                                    <button type="button" id="remBtn{{$key}}" class="btn btn-outline-secondary"
                                        onclick="removeInput({{$key}})">-</button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="col-6">
                    <label for="descrizione" class="form-label">Descrizione: </label>
                    <textarea required name="descrizione" id="descrizione"
                        class="form-control"> {{ $project->descrizione }}</textarea>
                </div>
                <div class="col-6">
                    <label for="data" class="form-label">Data completamento: </label>
                    <input required value="{{ $project->data }}" type="date" name="data" id="data" class="form-control">
                </div>
                <button class="btn btn-success mt-5 w-50" type="submit">Salva</button>
            </div>
        </form>
        <a href="{{ route("projects.index") }}" class="btn btn-primary fs-3 mt-5">Torna alla lista progetti</a>

    </div>
@endsection