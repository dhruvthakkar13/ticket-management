@extends('layout') 

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a New Ticket</div>

                <div class="card-body">
                    <form id="ticketform" method="POST" action="{{ route('tickets.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Pending">Pending</option>
                                <option value="Closed">Closed</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="assigned_user">Assigned User</label>
                            <select name="assigned_user" id="assigned_user" class="form-control" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                            <a href="{{ route('tickets.index') }}" class="btn btn-primary">View Tickets</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    
    
    <script src="{{ asset('js/ticket.js') }}"></script>

@endsection
