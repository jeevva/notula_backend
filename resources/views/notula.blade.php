{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Notula</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
          body {

                background-color: #fff;
                color: #636b6f;
                /* font-family: 'Nunito', sans-serif; */
                font-weight: 200;

                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="">
            <div class="">
                <div class="card-header">
                    <h1>Notula</h1>
                    <p>Karang Taruna 06 RT 06 RW 01 Kelurahan Cibubur</p>
                </div>

                <div class="card-body">


                </div>
            </div>
        </div>
        <h3>Notula</h3>



	<table border="1">


        @foreach($notula as $p)
        <tr>
            <td>Title</td>
        <td>{{  $p->title }}</td>
        <td>Title</td>
        <td>{{  $p->title }}</td>


        </tr>
        @endforeach


	</table>
    </body>
</html> --}}
{{--
@extends('layouts.app')

@section('content') --}}
{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Notula') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}
{{-- <div class="container">
    <div class="row justify-content-center"> --}}
        {{-- <div class="">
            <div class="">
                <div class="card-header">
                    <h1>Notula</h1>
                    <p>Karang Taruna 06 RT 06 RW 01 Kelurahan Cibubur</p>
                </div>

                <div class="card-body">


                </div>
            </div>
        </div> --}}
    {{-- </div>
</div> --}}
{{-- @endsection --}}


<!DOCTYPE html>
<head>
    <title>Notula</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }

       .table td,.table th {
  border: 1px solid #000;
  padding: 8px;

}

.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #acb1af;
  color: black;
}
hr
{
    background-color: #000000;
    border: 0 none;
    color: #000000;
    padding-top: -4px;
    height: 1.5px;
}

    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>Notula</h3>
        @foreach($user as $p)

        <h4 id=judul>{{  $p->name_organization }}</h4>
        <p id=judul>{{  $p->address_organization }}</p>
        @endforeach
        <hr />
        <hr id="bawah"/>
        {{-- @foreach($notula as $p)
        <tr>
            <td>Title</td>
        <td>{{  $p->title }}</td>
        <td>Title</td>
        <td>{{  $p->title }}</td>


        </tr>
        @endforeach --}}


        @foreach($notula as $p)
        <table>
            <tr>
                <td style="width: 30%;">Title</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{  $p->title }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Meeting Title</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{  $p->meetings_title }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Date</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{  $p->date }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Start time</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{  $p->start_time }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">End Time</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{  $p->end_time }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Location</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{  $p->location }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Agenda</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{  $p->agenda }}</td>
            </tr>

        </table>
        <h4>Summary</h4>
        <p>{{  $p->summary }}</p>

        @endforeach

        <h4>Point</h4>

        <table class="table">
            <thead>
              <tr>
                <th style="vertical-align: top; text-align:left;" class="header">No</th>
                <th class="header">Point</th>
              </tr>
            </thead>
            <tbody>
                @foreach($point as $no => $point)

                <tr>
                    <td style="vertical-align: top;">{{ ++$no }}</td>
                    <td>{{  $point->points }}</td>
                </tr>

        @endforeach


            </tbody>
          </table>



            <h4>Follow Up</h4>

          <table class="table">
              <thead>
                <tr>
                  <th style="vertical-align: top; text-align:left;" class="header">No</th>
                  <th class="header">Follow Up</th>
                  <th>PIC</th>
                </tr>
              </thead>
              <tbody>
               @foreach($followup as $no => $followup)
                <tr>
                    <td style="vertical-align: top;">{{ ++$no }}</td>
                    <td>{{  $followup->title }}</td>
                    <td>{{  $followup->pic }}</td>
                  </tr>
               @endforeach


              </tbody>
            </table>

            <h4>Attendances</h4>

            <table class="table">
                <thead>
                  <tr>
                    <th style="vertical-align: top; text-align:left;" class="header">No</th>
                    <th class="header">Name</th>
                    <th>Position</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($attendances as $no => $attendance)
                  <tr>
                      <td style="vertical-align: top;">{{ ++$no }}</td>
                      <td>{{  $attendance->name }}</td>
                      <td>{{  $attendance->position }}</td>
                    </tr>
                 @endforeach


                </tbody>
              </table>


    </div>
</body>

</html>
