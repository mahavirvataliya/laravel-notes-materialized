@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="collection">
                    <div class="collection-item">About Developer
                    </div>
                    <div class="collection-item center-align">
                        <h4>Created By Mahavir Vataliya</h4>

                        <div class="card" >
                          <img width="40%" class="card-img-top " src="{{ URL::asset('/mahavirprofile.png') }}" alt="Card image">
                          <div class="card-body">
                            <h4 class="card-title">Mahavir Vataliya</h4>
                           <p class="card-text"><h5>Email <i class="fa fa-envelope"></i></h5>
                    <a href="mailto:mahavir.vataliya110@gmail.com?body=From Share Note Application Feedback" type="button" class="email"> mahavir.vataliya110@gmail.com </a>
                    <h5>Mobile Number <i class="fa fa-phone"></i></h5>
                       <h5> +91 8140257443 </h5>
                       <h6><a href="http://notesbymrv.herokuapp.com">Old Site</a></h6>
                    </p>
                          </div>
                        </div>


                    </div>
                </div>
                <div class="collection">
                    <div class="collection-item">Social Deteails</div>
                    <div class="collection-item center-align">
                   <!--Facebook-->
                    <a href="https://www.facebook.com/mahavir.vataliya" target="_blank" class="btn blue btn-large">
                        <i class="fa fa-2x fa-facebook"></i></a>
                        &nbsp;
                    <!--Twitter-->
                    <a href="https://twitter.com/mahavirvataliya" target="_blank" class="btn btn-large blue"><i class="fa fa-2x fa-twitter"></i></a>
                    <!--Google +-->&nbsp;
                    <a type="button" href="http://google.com/+MahavirVataliya" target="_blank" class="red btn btn-large"><i class="fa fa-2x fa-google-plus"></i></a>
                    <!--Linkedin-->&nbsp;
                    <a type="button" href="https://www.linkedin.com/in/mahavir-vataliya-1ab134141" target="_blank" class="btn blue btn-large"><i class="fa fa-2x fa-linkedin"></i></a>
                   
                    <!--Youtube-->&nbsp;
                    <a type="button" href="https://www.youtube.com/channel/UCqmYeVDas69YjXuVsuNB8Rw" target="_blank" class="btn red btn-large"><i class="fa fa-2x fa-youtube"></i></a>
          
                   
                    <!--Github-->&nbsp;
                    <a type="button" href="https://github.com/mahavirvataliya" href="_blank" class="btn btn-large black "><i class="fa fa-2x fa-github"></i></a>

                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection