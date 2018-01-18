@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
            	<div class="collection"><a class="pull-right btn btn-small waves-effect waves-light red " href="{{ url('/') }}"><i class="material-icons">close</i></a>
       			 <div class="collection-item">Share Note</div>
       			     <div class="collection-item">
                         <div class="row">
			           		<form class="col s12" action="{{ url('shares') }}" method="POST" role="form">
                             <div class="row">
                            {{ csrf_field() }}

                            <div class="input-field col s12 {{ $errors->has('suser_email') ? ' has-error' : '' }}">
                              <input id="suser_email" list="users" name="suser_email" value="{{ old('suser_email') }}" required type="email" class="validate">
                              <label for="suser_email" data-error="wrong" data-success="right">E-Mail Address to Share</label>

                              @if ($errors->has('suser_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suser_email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <input type="hidden" name="note_id" value="{{ $note->id }}">
                          
                            <datalist id="users">
                            	@foreach($users as $user)
                            	<option value="{{ $user->email }}"></option>
                            	@endforeach
                            </datalist>
                        
                        <br>
                        <div class="col s12">
                            <p>Access to Note For User Leave For Read-Only</p>
                            <p>
                              <input class="with-gap" {{ $per[0] }} type="radio" id="Owner" name="noteaccess" value="owner"  />
                              <label for="Owner">Owner</label>
                            </p>
                            <p>
                              <input class="with-gap" {{ $per[1] }} type="radio" id="edo" name="noteaccess" value="edit_only"  />
                              <label for="edo">Edit And Delete Only</label>
                            </p>
                            <p>
                              <input class="with-gap" {{ $per[2] }} type="radio" id="sro" name="noteaccess" value="share_only"  />
                              <label for="sro">Share Only</label>
                            </p>
                            
						</div>
                            <button class="btn red pull-right" {{ $per[2] }}><i class="material-icons right">share</i>Share</button>&nbsp;
                            
                        </div>
                        </form>
                    </div>
			        </div>
                    
			    </div>
            </div>
        </div>
        <a href="{{ url('create') }}" style="position: fixed;bottom: 30px;right: 30px;" class="btn-floating tooltipped btn-large waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Create Note"><i class="material-icons">add</i></a>
    </div>
@endsection