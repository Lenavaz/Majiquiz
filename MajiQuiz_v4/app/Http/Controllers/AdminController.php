<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionStoreRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // aceder à categoria e dificuldade selecionadas pelo utilizador no dropdown de filtragem
        $category = $request->input('category');
        $difficulty = $request->input('difficulty');
        
        // iniciar a query à tabela questions
        $query = Question::query();
        
        // se a categoria e a dificuldade selecionadas nao forem o default (all categories),
        // adicionar clausula where à query com as opcoes que o utilizador selecionou
        if ($category && $category != 'All') {
            $query->where('category', $category);
        }
        
        if ($difficulty && $difficulty != 'All') {
            $query->where('difficulty', $difficulty);
        }

        $questions = $query->orderBy('category', 'asc')
                            ->orderBy('difficulty', 'asc')
                            ->orderBy('id', 'asc')
                            ->get();
        
        return view('admin.index', [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view com form para criar nova questao
        return view('admin.create_question');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionStoreRequest $request)
    {
        // criar questao na BD a partir dos campos preenchidos no form
        $data = $request->only(['category', 'difficulty', 'question', 'correct_answer', 'incorrect_answer1', 'incorrect_answer2', 'incorrect_answer3']);
        Question::create($data);

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::find($id);
        
        return view('admin.show_question',
            ['question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);
        
        // view com form para editar a questao
        return view('admin.edit_question',
            ['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request, string $id)
    {
        // editar questao na BD a partir dos campos preenchidos no form
        $data = $request->only(['category', 'difficulty', 'question', 'correct_answer', 'incorrect_answer1', 'incorrect_answer2', 'incorrect_answer3']);
        $question = Question::find($id);
        $question->update($data);

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);
        $question->delete();
        
        return redirect()->route('admin.index');
    }
}
