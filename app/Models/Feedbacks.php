<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{

	protected $table = "feedbacks";
    protected $guarded = [
        'id'
    ];

	public function getFeedbacks()
	{
		return \DB::table($this->table)
            ->select(["username","userfeedback","created_at"])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
	}

	public function addFeedback(string $username, string $feedback)
	{
        \DB::table($this->table)->insert([
            'username' => $username,
            'userfeedback' => $feedback,
            'created_at' => now(),
            'updated_at' => now()
        ]);
	}
}
