@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teams</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="float-right">
                    <button id="team"type="submit" class="btn btn-primary py-2 m-3"><a href="{{route('teams')}}" style="text-decoration:none; color:white;">Add new Team</a></button>
                    </div>
                    <table class="table table-stripped">
                        <thead>
                            <th>Name</th>
                            <th>Year Founded</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->year_founded}}</td>
                            <td><a href="{{URL::to('/admin/teams/edit')}}/{{$team->id}}">Edit</a></td>
                                <td><a href="{{URL::to('/admin/teams/delete')}}/{{$team->id}}">Delete</a></td>
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
