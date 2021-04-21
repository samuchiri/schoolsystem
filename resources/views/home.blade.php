@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     {{ __('You are logged in as') }}
                            {{Auth::user()->name}}
                            <!-- {{Auth::user()->name}} DISPLAYS THE NAME OF THE USER LOGGING IN.
                            {{Auth::user()->email}} DISPLAYS THE EMAIL OF THE USER LOGGING IN -->
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
