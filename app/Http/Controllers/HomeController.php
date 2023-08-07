<?php

namespace App\Http\Controllers;

use App\Models\ConnectionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $sentRequests = ConnectionRequest::where('sender_id', $user->id)->with('receiver:id,name,email')->get();
        $receivedRequests = ConnectionRequest::where('receiver_id', $user->id)->where('accepted', false)->with('sender:id,name,email')->get();

        $suggestions = User::whereNotIn('id', function ($query) use ($user) {
            $query->select('receiver_id')
                ->from('connection_requests')
                ->where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id)
                ->where('accepted', true);
        })
            ->where('id', '!=', $user->id)
            ->select('id', 'name', 'email')
            ->get();

        $connections = $user->connections()->select('users.id', 'users.name', 'users.email')->get();
        return view('home', compact('suggestions','receivedRequests', 'sentRequests','connections'));
    }
}
