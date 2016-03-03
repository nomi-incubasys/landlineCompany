<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Landline Company</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <style>
            .margin {margin-bottom: 45px;}
            .bg-1 { 
                background-color: #1abc9c; /* Green */
                color: #ffffff;
            }
            .bg-2 { 
                background-color: #474e5d; /* Dark Blue */
                color: #ffffff;
            }
            .bg-3 { 
                background-color: #ffffff; /* White */
                color: #555555;
            }
            .bg-4 {
                bottom:-1px;
                margin-bottom: -1px;
                background-color: #2f2f2f; /* Black Gray */
                color: #fff;
            }
            .container-fluid {
                padding-top: 70px;
                padding-bottom: 70px;
            }
            .navbar {
                padding-top: 15px;
                padding-bottom: 15px;
                border: 0;
                border-radius: 0;
                margin-bottom: 0;
                font-size: 12px;
                letter-spacing: 5px;
            }
            .navbar-nav  li a:hover {
                color: #f03 !important;
            }
            img {
                -webkit-transition: all 0.25s ease-in; // Safari & chrome
                -moz-transition: 0.25s ease-in; // Mozilla Firefox 
                -ms-transition: 0.25s ease-in; // IE 
                -o-transition: 0.25s ease-in; //  Opera 
            }

            img:hover {
                -webkit-transform: scale(2);
                -moz-transform: scale(2);   
                -ms-transform: scale(2);
                -o-transform: scale(2);
            }
            
            #fan{
                -webkit-animation: rotation 2s infinite linear;
                -moz-animation: rotation 2s infinite linear;
            }

            @-webkit-keyframes rotation {
                from {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                
                }
                to   {
                    -webkit-transform: rotate(359deg);
                    -moz-transform: rotate(359deg);
                }
            }
            @-moz-keyframes rotation {
                from {
                    -moz-transform: rotate(0deg);
                
                }
                to   {
                    -moz-transform: rotate(359deg);
                }
            }
        </style>

    </head>

    <body>

        <nav class="navbar navbar-default">
            <div class="container first">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="/">The Landline Company</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right" >
                        @if(Auth::check())
  
                            <li><a href="usercomplaints">Complaints</a></li>
                            <li><a href="#">Customers</a></li>
                            <li><a href="#"></a></li>
                            <li><a class="dropdown-toggle" role="button" data-toggle="dropdown">{{Auth::user()->name}}
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li id="logout"><a href="logout">Logout</a></li>
                                    </ul>
                            </li>
                            <li>
                                
                            @if(Auth::user()->profile_icon)
                                <img src="/uploads/{{Auth::user()->profile_icon}}" style="height:50px; width:50px;">
                            @else
                                <img src="/uploads/no-user.jpg" style="height:50px; width:50px;">
                            @endif
                            
                            </li>
                            
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            </br></br>
            @yield('content')
        </div>
        <!--        <footer class="container-fluid bg-4 text-center">
                    <p>Website Made by Nouman Muzammil</p> 
                 </footer>-->

    </body>
</html>