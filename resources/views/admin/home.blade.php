@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $user->name }}, You are logged in!
                    <a href="{{ route('admin.bathrooms.index')}}" class="btn btn-link">Bathrooms</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
