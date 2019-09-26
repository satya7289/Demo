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
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>




    <script>
        function emailValidate(){
            var patt = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
            var email = document.getElementById('email');
            var value = email.value;
            if(patt.test(value))
            {
                document.getElementById('emailHelpText').innerText=""
                email.style.backgroundColor = "#00e673";
                email.classList.remove('is-invalid');
                email.classList.add('is-valid');

            }
            else{
                email.style.backgroundColor = "#ff6666";
                document.getElementById('emailHelpText').innerText="Enter Valid email";
                email.classList.remove('is-valid');
                email.classList.add('is-invalid');

            }
        }
        function nameValidate(e){
            var name = document.getElementById('name');
            var patt = new RegExp("^[a-zA-Z][a-zA-Z0-9 ]*$");
            var value = name.value;
            if(value.toString().length>0 && value.toString().length<30 && patt.test(value))
            {
                document.getElementById('nameHelpText').innerText=""
                name.style.backgroundColor = "#00e673";
                name.classList.remove('is-invalid');
                name.classList.add('is-valid');
            }
            else{
                name.style.backgroundColor = "#ff6666";
                document.getElementById('nameHelpText').innerText="Enter Name ";
                name.classList.remove('is-valid');
                name.classList.add('is-invalid');
                if(value.toString().length>30)
                 document.getElementById('nameHelpText').innerText="Name should be less than 30 character.";
                 
            }
        }
        function pincodeValidate(){
            var pincode = document.getElementById('pincode');
            var value = pincode.value;
            if(value.length==6 && value>0)
            {
                document.getElementById('pincodeHelpText').innerText=""
                pincode.style.backgroundColor = "#00e673";
                pincode.classList.remove('is-invalid');
                pincode.classList.add('is-valid');
            }
            else{
                pincode.style.backgroundColor = "#ff6666";
                document.getElementById('pincodeHelpText').innerText="Enter Pincode of 6 digit.";
                pincode.classList.remove('is-valid');
                pincode.classList.add('is-invalid');
            }
        }
        
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>



</html>
