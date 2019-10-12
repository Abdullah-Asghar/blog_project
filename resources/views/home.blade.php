@extends('layouts.app')
<style type="text/css">
    
.avatar{
    border-radius: 100%;
    max-width: 100%;
}

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Responce error code start from here -->
            
            @if(count($errors) > 0)
          @foreach($errors->all() as $error)
           <div class="alert alert-danger">{{$error}}</div>
          @endforeach
        @endif

          @if(session('response'))
            <div class="alert alert-success">{{session('response')}}</div>
          @endif

           <!-- Responce error code end here -->
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <div class="col-md-4">

                    @if(!empty($profile))
                      <img src="{{ $profile->profile_pic }}" class="avatar" align="center"></br></br>
                      @else
                      <img src="{{ url('images/avatar.png') }}" class="avatar" align="center">
                      <p class="lead" align="center">Please create your profile!</p>
                      @endif

                      @if(!empty($profile))
                     <h5 align="center"><b> Name: </b>{{ $profile->name }}</h5>
                      @else
                      <p></p>
                      @endif

                      @if(!empty($profile))
                      <h5 align="center"><b> Designation: </b>{{ $profile->designation }}</h5>
                      @else
                      <p></p>
                      @endif
                

                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








