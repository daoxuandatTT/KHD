@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Hi there,@if(Auth::guard('admin')->check())
                            Hello {{Auth::guard('admin')->user()->name}}
                        @elseif(Auth::guard('user')->check())
                            Hello {{Auth::guard('user')->user()->name}}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
