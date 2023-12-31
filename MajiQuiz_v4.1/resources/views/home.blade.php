@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="page-header min-vh-50 pb-md-5 absolute">
        <container class="container">
            <div class="d-flex align-items-center justify-content-center min-vh-80 pb-md-1">
            <img src="./img/letsplay.png" alt="Let's Play" class="img-fluid" style="max-height: 500px;">
            </div>
        </container>
    </div>

    <div class="container" class="d-flex justify-content-center align-items-center min-vh-100 red-jumbotron">
        <div class="jumbotron text-center mx-auto">
            <h1 class="display-1">Are you Ready?</h1>
                <p class="lead">Choose a category, a level and hit the start button!</p>
            <hr class="my-2">
            <p>Grab your thinking cap and a side of laughter, because at MajiQuiz, learning is the name of the game, and giggles are the bonus points!</p>
        </div>

        <form id="quizForm" action="{{ route('start-quiz') }}" method="post">
            @csrf

            {{-- 
                inputs hidden para passar categoria e dificuldade selecionadas para o controller.
                funcoes selectCategory e selectDifficulty vao preencher o atributo value destes inputs hidden.
                ver seccao <script> no final da view 
            --}}
            <input type="hidden" id="selectedCategory" name="selectedCategory" value="">
            <input type="hidden" id="selectedDifficulty" name="selectedDifficulty" value="">

            {{-- Opções de categoria --}}
            <div class="card text-white bg-info mb-5">
                <div class="card-body">
                    <h2 class="card-title">What's Your flavour?</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="max-width: 18rem;">
                                <img class="card-img-top" src="./img/genk.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">General Knowledge</h5>
                                    <p class="card-text">Do you dare to challenge your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('General Knowledge')">General Knowledge</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/geo.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Geography</h5>
                                    <p class="card-text">Do you dare to challange your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Geography')">Geography</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/sports.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Sports</h5>
                                    <p class="card-text">Do you dare to challange your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Sports')">Sports</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/prog.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Programming</h5>
                                    <p class="card-text">Do you dare to challange your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Programming')">Programming</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/whist.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">World History</h5>
                                    <p class="card-text">Do you dare to challange your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('World History')">World History</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/quizz.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Riddles</h5>
                                    <p class="card-text">Do you dare to challange your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Riddles')">Riddles</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/science.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Science</h5>
                                    <p class="card-text">Do you dare to challange your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Science')">Science</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/music.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Music</h5>
                                    <p class="card-text">Do you dare to challange your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Music')">Music</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/movies.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">Movies</h5>
                                    <p class="card-text">Do you dare to challange your Brain?</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Movies')">Movies</button>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
            {{-- Opções de dificuldade --}}
            <div class="card text-white bg-warning mb-5" >
                <h2 class="card-header">How Brave Are You?!</h2>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="./img/easy.png" class="card-img-top" alt="Imagem 1">
                                <div class="card-img-overlay overlay-container">
                                    <button type="button" class="btn btn-primary btn-overlay" onclick="selectDifficulty('Easy')">A bit Brave</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <img src="./img/medium.png" class="card-img-top" alt="Imagem 2">
                                <div class="card-img-overlay overlay-container">
                                    <button type="button" class="btn btn-primary btn-overlay" onclick="selectDifficulty('Medium')">Regular Brave</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <img src="./img/hard.png" class="card-img-top" alt="Imagem 3">
                                <div class="card-img-overlay overlay-container">
                                    <button type="button" class="btn btn-primary btn-overlay" onclick="selectDifficulty('Hard')">Super Brave</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
            <button type="submit" class="btn btn-lg btn-primary">Start Quiz</button>
            <a href="{{ route('home') }}" class="btn btn-lg btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script>
    function selectCategory(value) {
        document.getElementById('selectedCategory').value = value;
    }
    
    function selectDifficulty(value) {
        document.getElementById('selectedDifficulty').value = value;
    }
</script>

@endsection