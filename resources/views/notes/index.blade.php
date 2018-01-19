@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col s10 offset-s1">
                <ul class="collection">
                    <li class="collection-item">All Tags </li>
                    <li class="collection-item">
                        @if (!empty($tags))
                    @foreach ($tags as $tag)
                     <a href="{{ url('tagview', [$tag->id]) }}">
                      <b> 
                       <code style="padding:2px" class="blue lighten-3 blue-text text-darken-4" > {{ $tag->tagname }}</code>
                     </b>
                    </a> &nbsp;
                    @endforeach
                    @endif
                    </li>
                </ul>
                <ul class="collection">
                    <li class="collection-item">My Notes <a class="btn-sm pull-right btn-primary" href="{{ url('create') }}">
                            <i class="material-icons right">add</i>Create Note</a>
                    </li>
                    <li class="collection-item">
                        <?php 
                        session_start(); 
                        if(isset($_SESSION["status_delete"]) && $_SESSION["status_delete"]!=""){ 
                            ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong> <?php
                            echo $_SESSION["status_delete"]; ?></strong> 
                          </div>
                         <?php
                            $_SESSION["status_delete"]="";
                        }
                        ?>

                        @if($notes->isEmpty())
                            <p>
                                You have not created any notes! <a href="{{ url('create') }}">Create one</a> now.
                            </p>
                        @else
                        <ul class="collection">
                    
                            @foreach($notes as $note)
                                <li class="collection-item">
                                    <div class="row">
                                    <div class="col s12 m12">
                                      <div class="card blue darken-1">
                                        <div class="card-content white-text">
                                          <span class="card-title activator">{{ $note->title }} <i class="material-icons right">more_vert</i></span>
                                          <p>{{ $note->updated_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">{{ $note->title }} <i class="material-icons right">close</i></span>
                                        <p> 

                                        <span class="col s3 "> 
                                        <a href="{{ url('edit', [$note->slug]) }}">
                                        <i class="material-icons right" >edit</i>
                                        </a></span>
                                    <span class="col s3 ">
                                       <a  href="{{ url('delete', [$note->slug]) }}">
                                        <i class="material-icons red-text right" aria-hidden="true">delete</i>
                                        </a>
                                    </span>
                                    <span class="col s3 ">
                                         <a  href="{{ url('view', [$note->slug]) }}">
                                         <i class="material-icons right" aria-hidden="true">visibility</i>
                                       </a>
                                    </span>
                                    <span class="col s3 ">
                                        <a href="{{ url('share', [$note->slug]) }}">
                                             <i class="material-icons right">share</i>
                                                </a> 
                                        </span>
                                    </p>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                </ul>
                <ul class="collection">
                    <li class="collection-item">Shared Notes With Me</li>
                    <li class="collection-item">
                    @if(!$snpms->isEmpty()) 
                        {{-- expr --}}
                        <ul class="collection">
                            @foreach ($snpms as $snpm)
                             @foreach ($snotes as $ssnote)
                                    {{-- expr --}}
                                @if ($ssnote->id===$snpm->note_id)
                                <li class="collection-item">
                                  <div class="row">
                                    <div class="col s12 m12">
                                      <div class="card blue darken-1">
                                        <div class="card-content white-text">
                                          <span class="card-title activator">{{ $ssnote->title }} <i class="material-icons right">more_vert</i></span>
                                          <p>{{ $ssnote->updated_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">{{ $ssnote->title }} <i class="material-icons right">close</i></span>
                                        <p> 

                                        <span class="col s3 "> 
                                        <a  href="
                                        @if ($snpm->owner || $snpm->edit_only)
                                            {{ url('edit', [$ssnote->slug]) }}
                                        @else
                                            {{ '#' }}
                                        @endif">
                                        <i class="material-icons" >edit</i>
                                        &nbsp;</a></span>
                                    <span class="col s3 ">
                                         <a href="
                                       @if ($snpm->owner || $snpm->edit_only)
                                       {{ url('delete', [$ssnote->slug]) }}
                                       @else
                                            {{ '#' }}
                                        @endif">
                                        <i class="material-icons red-text" aria-hidden="true">delete</i>
                                       &nbsp; 
                                        </a>
                                       &nbsp; </a>
                                    </span>
                                    <span class="col s3 ">
                                         <a href="{{ url('view', [$ssnote->slug]) }}">
                                         <i class="material-icons" aria-hidden="true">visibility</i>
                                       &nbsp;
                                        </a>
                                    </span>
                                    <span class="col s3 ">
                                        <a  href="
                                        @if ($snpm->owner || $snpm->share_only)
                                        {{url('share', [$ssnote->slug]) }}
                                        @else
                                            {{ '#' }}
                                        @endif">
                                             <i class="material-icons" a>share</i>
                                            &nbsp;</a>
                                            </a> 
                                        </span>
                                    </p>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                    
                                </li>
                                @endif
                             @endforeach   
                            @endforeach
                        </ul>
                     @endif 
                    </li>
                </ul>
            </div>
        </div>
        <a href="{{ url('create') }}" style="position: fixed;bottom: 30px;right: 30px;" class="btn-floating tooltipped btn-large waves-effect waves-light red" data-position="top" data-delay="50" data-tooltip="Create Note"><i class="material-icons">add</i></a>  
      
    </div>
@endsection