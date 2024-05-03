<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Messages::all();

        return view('admin.Messages.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'msg' => 'string',
    ]);

    try {
        $messages = new Messages();
        $messages->name = $request->input('name');
        $messages->email = $request->input('email');
        $messages->msg = $request->input('msg');
        $messages->save();
        return redirect()->back()->with('success', 'Message sent successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while sending the message. Please try again later.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Messages::findOrFail($id);
        return view('admin.Messages.detail', ['message' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fetch the product by its ID and delete it
        $message = Messages::findOrFail($id);
        $message->delete();

        // Redirect or return response
        return redirect()->route('admin.messages.index',['message' => $message])->with('success', 'Message deleted successfully.');
    }
}
