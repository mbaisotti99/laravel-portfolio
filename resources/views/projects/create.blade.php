@extends("layouts.master")
@section("titolo", "Crea nuovo post")
@section("contenuto")
<style>
    .cent{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        flex-direction: column;
    }
</style>
<script>
    let count = 2;
    function addInput(){
        let newCont = document.createElement("div")
        let newInput = document.createElement("input")
        let newBtn = document.createElement("button")
        let removeBtn = document.getElementById("remBtn")
        let devsCont = document.getElementById("devsCont")


        newCont.classList.add("d-flex", "align-items-center", "mt-3")
        newCont.id = "dev" + count + "Cont"

        newBtn.classList.add("btn", "btn-primary", "my-2")
        newBtn.type = "button"
        newBtn.id = "remBtn" + count
        newBtn.textContent = "-"
        newBtn.setAttribute("onClick", "removeInput("+count+")")
        
        newInput.type = "text"
        newInput.name = "dev" + count
        newInput.id = "dev" + count
        newInput.classList.add("form-control")

        devsCont.appendChild(newCont)
        newCont.appendChild(newInput)
        newCont.appendChild(newBtn)
        count++


    }
    function removeInput(curN){

        count--
        let curCont = document.getElementById("dev"+curN+"Cont")

        curCont.remove()

    }
</script>
<div class="container cent">
<h1 class="text-center">Crea un nuovo progetto</h1>
    <form action="{{ route("projects.store") }}" method="POST">
        @csrf
        <div class="row mt-5 justify-content-center">

            <div class="col-6">
                <label for="titolo" class="form-label">Titolo: </label>
                <input type="text" name="titolo" id="titolo" class="form-control">
            </div>
            <div class="col-6">
                <label for="cliente" class="form-label">Cliente: </label>
                <input type="text" name="cliente" id="cliente" class="form-control">
            </div>
            <div class="col-6 mb-3" id="devsCont">
                <div class="d-flex justify-content-between my-3">
                    <label for="dev1" class="form-label">Sviluppatori: </label>
                    <button type="button" id="addBtn" class="btn btn-primary" onclick="addInput()">+</button>
                </div>
                <div class="d-flex" id="dev1Cont">
                    <input type="text" name="dev1" id="dev1" class="form-control">
                    <!-- <button type="button" id="remBtn1" class="btn btn-primary" onclick="removeInput()" disabled>-</button> -->
                </div>
            </div>
            <div class="col-6">
                <label for="descrizione" class="form-label">Descrizione: </label>
                <textarea name="descrizione" id="descrizione" class="form-control"></textarea>
            </div>
            <div class="col-6">
                <label for="data" class="form-label">Data completamento: </label>
                    <input type="date" name="data" id="data" class="form-control">
            </div>
            
            <button class="btn btn-success mt-5 w-50" type="submit">Salva</button>
        </div>
    </form>
    <a href="{{ route("projects.index") }}" class="btn btn-primary fs-3 mt-5">Torna alla lista progetti</a>
</div>
@endsection
