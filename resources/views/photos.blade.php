    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Notula</title>

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">




            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

            <style>
                .container{
                display: flex;
                justify-content: center;
                align-items: center;

            }
            a{ color: rgb(28, 170, 28);
        text-decoration: none;
        font-size: 8px;


        background-color: transparent;
        -webkit-text-decoration-skip: objects;

                }

                li.borderless  { border-top: 0 none; }
                ul.borderless { border-top: 0 none; }
            </style>
        </head>
        <body>

            <div class="container margin-auto" >
                @foreach($photos as $p)

                <ul class="list-group borderless">
                    <li class="list-group-item borderless"> <h5 class="margin-auto w-100">Thank you for download</h5></li>

                    <li class="list-group-item borderless text-center"><a href="https://app.jeevva.my.id/storage/photos/{{  $p->photo }}" class="margin-auto  w-100 text-center"   id="downloadlink" download="{{  $p->photo }}">Click if it doesn't download automatically</a>
                    </li>

                  </ul>


                    </div>
                    @endforeach


        </body>
        @foreach($photos as $p)
        {{-- <meta http-equiv="refresh" download="2;url=/photos/{{  $p->photo }}" /> --}}
        <script>
            const element = document.querySelector('a');
    element.click();
        </script>

        @endforeach
    </html>
