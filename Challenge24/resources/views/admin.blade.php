@extends('layouts.app')

@section('content')
<script
src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
crossorigin="anonymous"></script>

<script>
  $('#match').on('click',function(e){
      e.preventDefault();
    location.href ='//127.0.0.1:8000/admin/matches';
  });
  </script>
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
                    <div class="float-right">
                    <button id="match"type="submit" class="btn btn-primary py-2 m-3"><a href="{{route('matches')}}" style="text-decoration:none; color:white;">Add new Match</a></button>
                    </div>
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
