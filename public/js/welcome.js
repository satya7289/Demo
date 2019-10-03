function emailValidate(){
    // var patt = new RegExp(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@([a-zA-Z0-9-])+(?:\.[a-zA-Z0-9-]+)*$/);
    var patt = new RegExp(/^[a-zA-Z0-9.!'*+_`{|}~-]+@([a-zA-Z])+\.[c][o][m]+$/);
    var email = document.getElementById('email');
    var message = document.getElementById('emailHelpText');
    var value = email.value;
    if(patt.test(value))
    {
        //message.innerText=""
        //email.style.backgroundColor = "#00e673";
        //email.classList.remove('is-invalid');
        //email.classList.add('is-valid');
        var xhr = new XMLHttpRequest;
        xhr.open('GET',window.location.href+'api/search?email='+email.value,true);
        xhr.onload = function(){
            if(this.status==200){
                var response = JSON.parse(this.responseText);
                if(response.status!=0){
                    message.innerText=response.message;
                    console.log(response.message);
                    email.style.backgroundColor = "#ff6666";
                    email.classList.remove('is-valid');
                    email.classList.add('is-invalid');
                }
                else{
                    message.innerText=""
                    email.style.backgroundColor = "#00e673";
                    email.classList.remove('is-invalid');
                    email.classList.add('is-valid');
                    }
            }
        }
        xhr.send();

    }
    else{
        email.style.backgroundColor = "#ff6666";
        message.innerText="Enter Valid email ";
        email.classList.remove('is-valid');
        email.classList.add('is-invalid');
    }
    var valid = email.classList.contains('is-valid');   
    if(valid){
        return 1;
    }
    else{
        return 0;
    }
    
    /*
    var valid = email.classList.contains('is-valid');   
    if(valid)
    {
        var xhr = new XMLHttpRequest;
        xhr.open('GET',window.location.href+'api/search?email='+email.value,true);
        //console.log(xhr);
        xhr.onload = function(){
            if(this.status==200){
                var response = JSON.parse(this.responseText);
                if(response.status!=0){
                    message.innerText=response.message;
                    console.log(response.message);
                    email.classList.remove('is-valid');
                    email.classList.add('is-invalid');
                    email.style.backgroundColor = "#ff6666";
                }
            }
        }
        xhr.send();
    }
    */
}
function nameValidate(e){
    var name = document.getElementById('name');
    var patt = new RegExp("^[a-zA-Z][a-zA-Z0-9 ]*$");
    var value = name.value;
    var message = document.getElementById('nameHelpText');
    if(value.toString().length>0 && value.toString().length<30 && patt.test(value))
    {
        //message.innerText=""
        //name.style.backgroundColor = "#00e673";
        //name.classList.remove('is-invalid');
        //name.classList.add('is-valid');
        var xhr = new XMLHttpRequest;
        xhr.open('GET',window.location.href+'api/search?name='+name.value,true);
        xhr.onload = function(){
            if(this.status==200){
                var response = JSON.parse(this.responseText);
                if(response.status!=0){
                    message.innerText=response.message;
                    console.log(response.message);
                    name.classList.remove('is-valid');
                    name.classList.add('is-invalid');
                    name.style.backgroundColor = "#ff6666";
                }
                else{
                    message.innerText=""
                    name.style.backgroundColor = "#00e673";
                    name.classList.remove('is-invalid');
                    name.classList.add('is-valid');
                }
            }
        }
        xhr.send();
    }
    else{
        name.style.backgroundColor = "#ff6666";
        message.innerText="Enter Name ";
        name.classList.remove('is-valid');
        name.classList.add('is-invalid');
        if(value.toString().length>30)
         document.getElementById('nameHelpText').innerText="Name should be less than 30 character.";

    }
    var valid = name.classList.contains('is-valid');
    if(valid){
        return 1;
    }
    else{
        return 0;
    }
    /*
    var valid = name.classList.contains('is-valid');
    if(valid)
    {
        var xhr = new XMLHttpRequest;
        xhr.open('GET',window.location.href+'api/search?name='+name.value,true);
        //console.log(xhr);
        xhr.onload = function(){
            if(this.status==200){
                var response = JSON.parse(this.responseText);
                if(response.status!=0){
                    message.innerText=response.message;
                    console.log(response.message);
                    name.classList.remove('is-valid');
                    name.classList.add('is-invalid');
                    name.style.backgroundColor = "#ff6666";
                }
            }
        }
        xhr.send();
    }
    */
}
function pincodeValidate(){
    var pincode = document.getElementById('pincode');
    var value   = pincode.value;
    var message =document.getElementById('pincodeHelpText');
    if(value.length==6 && value>0)
    {
        //message.innerText=""
        //pincode.style.backgroundColor = "#00e673";
        //pincode.classList.remove('is-invalid');
        //pincode.classList.add('is-valid');
        var xhr = new XMLHttpRequest;
        xhr.open('GET',window.location.href+'api/search?pincode='+pincode.value,true);
        xhr.onload = function(){
            if(this.status==200){
                var response = JSON.parse(this.responseText);
                if(response.status!=0){
                    message.innerText=response.message;
                    console.log(response.message);
                    pincode.classList.remove('is-valid');
                    pincode.classList.add('is-invalid');
                    pincode.style.backgroundColor = "#ff6666";
                }
                else{
                    message.innerText=""
                    pincode.style.backgroundColor = "#00e673";
                    pincode.classList.remove('is-invalid');
                    pincode.classList.add('is-valid');
                }
            }
        }
        xhr.send();
    }
    else{
        pincode.style.backgroundColor = "#ff6666";
        message.innerText="Enter Pincode of 6 digit.";
        pincode.classList.remove('is-valid');
        pincode.classList.add('is-invalid');
    }
    var valid = pincode.classList.contains('is-valid');
    if(valid){
        return 1;
    }
    else{
        return 0;
    }
    /*
    var valid = pincode.classList.contains('is-valid');
    if(valid)
    {
        var xhr = new XMLHttpRequest;
        xhr.open('GET',window.location.href+'api/search?pincode='+pincode.value,true);
        //console.log(xhr);
        xhr.onload = function(){
            if(this.status==200){
                var response = JSON.parse(this.responseText);
                if(response.status!=0){
                    message.innerText=response.message;
                    console.log(response.message);
                    pincode.classList.remove('is-valid');
                    pincode.classList.add('is-invalid');
                    pincode.style.backgroundColor = "#ff6666";
                }
            }
        }
        xhr.send();
    }
    */
}


function resetForm() {
  document.getElementById("Form").reset();
  var email     = document.getElementById('email');
  var name      = document.getElementById('name');
  var pincode   = document.getElementById('pincode');
  name.classList.remove('is-valid','is-invalid');
  name.style.backgroundColor = 'transparent';
  email.classList.remove('is-valid','is-invalid')
  email.style.backgroundColor = 'transparent';
  pincode.classList.remove('is-valid','is-invalid');
  pincode.style.backgroundColor = 'transparent';
}

