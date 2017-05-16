@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($lectures as $lecture)
       <div class="panel panel-default col-xs-6">
        {{$lecture->description}}
        <br>
        @foreach ($lecture->users as $teacher)
        {{$teacher->name}}
        @endforeach
        @if(Auth::user()->isAttending($lecture->id))
            <form action="/schedule/attending" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="lectureId" value="{{$lecture->id}}">
                <button type="submit" class="btn btn-success">Attending</button>
                
            </form>
        @else 
            <p class="alert alert-success">You are attending</p>
        @endif
        @if(!Auth::user()->isAttending($lecture->id))
             <a class="btn btn-danger" data-toggle="modal" data-target="#{{$lecture->id}}">Not attending</a>
        @else 
            <p class="alert alert-danger">You are not attending!</p>
        @endif

           
        <!-- Modal -->
        <div class="modal fade" id="{{$lecture->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{$lecture->id}}</h4>
              </div>
              <div class="modal-body">
                <form class="form-group" action="/schedule/notattending" method="POST">
                {{csrf_field()}}
                <label>Why can't you come?</label>
                    <input type="hidden" name="lectureId" value="{{$lecture->id}}">
                    <input type="text" name="reason" class="form-control">
                    <input type="submit" value="Submit" name="" class="btn btn-danger">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
       </div>
    @endforeach




@endsection
