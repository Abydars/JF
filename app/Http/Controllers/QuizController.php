<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizReference;
use Illuminate\Http\Request;

class QuizController extends PanelController
{
	public function references()
	{
		$quizzes = Quiz::orderBy( 'start_dt' )->get();
		$quizzes[0]->setMetaData('abc', 'test');
		$quizzes[0]->save();

		return view( 'quiz.references', [
			'quizzes' => $quizzes
		] );
	}
}
