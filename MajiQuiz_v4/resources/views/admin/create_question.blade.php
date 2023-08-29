@extends('layouts.layout')

@section('content')

<main class = "container">
    <h1>Create Question</h1>

    <form method = "post" action = "{{route('admin.store')}}">
        @csrf
        
        <div class="form-group">
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
        </div>

        <div class="form-group">
            <label for="difficulty">Select difficulty:</label>
            <select name="difficulty" id="difficulty" class="form-control">
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Question</label>
            <input type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{old('question')}}">
            @error('question')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="correct_answer">Correct Answer</label>
            <input type="text" class="form-control @error('correct_answer') is-invalid @enderror" name="correct_answer" value="{{old('correct_answer')}}">
            @error('correct_answer')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="incorrect_answer1">Incorrect Answer 1</label>
            <input type="text" class="form-control @error('incorrect_answer1') is-invalid @enderror" name="incorrect_answer1" value="{{old('incorrect_answer1')}}">
            @error('incorrect_answer1')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="incorrect_answer2">Incorrect Answer 2</label>
            <input type="text" class="form-control @error('incorrect_answer2') is-invalid @enderror" name="incorrect_answer2" value="{{old('incorrect_answer2')}}">
            @error('incorrect_answer2')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="incorrect_answer3">Incorrect Answer 3</label>
            <input type="text" class="form-control @error('incorrect_answer3') is-invalid @enderror" name="incorrect_answer3" value="{{old('incorrect_answer3')}}">
            @error('incorrect_answer3')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</main>

@endsection