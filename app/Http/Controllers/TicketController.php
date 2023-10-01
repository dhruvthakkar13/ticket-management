<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket\Ticket;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(10); 
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id','name')->get();
        // $this->authorize('create', Ticket::class);
        // dd($users);
        return view('ticket.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket;
        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
        $ticket->status = $request->input('status');
        $ticket->user_id = $request->input('assigned_user'); // Assuming 'user_id' is the foreign key for assigned_user

        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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


    public function close(Ticket $ticket)
    {
        $this->authorize('close', $ticket);

        // Update the ticket's status to "Closed"
        if ($ticket->status === 'Pending') {
            $ticket->status = 'Closed';
            $ticket->save();
        }

        return redirect()->route('tickets.show', $ticket)->with('success', 'Ticket closed successfully.');
    }
}
