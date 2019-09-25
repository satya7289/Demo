<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Demo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
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
    <script>
        @if(Session::has('flash_message'))
            @if(Session::get('flash_message')=="Detail Added Successfully")
            alert(" {{Session::get('flash_message')}}")
            @endif
        @endif
    </script>

        <div class="flex-center position-ref full-height">

            <div class="content">
                <div >
                @if(Session::has('flash_message'))
                    {{Session::get('flash_message')}}
                @endif
                </div>
                <form method="POST" action="/" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Enter Name" aria-describedby="nameHelpText" required>
                            @error('name')
                            <small id="nameHelpText" class="form-text text-muted">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" id="email" placeholder="Enter Email" aria-describedby="emailHelpText">
                            @error('email')
                            <small id="emailHelpText" class="form-text text-muted">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pincode" class="col-sm-2 col-form-label">Pincode</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="pincode" id="pincode" min="100000" max="999999" type="number" placeholder="Enter Pincode" aria-describedby="pincodeHelpText" required >
                            <small id="pincodeHelpText" class="form-text text-muted">
                                Pincode must be 6 digit length, from 100000 to 999999.
                            </small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </body>



</html>
