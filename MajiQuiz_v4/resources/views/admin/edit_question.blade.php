@extends('layouts.layout')

@section('content')

<main class = "container">
    <h1>Edit Question</h1>

    <form method = "post" action = "{{route('admin.update', $question->id)}}">
        @csrf
        
        @method('put')
        <div class="form-group">
            <div class="form-group">
                <label for="category">Choose a category:</label>
                <select name="category" id="category" class="form-control">
                    <option value="General Knowledge" @if($question->category == 'General Knowledge') selected @endif>General Knowledge</option>
                    <option value="Geography" @if($question->category == 'Geography') selected @endif>Geography</option>
                    <option value="Sports" @if($question->category == 'Sports') selected @endif>Sports</option>
                    <option value="Programming" @if($question->category == 'Programming') selected @endif>Programming</option>
                    <option value="World history" @if($question->category == 'World history') selected @endif>World History</option>
                    <option value="Riddles" @if($question->category == 'Riddles') selected @endif>Riddles</option>
                    <option value="Science" @if($question->category == 'Science') selected @endif>Science</option>
                    <option value="Music" @if($question->category == 'Music') selected @endif>Music</option>
                    <option value="Movies" @if($question->category == 'Movies') selected @endif>Movies</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="difficulty">Select difficulty:</label>
            <select name="difficulty" id="difficulty" class="form-control" value="{{$question->difficulty}}">
                <option value="Easy" @if($question->difficulty == 'Easy') selected @endif>Easy</option>
                <option value="Medium" @if($question->difficulty == 'Medium') selected @endif>Medium</option>
                <option value="Hard" @if($question->difficulty == 'Hard') selected @endif>Hard</option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Question</label>
            <input type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{$question->question}}">
            @error('question')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="correct_answer">Correct Answer</label>
            <input type="text" class="form-control @error('correct_answer') is-invalid @enderror" name="correct_answer" value="{{$question->correct_answer}}">
            @error('correct_answer')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="incorrect_answer1">Incorrect Answer 1</label>
            <input type="text" class="form-control @error('incorrect_answer1') is-invalid @enderror" name="incorrect_answer1" value="{{$question->incorrect_answer1}}">
            @error('incorrect_answer1')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="incorrect_answer2">Incorrect Answer 2</label>
            <input type="text" class="form-control @error('incorrect_answer2') is-invalid @enderror" name="incorrect_answer2" value="{{$question->incorrect_answer2}}">
            @error('incorrect_answer2')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="incorrect_answer3">Incorrect Answer 3</label>
            <input type="text" class="form-control @error('incorrect_answer3') is-invalid @enderror" name="incorrect_answer3" value="{{$question->incorrect_answer3}}">
            @error('incorrect_answer3')
            <div class = "invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</main>

@endsection