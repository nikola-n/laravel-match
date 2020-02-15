@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Players</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="float-right">
                    <button id="team"type="submit" class="btn btn-primary py-2 m-3"><a href="{{route('players')}}" style="text-decoration:none; color:white;">Add new Player</a></button>
                    </div>
                    <table class="table table-stripped">
                        <thead>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Team</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($players as $player)
                            <tr>
                                <td>{{$player->name}}</td>
                                <td>{{$player->date_of_birth}}</td>
                                <td>{{$player->teams->name}}</td>
                            <td><a href="{{URL::to('/admin/players/edit')}}/{{$player->id}}">Edit</a></td>
                                <td><a href="{{URL::to('/admin/players/delete')}}/{{$player->id}}">Delete</a></td>
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
