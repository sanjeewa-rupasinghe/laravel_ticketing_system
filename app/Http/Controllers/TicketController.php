<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateStatusTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets=Ticket::latest()->with('userObj')->get();
        return view('dashboard',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->user_id = Auth()->id();
        $ticket->save();

        if($request->file('file')){
            $path=$request->file('file')->store('attachment','public');
            $ticket->attachment=$path;
            $ticket->save();
        }

        return redirect(route('dashboard'))->with('success','Ticket created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());

        if($request->file('file')){
            $path=$request->file('file')->store('attachment','public');
            $ticket->attachment=$path;
            $ticket->save();
        }
        return redirect(route('dashboard'))->with('success','Ticket is updated');
    }

    /**
     * Update the status
     */
    public function updateStatus(UpdateStatusTicketRequest $request, Ticket $ticket)
    {
        $ticket->status=$request->status;
        $ticket->status_changed_by_id=Auth()->id();
        $ticket->save();

        return redirect(route('dashboard'))->with('success','Ticket status updated');
    }
}
