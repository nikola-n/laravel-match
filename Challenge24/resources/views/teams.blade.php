@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new team</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('storeTeam')}}" method="post">
                       @csrf
                       <div class="form-group">
                        <label for="name" class=" col-md-4 col-form-label">{{ __('Name') }}</label>

                        <div class="col-md-12">
                            <input id="name" type="text" placeholder="Name"class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="year_founded" class="col-md-4 col-form-label">{{ __('Year Founded') }}</label>

                        <div class="col-md-12">
                            <input id="year_founded" placeholder="Year Founded"type="text" class="form-control @error('year_founded') is-invalid @enderror" name="year_founded" value="{{ old('year_founded') }}" required autocomplete="year_founded" autofocus>

                            @error('year_founded')
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
