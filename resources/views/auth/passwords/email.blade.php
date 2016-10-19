@extends('layouts.app2')

<!-- Main Content -->
@section('content')
        <div class="col-lg-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Reset Password</div>
                            <div class="panel-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group floating-label-form-group controls{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label" style="color:#2c3e50;">Email Adress</label>

                                        <div class="col-md-14">
                                            <input id="email" type="email" class="form-control" placeholder="Email Adress" name="email" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 text-center">
                                        <br/>
                                            <button type="submit" class="btn btn-primary" style="margin: 0px 0px 0px 60px;">
                                                Send Reset Password Link.
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
@endsection
