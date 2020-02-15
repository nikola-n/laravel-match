@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Player</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{URL::to('/admin/players/update/')}}/{{$players->id}}"method="post">
                       @csrf
                       <div class="form-group">
                        <label for="name" class=" col-md-4 col-form-label">{{ __('Name') }}</label>

                        <div class="col-md-12">
                            <input id="name" type="text" placeholder="Name"class="form-control @error('name') is-invalid @enderror" name="name" value="{{$players->name}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth" class="col-md-4 col-form-label">{{ __('Date of Birth') }}</label>

                        <div class="col-md-12">
                            <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{$players->date_of_birth}}" required autocomplete="date_of_birth" autofocus>

                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="teams_id" class="col-md-4 col-form-label">{{ __('Team') }}</label>

                        <div class="col-md-12">
                            <select class="form-control @error('teams_id') is-invalid @enderror" name="teams_id" required autocomplete="teams_id" autofocus>
                                @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                                @endforeach
                            </select>
                                @error('teams_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-0">
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
