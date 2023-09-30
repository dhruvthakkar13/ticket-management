@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Ticket Details</div>

        <div class="card-body">
            <h5 class="card-title">{{ $ticket->title }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $ticket->description }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $ticket->status }}</p>
            <p class="card-text"><strong>Assigned User:</strong> {{ $ticket->user->name }}</p>
            @if ($ticket->status === 'Pending')
                <form method="POST" action="{{ route('tickets.close', $ticket) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Close Ticket</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
