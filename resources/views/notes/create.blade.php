@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
                <ul class="collection">
                    <a class="pull-right btn btn-small waves-effect waves-light red " href="{{ url('/') }}"><i class="material-icons">close</i></a>
                    <div class="collection-item">Create new note</div>
                    <div class="collection-item">
                        <div class="row">
                        <form action="{{ url('create') }}" class="col s12" method="POST" role="form">
                            <div class="row ">
                            {{ csrf_field() }}

                            <div class="input-field col s12 {{ $errors->has('title') ? ' has-error' : '' }}">
                              <input placeholder="Give your note a Title" name="title" id="title" type="text" required autofocus value="{{ old('title') }}">
                              <label for="title">Give your note a Title</label>
                              @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="input-field col s12 {{ $errors->has('body') ? ' has-error' : '' }}">
                                  <textarea id="textarea1" name="body" class="materialize-textarea" required>{{ old('body') }}</textarea>
                                  <label for="textarea1">...and here goes your Note Body</label>
                                   @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                                </div>
                             


                            <div class="col s12">
                            @if (!$tags->isEmpty())
                                {{-- expr --}}
                                @foreach ($tags as $tag)
                                    {{-- expr --}}
                                       <p style="display: inline;margin-top: 5px"> 
                                        <input type="checkbox" id="{{ $tag->tagname }}" class="filled-in" name="check_list[]"  value="{{ $tag->tagname }}" />
                                         <label for="{{ $tag->tagname }}"><span style="padding: 5px" class="blue language-markup lighten-4 blue-text text-darken-4">{{ $tag->tagname }}</span></label>
                                         &nbsp;&nbsp;
                                         </p>
                                @endforeach

                            @endif
                        </div>
                            <button class="btn btn-primary pull-right">Save</button>
                             </div>
                        </form>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
@endsection