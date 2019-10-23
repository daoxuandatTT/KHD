@extends('master')
@push('css')
    <style type="text/css">
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
        #form3{

            display: none;
        }

        #formButton {
            display: block;
            margin-right: auto;
            margin-left: auto;
        }
    </style>

@endpush
@section('content')
    <div class="container emp-profile">


            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{Auth::user()->image}}" id="image" alt="" style="height: 247px;width: 247px"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" id="formButton">Edit Profile</button>

                </div>
                    <form id="form3" method="POST" action="{{route('user.update',Auth::user()->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" class="form-control" name="image" />
                        </div>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control"  name="name" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="Job">Job</label>
                            <input type="text" class="form-control" name="job" value="{{Auth::user()->job}}">
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{Auth::user()->name}}
                        </h5>
                        <h6>
                            {{Auth::user()->job}}
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Laravel.com</a><br/>
                        <p>SKILLS</p>
                        <a href="">{{Auth::user()->job}}</a><br/>
                        <a href="">WordPress</a><br/>
                        <a href="">WooCommerce</a><br/>
                        <a href="">PHP, .Net</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{Auth::user()->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>PhoneNumber</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{Auth::user()->phone}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{Auth::user()->job}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>10$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>230</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br/>
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

{{--    <form id="form1">--}}
{{--        <b>First Name:</b> <input type="text" name="firstName">--}}
{{--        <br><br>--}}
{{--        <b>Last Name: </b><input type="text" name="lastName">--}}
{{--        <br><br>--}}
{{--        <b> Age:</b>--}}
{{--        <br>--}}
{{--        <input type="radio" name="age" value="adolescent"> 0 - 19 years--}}
{{--        <br>--}}
{{--        <input type="radio" name="age" value="mid"> 20 - 59 years--}}
{{--        <br>--}}
{{--        <input type="radio" name="age" value="senior"> 60 + years--}}
{{--        <br> <br>--}}
{{--        <b>Preferred Color:</b>--}}
{{--        <select name="color">--}}
{{--            <option value="blue">Blue</option>--}}
{{--            <option value="green">Green</option>--}}
{{--            <option value="yellow">Yellow</option>--}}
{{--            <option value="red">Red</option>--}}
{{--            <option value="pink">Pink</option>--}}
{{--        </select>--}}
{{--        <br><br>--}}
{{--        <b>Comment:</b>--}}
{{--        <br>--}}
{{--        <textarea name="comment">--}}
{{--    Enter your comment here--}}
{{--  </textarea>--}}
{{--        <br><br>--}}
{{--        <button type="button" id="submit">Submit</button>--}}
{{--    </form>--}}
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#formButton").click(function() {
                $("#form3").toggle();
            });
        });
    </script>
    @endpush
