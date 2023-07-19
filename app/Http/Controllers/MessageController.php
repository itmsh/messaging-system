<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the message.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(User $user, Request $request)
    {
        $authUser = $request->user();

        return view('message.message', [
            'selectedUser' => $user,
            'users'        => User::get(),
            'messages'     => Message::where(function ($q) use ($authUser, $user) {
                $q->where('from_user_id', $authUser->id)
                  ->where('to_user_id', $user->id);
            })->orWhere(function ($q) use ($authUser, $user) {
                $q->where('from_user_id', $user->id)
                  ->where('to_user_id', $authUser->id);
            })->get()
        ]);
    }

    /**
     * Store a newly created message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $user, Request $request)
    {
        $message               = new Message();
        $message->message      = $request->get('message');
        $message->from_user_id = $request->user()->id;
        $message->to_user_id   = $user->id;
        $message->save();

        return redirect()->route('message', $user->id);
    }

    /**
     * Update the specified message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->message = $request->get('message');
        $message->save();
        return redirect()->route('message', $user->id);
    }

    /**
     * Remove the specified message from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user, $id)
    {
        Message::findOrFail($id)->delete();

        return redirect()->route('message', $user->id);
    }
}
