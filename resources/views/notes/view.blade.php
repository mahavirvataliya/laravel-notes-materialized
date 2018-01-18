@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
            	<div class="collection">
            		<a class="pull-right btn btn-small waves-effect waves-light red " href="{{ url('/') }}"><i class="material-icons">close</i></a>
                <div class="collection-item">View Note</div>
                <view-note :note="{{ $note }}"></view-note>
                <div class="collection-item">
                  @if (!empty($tagnames))
                    {{-- expr --}}
                    @foreach ($tagnames as $tag)
                      <a href="{{ url('tagview', [$tag->id]) }}">
                       <code style="padding:2px" class="blue lighten-3 blue-text text-darken-4" >{{ $tag->tagname }}</code>&nbsp;
                    </a>
                    @endforeach
                  @endif
                </div>
                </div>
                <div class="collection">
                <div class="collection-item">Information of Note Id and Note Creater</div>
                 <div class="collection-item">
                    <p style="white-space: pre-wrap">Note Id is : {{ $note->id }}</p>
                    <p style="white-space: pre-wrap">Created By <b class="blue-text text-darken-4">{{ $username[0] }}</b> with Email ID <u class="blue-text text-darken-4">{{ $username[1] }}</u></p> 
              
              </div>
          </div>
            <div class="collection">
            <div class="collection-item">Note is Shared With</div>
                  <div class="collection-item">
                     @foreach ($snpms as $snpm)
                     <p>
                         {{ $snpm->suser_email }}
                     </p>
                     @endforeach 
                    </div>
            </div>
            </div>
        </div>
        <a href="{{ url('create') }}" style="position: fixed;bottom: 30px;right: 30px;" class="btn-floating tooltipped btn-large waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Create Note"><i class="material-icons">add</i></a>
    </div>
@endsection