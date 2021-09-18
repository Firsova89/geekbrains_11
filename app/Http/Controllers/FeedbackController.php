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
        $model = new Feedbacks();
        return view('feedback.index',
            ["feedbacks" => $model->getFeedbacks()]);
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
			'name' => ['required', 'string', 'min:3'],
            'feedback' => ['required', 'string', 'min:3'],
		]);
        $model = new Feedbacks();
        $model->addFeedback($request->input('name'),$request->input('feedback'));

        Session::flash('message', 'Отзыв успешно отправлен');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('feedback');
    }

}
