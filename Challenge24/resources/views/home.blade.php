@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Matches</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-stripped">
                        <thead>
                            <th>Team 1</th>
                            <th>Team 2</th>
                            <th>Result</th>
                        </thead>
                        <tbody>
                            @foreach($matches as $match)
                            <tr>
                                <td>{{$match->team1['name']}}</td>
                                <td>{{$match->team2["name"]}}</td>
                                <td>{{$match->result}}</td>
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
