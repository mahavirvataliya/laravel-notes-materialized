@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
            	 <div class="collection"><a class="pull-right btn btn-small waves-effect waves-light red " href="{{ url('/') }}"><i class="material-icons">close</i></a>
       			 <div class="collection-item title">Edit note</div>
            	<div class="row">
                <edit-note :note="{{ $note }}"></edit-note>
               </div>
            </div>
            </div>
        </div>
        </div>
        <a href="{{ url('create') }}" style="position: fixed;bottom: 30px;right: 30px;" class="btn-floating tooltipped btn-large waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Create Note"><i class="material-icons">add</i></a>
    </div>
@endsection