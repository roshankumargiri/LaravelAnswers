<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Auth;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:15',
            'question_id' => 'required | integer'
        ]);
        $answer = new Answer;
        $answer->content = $request->content;
        $answer->user_id = Auth::user()->id;
        $answer->question_id = $request->question_id;
        $answer->save();
        return redirect()->route('questions.show', $request->question_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::findOrFail($id);
        $question = $answer->question;
        if ($answer->user->id != Auth::id()) {
            return abort(403);
        } else {
            return view('answers.edit', compact('answer', 'question'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);
        if ($answer->user->id != Auth::id()) {
            return abort(403);
        } else {
            $answer = Answer::findOrFail($id);
            $answer->content = $request->content;
            $answer->save();
            return redirect()->route('questions.show', $request->question_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
