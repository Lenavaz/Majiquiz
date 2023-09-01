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
                    <h2 class="card-title">What's Your flavour?</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="max-width: 18rem;">
                                <img class="card-img-top" src="./img/genk.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>General Knowledge</b></h5>
                                    <p class="card-text">Test your wits with our diverse General Knowledge quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('General Knowledge')">General Knowledge</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/geo.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>Geography</b></h5>
                                    <p class="card-text">Explore the world through our Geography quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Geography')">Geography</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/sports.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>Sports</b></h5>
                                    <p class="card-text">Gear up for victory in our Sports knowledge quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Sports')">Sports</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/prog.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>Programming</b></h5>
                                    <p class="card-text">Code your way to victory in our Programming quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Programming')">Programming</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/whist.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>World History</b></h5>
                                    <p class="card-text">Travel through time with our World History quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('World History')">World History</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/quizz.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>Riddles</b></h5>
                                    <p class="card-text">Challenge your mind with our mind-bending Riddles quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Riddles')">Riddles</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/science.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>Science</b></h5>
                                    <p class="card-text">Unlock the secrets of the universe with our Science quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Science')">Science</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/music.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>Music</b></h5>
                                    <p class="card-text">Harmonize your knowledge in our Music quiz!</p>
                                    <button type="button" class="btn btn-primary btn-block" onclick="selectCategory('Music')">Music</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="./img/movies.jpg" alt="Card image cap">
                                <div class="card-body text-primary">
                                    <h5 class="card-title" style="text-align:center"><b>Movies</b></h5>
                                    <p class="card-text">Test your cinematic expertise with our Movies quiz!</p>
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
            <a href="{{ route('select-quiz') }}" class="btn btn-lg btn-secondary">Cancel</a>
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