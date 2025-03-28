@extends("layouts.master")
@section("titolo", "Profilo")
@section("contenuto")
    <style>
        .cent {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btnsCont{
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
    </style>
    <div class="container cent">
        <div class="profileCont">
            <h1>Benvenuto {{ $user->name }}</h1>
            <table class="table table-striped mt-5">
                <tbody>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Id</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Data creazione profilo</th>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format("d-m-Y") }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email Verificata</th>
                        <td>
                        <?= $user->email_verified_at == null ? "No" : "Si" ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="btnsCont pt-5">
                <a href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-warning">Esci</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                <a href="{{ url("dashboard") }}"  class="btn btn-success">Torna alla dashboard</a>
            </div>
        </div>
    </div>
@endsection