@extends("layouts.master")
@section("titolo", "Pagina non trovata")
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
<div class="container cent">
    <img src="/404.avif" alt="404">
    <h2 class="my-5">404</h2>
    <p class="fs-2">Pagina non trovata</p>
</div>
@endsection
