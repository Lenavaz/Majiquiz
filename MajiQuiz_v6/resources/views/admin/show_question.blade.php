@extends('layouts.layout')

@section('content')

<main class = "container">
    <h1>Question</h1>

    <table class="table">
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$question->id}}</th>
                <td>{{$question->category}}</td>
                <td>{{$question->difficulty}}</td>
                <td>{{$question->question}}</td>
                <td>{{$question->correct_answer}}</td>
                <td>{{$question->incorrect_answer1}}</td>
                <td>{{$question->incorrect_answer2}}</td>
                <td>{{$question->incorrect_answer3}}</td>
            </tr>
        </tbody>
    </table>
</main>

@endsection