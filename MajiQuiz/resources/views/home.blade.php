@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Welcome to MajiQuiz!</h1>

        <form action="{{ route('start.quiz') }}" method="post">
            @csrf
            
            {{-- dropdown categoria --}}
            <div class="form-group">
                <label for="category">Choose a category:</label>
                <select name="category" id="category" class="form-control">
                    <option value="General Knowledge">General Knowledge</option>
                    <option value="Geography">Geography</option>
                    <option value="Sports">Sports</option>
                    <option value="Programming">Programming</option>
                    <option value="World history">World History</option>
                    <option value="Riddles">Riddles</option>
                    <option value="Science">Science</option>
                    <option value="Music">Music</option>
                    <option value="Movies">Movies</option>
                </select>
            </div>

            {{-- dropdown dificuldade --}}
            <div class="form-group">
                <label for="difficulty">Select difficulty:</label>
                <select name="difficulty" id="difficulty" class="form-control">
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Start Quiz</button>
        </form>
    </div>
@endsection
