@extends('layout') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ticket List</div>

                <div class="card-body">
                    @if (count($tickets) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Assigned User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td><a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->title }}</td>
                                        <td>{{ $ticket->description }}</td>
                                        <td>{{ $ticket->status }}</td>
                                        <td>{{ $ticket->user->name }}</td>
                                        <td>
                                            {{-- Add buttons or links for actions like editing or closing tickets --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                         <!-- Pagination Links -->
                         <div class="d-flex justify-content-center">
                            {{ $tickets->links() }}
                        </div>
                    @else
                        <p>No tickets found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
