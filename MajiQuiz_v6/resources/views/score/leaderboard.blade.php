@extends('layouts.layout')

@section('content')

<div class="container">
    <header>
        <div class="page-header min-vh-1 pb-md-3 absolute">
            <container class="container">
                <div class="d-flex align-items-center justify-content-center min-vh-80 pb-md-1 ">
                <img src="./img/comp.jpg" alt="competitions" class="img-fluid" style="max-height: 400px; margin: 20px 0;">
                </div>
            </container>
        </div>
    </header>


<div class="container background-image-page">
    <h1 style="color: white; text-shadow: 2px 2px 2px black" class="mt-5">Leaderboard</h1>
    
    {{-- dropdowns para filtrar tabela --}}
    <form action="{{ route('leaderboard') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-4">
                <select class="form-control" name="category" id="categoryFilter">
                    <option value="All">All Categories</option>
                    <option value="General Knowledge">General Knowledge</option>
                    <option value="Geography">Geography</option>
                    <option value="Sports">Sports</option>
                    <option value="Programming">Programming</option>
                    <option value="World History">World History</option>
                    <option value="Riddles">Riddles</option>
                    <option value="Science">Science</option>
                    <option value="Music">Music</option>
                    <option value="Movies">Movies</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-control" name="difficulty" id="difficultyFilter">
                    <option value="All">All Difficulties</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" id="filterButton">Filter</button>
            </div>
        </div>
    </form>
    
    {{-- ======================================== --}}
    <table class="table" style="color: white; text-shadow: 2px 2px 2px black">
        <thead>
            <tr>
                <th>Ranking</th>
                <th>User</th>
                <th>Category</th>
                <th>Difficulty</th>
                <th>Score</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scores as $key => $score)
            {{-- {{dd($scores);}} --}}
            <tr>
                <td> {{-- td do ranking--}}
                    {{-- 
                        $key é 0 no primeiro ciclo. corresponde ao primeiro elemento do array.
                        $key + 1 para que ranking comece no 1.
                        no entanto, valor de $key mantem-se a 0. descomentar dd($key)
                    --}}
                    {{ $key + 1 }}
                    {{-- {{dd($key);}} --}}

                    {{-- mostrar medalha consoante valor de $key --}}
                    @if($key == 0) 🥇
                    @elseif($key == 1) 🥈
                    @elseif($key == 2) 🥉
                    @endif
                </td>
                {{-- é possivel aceder ao ->user['username'] porque a query no controller foi feita com "with('user')". --}}
                {{-- assim query foi buscar tambem dados do utilizador associado a cada pontuacao --}}
                <td>{{ $score->user['username'] }}</td>
                <td>{{ $score->category }}</td>
                <td>{{ $score->difficulty }}</td>
                <td>{{ $score->score }}%</td>
                <td>{{ $score->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container" class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="jumbotron text-center mx-auto ">
  <h3 class="display-5">"Winning isn't everything, but wanting to win is."</h3>
  <p class="lead"> Vince Lombardi</p>

    <hr class="my-2">

</div>

<br>
  <br>
  <br>

{{-- 
    permite reter opcoes que utilizador selecionou no dropdown apos o form ser submetido e a pagina ser recarregada ao clicar no botao "Filter".
    assim utilizador sabe quais os filtros que estao aplicados à tabela que está a ver.
    {{ request('category', 'All') }}        // acede à categoria que utilizador submeteu no form. se nao existir, default é 'All'
--}}
<script>
    document.getElementById('categoryFilter').value = "{{ request('category', 'All') }}";
    document.getElementById('difficultyFilter').value = "{{ request('difficulty', 'All') }}";
</script>

@endsection