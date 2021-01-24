@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index +1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email  }}</td>
                                    <td>
                                        @if($user->userOnline())
                                            ** Online
                                        @else
                                            ** OFF Line
                                            @endif
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
