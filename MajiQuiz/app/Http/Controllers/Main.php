<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class Main extends Controller
{
    
    public function index()
    {
        return view('home');
    }

    public function startQuiz(Request $request) {
    
        // aceder à categoria e dificuldade passadas pelos dropdowns contidos no form da view home
        $selectedCategory = $request->category;
        $selectedDifficulty = $request->difficulty;

        // if ($request->has('retry')) {
        //     dd($selectedCategory, $selectedDifficulty);
        // }
        
        // aceder a questoes da BD que correspondem à categoria e dificuldade selecionada pelo utilizador.
        // cada quiz tem 15 questoes mas ha apenas 10 questoes para cada combinacao de categoria e dificuldade.
        // entao foi necessario dividir em primaryQuestions e secondaryQuestions.
        // primaryQuestions corresponde as questoes da dificuldade selecionada.
        // secondaryQuestions corresponde as 5 questoes extra necessarias para chegar as 15 questoes que constituem o quiz.
        switch ($selectedDifficulty) {
            case 'Easy':
                $primaryQuestions = Question::where('category', $selectedCategory)
                                            ->where('difficulty', 'Easy')
                                            ->inRandomOrder()
                                            ->limit(10)
                                            ->get();

                $secondaryQuestions = Question::where('category', $selectedCategory)
                                              ->where('difficulty', 'Medium')
                                              ->inRandomOrder()
                                              ->limit(5)
                                              ->get();
                break;

            case 'Medium':
                $primaryQuestions = Question::where('category', $selectedCategory)
                                            ->where('difficulty', 'Medium')
                                            ->inRandomOrder()
                                            ->limit(9)
                                            ->get();

                $easyQuestions = Question::where('category', $selectedCategory)
                                         ->where('difficulty', 'Easy')
                                         ->inRandomOrder()
                                         ->limit(3)
                                         ->get();

                $hardQuestions = Question::where('category', $selectedCategory)
                                         ->where('difficulty', 'Hard')
                                         ->inRandomOrder()
                                         ->limit(3)
                                         ->get();

                $secondaryQuestions = $easyQuestions->concat($hardQuestions);
                break;

            case 'Hard':
                $primaryQuestions = Question::where('category', $selectedCategory)
                                            ->where('difficulty', 'Hard')
                                            ->inRandomOrder()
                                            ->limit(10)
                                            ->get();

                $secondaryQuestions = Question::where('category', $selectedCategory)
                                              ->where('difficulty', 'Medium')
                                              ->inRandomOrder()
                                              ->limit(5)
                                              ->get();
                break;
        }

        // juntar as duas colecoes de objetos (questoes) numa so
        $questions = $primaryQuestions->concat($secondaryQuestions);

        // guardar a colecao numa session.
        // session vai permitir apresentar as questoes na view review pela mesma ordem que foram apresentadas na view quiz
        session(['questions_for_review' => $questions]);

        // para alem de passar a colecao de questoes para a view quiz, é preciso tambem passar
        // a categoria e dificuldade selecionada para apresentar no <h1>
        return view('quiz', [
            'questions' => $questions,
            'category' => $selectedCategory,
            'difficulty' => $selectedDifficulty
        ]);
    }

    public function submitQuiz(Request $request) {
        
        // aceder ao array answers[] que foi submetido pelo form da view quiz atraves do input radio.
        // é um array associativo question_id => selected_answer
        // em que selected_answer é a string da resposta.
        // descomentar dd($userAnswers); abaixo para ver exemplo
        $userAnswers = $request->input('answers');
        // dd($userAnswers);
    
        // aceder à categoria e dificuldade passadas atraves dos inputs submetidos no form
        $category = $request->input('category'); 
        $difficulty = $request->input('difficulty');
        
        // aceder à sessao criada no metodo startQuiz 
        // que guardou a colecao de questoes que foi apresentada ao utilizador no quiz
        $questions = session('questions_for_review');

        // ==================================================

        // calcular score
        $correctCount = 0;
        foreach ($questions as $question) {
            // define $selectedAnswer com a string obtida a partir do array $userAnswers definido no inicio do metodo.
            // descomentar dd($selectedAnswer); abaixo para ver o que está a ser armazenado na variavel.
            $selectedAnswer = $userAnswers[$question->id] ?? null; // caso utilizador nao tenha respondido à questao, define $selectedAnswer como null
            // dd($selectedAnswer);
            
            // primeira condicao verifica se selectedAnswer nao é null
            // segunda condicao verifica se selectedAnswer corresponde à resposta correta que está na BD
            if ($selectedAnswer && $selectedAnswer == $question->correct_answer) {
                $correctCount++;
            }
        }

        // dd($correctCount, count($questions));
        // dd($correctCount, count($userAnswers), $correctCount / count($userAnswers));
        
        $score = ($correctCount / count($questions)) * 100;
        $score = number_format($score, 0); // 0 casas decimais

        // ==================================================

        // medal logic
        $medal = '🥉';  // bronze medal (default)
        if($score >= 75) {
            $medal = '🥇'; // gold medal
        } 
        elseif($score >= 50) {
            $medal = '🥈'; // silver medal
        }

        // ==================================================

        // dd($userAnswers);
    
        // retornar a view review, passando-lhe as variaveis necessarias para a sua construcao
        return view('review', [
            'questions' => $questions,
            'score' => $score,
            'medal' => $medal,
            'correctCount' => $correctCount,
            'userAnswers' => $userAnswers,
            'category' => $category, 
            'difficulty' => $difficulty
        ]);
    }
    
    // public function home(){
    //     $questions = Question::where('difficulty', 'Easy')->where('category', 'Geography')->get();
    //     echo '<pre>';
    //     print_r($questions);
    // }
}
