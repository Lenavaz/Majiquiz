@extends('layouts.layout')

@section('content')

{{-- permite manter header da tabela sempre visivel mesmo ao fazer scroll down --}}
<style>
  .fixed-header thead {
      position: sticky;   
      top: 0;            
      background-color: white; 
  }
</style>

<main class = "container">
      <a type="button" class="btn btn-primary my-2" href="{{route('admin.create')}}">Create Question</a>
      
      <h1>MajiQuiz Questions</h1>

      {{-- dropdowns para filtrar tabela --}}
      <form action="{{ route('admin.index') }}" method="GET">
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
      <table class="table fixed-header">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Category</th>
            <th scope="col">Difficulty</th>
            <th scope="col">Question</th>
            <th scope="col">Correct Answer</th>
            <th scope="col">Incorrect Answer 1</th>
            <th scope="col">Incorrect Answer 2</th>
            <th scope="col">Incorrect Answer 3</th>

            <th colspan=3>Action Buttons</th>
          </tr>
        </thead>
        <tbody>
          @foreach($questions as $question)
            <tr>
              <th scope="row">{{$question->id}}</th>
              <td>{{$question->category}}</td>
              <td>{{$question->difficulty}}</td>
              <td>{{$question->question}}</td>
              <td>{{$question->correct_answer}}</td>
              <td>{{$question->incorrect_answer1}}</td>
              <td>{{$question->incorrect_answer2}}</td>
              <td>{{$question->incorrect_answer3}}</td>
              {{-- 
                <td>
                  <a type="button" class="btn btn-success" href="{{route('admin.show', $question->id)}}">Show</a>
                </td>   
              --}}
              <td>
                <a type="button" class="btn btn-warning" href="{{route('admin.edit', $question->id)}}">Edit</a>
              </td>  
              <td>
                <form action="{{route('admin.delete', $question->id)}}" method="post">
                  @method('delete')
                  @csrf
                  <input type="submit" value="Delete" class="btn btn-danger">
                </form>
              </td>  
            </tr>
          @endforeach
        </tbody>
      </table>
</main>

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