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
                ver seccao script no final da view 
            --}}
            <input type="hidden" id="selectedCategory" name="selectedCategory" value="">
            <input type="hidden" id="selectedDifficulty" name="selectedDifficulty" value="">

            
            {{-- Opções de categoria --}}
            <div class="card text-white bg-info mb-5">
                <div class="card-body">
                    <h2 class="card-title">STEP 1 - What's Your flavour?</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="max-width: 18rem;">
                                <img class="card-img-top" src="./img/genk.jpg" alt="Card image cap">
                                <div class="card-body text-primary">                                    
                                    <p class="card-text">Test your wits with our diverse General Knowledge quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('General Knowledge')"><b>General Knowledge</b></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/geo.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <p class="card-text">Explore the world through our Geography quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Geography')"><b>Geography</b></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/sports.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <p class="card-text">Gear up for victory in our Sports knowledge quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Sports')"><b>Sports</b></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/prog.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <p class="card-text">Code your way to victory in our Programming quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Programming')"><b>Programming</b></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/whist.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <p class="card-text">Travel through time with our World History quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('World History')"><b>World History</b></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/quizz.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <p class="card-text">Challenge your mind with our mind-bending Riddles quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Riddles')"><b>Riddles</b></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/science.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <p class="card-text">Unlock the secrets of the universe with our Science quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Science')"><b>Science</b></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/music.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <p class="card-text">Harmonize your knowledge in our Music quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Music')"><b>Music</b></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/movies.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <p class="card-text">Test your cinematic expertise with our Movies quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Movies')"><b>Movies</b></button>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
            {{-- Opções de dificuldade --}}
            <div class="card text-white bg-warning mb-4" >
                <h2 class="card-header">STEP 2 - How Brave Are You?!</h2>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="./img/easy.png" class="card-img-top" alt="Imagem 1">
                                <div class="card-img-overlay overlay-container">
                                    <button type="button" class="btn btn-primary btn-overlay" onclick="selectDifficulty('Easy')">A bit Brave - Let's take it EASY!</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <img src="./img/medium.png" class="card-img-top" alt="Imagem 2">
                                <div class="card-img-overlay overlay-container">
                                    <button type="button" class="btn btn-primary btn-overlay" onclick="selectDifficulty('Medium')">Regular Brave - MEDIUM please!</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <img src="./img/hard.png" class="card-img-top" alt="Imagem 3">
                                <div class="card-img-overlay overlay-container">
                                    <button type="button" class="btn btn-primary btn-overlay" onclick="selectDifficulty('Hard')">Super Brave - Let's get HARD!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="d-grid gap-2 justify-content-end mb-5" style="margin-left:-3rem;">
            
            <button type="submit" class="btn btn-lg col-lg-2 btn-primary ml-5" data-toggle="button" aria-pressed="false" autocomplete="off">Start Quiz</button>
            <a href="{{ route('select-quiz') }}" class="btn btn-lg col-lg-2  btn-secondary ml-3" data-toggle="button" aria-pressed="false" autocomplete="off">Cancel</a>
            
            </div>
          
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