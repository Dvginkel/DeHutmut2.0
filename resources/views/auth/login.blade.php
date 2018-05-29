@extends('layouts.master') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Login met je Facebook Account</h4>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <br />
                        <div class="form-group">
                            <div class="col-md-12">
                                <a href="{{url('/redirect')}}" class="btn btn-primary btn-block">Login with Facebook</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection