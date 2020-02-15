@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Match</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                    <form action="{{route('storeMatches')}}"method="post">
                       @csrf

                       <div class="form-group row">
                        <label for="team1_id" class="col-md-2 col-form-label">{{ __('Home Team') }}</label>

                        <div class="col-md-2">
                            <select id="team1_id" class="form-control @error('team1_id') is-invalid @enderror" name="team1_id" value="{{ old('team1_id') }}" required autocomplete="team1_id" autofocus>
                                @foreach($teams as $team)
                                <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                            </select>
                            @error('team1_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="team2_id" class="col-md-2 col-form-label">{{ __('Guest Team') }}</label>

                        <div class="col-md-2">
                            <select id="team2_id" class="form-control @error('team2_id') is-invalid @enderror" name="team2_id" value="{{ old('team2_id') }}" required autocomplete="team2_id" autofocus>
                                @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                                @endforeach
                            </select>
                            @error('team2_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label">{{ __('Date') }}</label>

                        <div class="col-md-12">
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
