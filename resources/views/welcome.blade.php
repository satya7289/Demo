<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="_token" content="{{csrf_token()}}" />

        <title>Demo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

       <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel='stylesheet' type='text/css' />

    </head>
    <body>

    <script>
        @if(Session::has('flash_message'))
            @if(Session::get('mail_message')!='')
            alert(" {{Session::get('flash_message')}}")
            @endif
        @endif
    </script>

        <div class="flex-center position-ref full-height">

            <div class="content">
                <div id="error">
                @if(Session::has('flash_message'))
                    {{Session::get('flash_message')}}
                @endif
                </div>
                <form method="POST" action="/" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <div class="form-group row" id='form'>
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Enter Name" aria-describedby="nameHelpText" onkeyup="nameValidate(event)"  required>
                            <small id="nameHelpText" class="form-text text-muted">
                            @error('name') {{ $message }} @enderror
                            </small>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" type="email" id="email" placeholder="Enter Email" aria-describedby="emailHelpText" required onkeyup="emailValidate()">

                            <small id="emailHelpText" class="form-text text-muted">
                                @error('email') {{ $message }} @enderror
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pincode" class="col-sm-2 col-form-label">Pincode</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="pincode" id="pincode" min="100000" max="999999" type="number" placeholder="Enter Pincode" aria-describedby="pincodeHelpText" required onkeyup="pincodeValidate()">
                            <small id="pincodeHelpText" class="form-text text-muted">
                                Pincode must be 6 digit length, from 100000 to 999999.<br>
                                @error('pincode')
                                  {{ $message }}
                                 @enderror
                            </small>

                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>


    {{-- JavaScript --}}
    <script src="{{ asset('js/welcome.js') }}"></script>

    <script>
        jQuery(document).ready(function(){
           
            jQuery('#submit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                if(nameValidate() && emailValidate() && pincodeValidate()){
                    jQuery.ajax({
                        url: "/api/detail",
                        method: 'post',
                        data: {
                            name: jQuery('#name').val(),
                            email: jQuery('#email').val(),
                            pincode: jQuery('#pincode').val()
                        },
                        success: function(result){
                            if(result.message){
                                jQuery('#error').html(result.message);
                            }
                            else{
                                alert("Successfully added.");                             
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- jquery cdn --}}
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    </body>
</html>

