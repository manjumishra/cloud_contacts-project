@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    @section('con')

    <div class="container col-12"><br>
        <div class="table-light border col-8 jumbtron container">
        <!-- <div class="text-center mt-4">
                <img src="https://cdn.dribbble.com/users/2095589/screenshots/4166422/user_1.png" height="200" width="300" alt="">
            </div> -->
            <div class="text-center mt-4"><br><br>
                <span class="h3 font-weight-bold mt-4 text-danger">Add New Contact</span>
                <!-- <img src="https://cdn.dribbble.com/users/2095589/screenshots/4166422/user_1.png" height="200" width="300" alt=""> -->
                <!-- <h2 class="  text-primary col-6" >See Contacts</h2> -->
                <a href="/showcontact" class="btn btn-success text-light font-weight-bold ml-4 col-3">See Contacts</a><br>
            </div>
            @if(Session::has('error'))
            <script>
                swal("{{session('error')}}")
            </script>
            @endif<br>

            <br>
            <form action="sendcontact" method="post">
                @csrf()
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="firstname" id="fname" onblur="val1()" class="form-control container" placeholder="enter your first name only">
                    @if($errors->has('firstname'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('firstname')}}</label>
                    @endif
                    <strong id="error1" class="text-danger"></strong>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lastname" id="lastname" onblur="val2()" class="form-control container" placeholder="enter your last name">
                    @if($errors->has('lastname'))
                    <label class="text-danger  font-weight-bold col-10 container" >{{$errors->first('lastname')}}</label>
                    @endif
                    <strong id="error2" class="text-danger"></strong>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" onblur="val3()" class="form-control container" placeholder="enter your email">
                    @if($errors->has('email'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('email')}}</label>
                    @endif
                    <strong id="error3" class="text-danger"></strong>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phonenumber" id="phonenumber" onblur="val4()" class="form-control container" placeholder="enter your contact number">
                    @if($errors->has('phonenumber'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('phonenumber')}}</label>
                    @endif
                    <strong id="error4" class="text-danger"></strong>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" id="" cols="15" rows="2" class="form-control container" placeholder="enter your address like street, flatno etc."></textarea>
                </div>
                <div class="form-group">
                    <label>Nickname</label>
                    <input type="text" name="nickname" class="form-control container" placeholder="enter your nickname">
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" class="form-control container" placeholder="enter your company name">
                </div>
                <div class="form-group">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="active" class="ml-2">&ensp;Active
                    <input type="radio" name="status" value="Inactive" class="ml-2">&ensp;Inactive
                    @if($errors->has('status'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('status')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" onclick="validateform()" value="Add contact" class=" btn btn-success form-control h3 col-5">
                </div>
            </form><br>
        </div><br>
    </div><br>
    @endsection
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('validation.js')}}"></script>
</body>

</html>