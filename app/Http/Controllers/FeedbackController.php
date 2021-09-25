<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackAddRequest;
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
    public function store(FeedbackAddRequest $request)
    {

        $feedback = Feedbacks::create($request->validated());

        if ($feedback) {
            return redirect()
                ->route('feedback')
                ->with('success', __('messages.feedback.create.success'));
        }
        else
        {
            return redirect()
                ->route('feedback')
                ->with('success', __('messages.feedback.create.fail'));
        }
    }

}
