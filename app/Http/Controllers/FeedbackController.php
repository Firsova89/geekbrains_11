<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedbacks::get();
        $model = new Feedbacks();
        return view('feedback.index',
            ["feedbacks" => $feedbacks] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'username' => ['required', 'string', 'min:3'],
            'userfeedback' => ['required', 'string', 'min:3'],
		]);
        $model = new Feedbacks();
        $model->addFeedback($request->input('username'),$request->input('userfeedback'));

        $feedback = Feedbacks::create(
            $request->only(['username', 'userfeedback'])
        );

        if ($feedback) {
            Session::flash('message', 'Отзыв успешно отправлен');
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            Session::flash('message', 'Ошибка');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('feedback');
    }

}
