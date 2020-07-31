<?php

namespace App\Http\Controllers;

use DB;
use App\Post;
use App\User;

class TipsTrickController extends Controller
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    // load single model instead load all model.
    public function toBase()
    {
        $users = User::toBase()
            ->select('first_name', 'last_name')
            ->where('country', 'nepal')
            ->get();

        dump($users);
    }

    public function whereColumn()
    {
        $users = User::whereColumn('first_name', 'last_name')
            ->get();

        dump($users);
    }

    public function whereGrouping()
    {
        $users = User::where('gender', 'Male')
            ->orWhere(function ($query) {
                $query->where('first_name', 'Wava');
                $query->where('last_name', 'Jacobs');
            })
            ->limit(10)
            ->get();

        dump($users);
    }

    public function whereX()
    {
        $users = User::whereGender('Male')
            ->limit(10)
            ->get();

        dump($users);
    }

    public function whereSubQuery()
    {
        $users = User::where(function ($query) {
            $query->select('type')
                    ->from('membership')
                    ->whereColumn('user_id', 'users.id')
                    ->orderByDesc('start_date')
                    ->limit(1);
        }, 'Pro')->toSql();

        dump($users);
    }

    public function queryScope()
    {
        $users = User::genderWithYear()
            ->limit(10)
            ->get();
        /*$users = User::where('gender', 'Male')
    		->whereYear('dob', '1995')
    		->limit(10)
    		->get();*/

        dump($users);
    }

    // Calculating totals in Laravel using conditional aggregates
    public function conditionalAggregates()
    {
        $users = User::selectRaw("count(case when country = 'nepal' then 1 end) as nepalese")
            ->selectRaw("count(case when country = 'china' then 1 end) as chinese")
            ->selectRaw("count(case when country = 'india' then 1 end) as indian")
            ->selectRaw("count(case when country = 'australia' then 1 end) as aussies")
            ->first();

        dump($users);
    }

    public function obj()
    {
        $posts = $this->post->first();

        //dd($posts);

        $posts->dump();
    }
}
