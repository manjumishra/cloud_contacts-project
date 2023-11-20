@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    @section('con')

    <div class="container">
        <div class="table-light border col-10 jumbtron container">
            <div class="row text-center">
                <h2 class=" font-weight-bold mt-4 col-6">Update Contact</h2>
            </div><br>
            <!-- @if(Session::has('success'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('success')}}</div>
            @endif -->
            @if(Session::has('error'))
            <!-- <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
           -->
           
           <script>
              swal("{{session('error')}}")
           </script>
            @endif<br>
            
            <br>
            <form action="/update" method="post">
                @csrf()
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="firstname" id="fname" onblur="val1()" class="form-control container" value="{{$data->firstname}}">
                    @if($errors->has('firstname'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('firstname')}}</label>
                    @endif
                    <strong id="error1" class="text-danger"></strong>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lastname"id="lastname" onblur="val2()" class="form-control container" value="{{$data->lastname}}">
                    @if($errors->has('lastname'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('lastname')}}</label>
                    @endif
                    <strong id="error2" class="text-danger"></strong>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"id="email" onblur="val3()" class="form-control container" value="{{$data->email}}">
                    @if($errors->has('email'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('email')}}</label>
                    @endif
                    <strong id="error3" class="text-danger"></strong>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phonenumber" id="phonenumber" onblur="val4()"class="form-control container"value="{{$data->phonenumber}}">
                    @if($errors->has('phonenumber'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('phonenumber')}}</label>
                    @endif
                    <strong id="error4" class="text-danger"></strong>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" id="" cols="15" rows="2"class="form-control container">{{$data->address}}</textarea>
                </div>
                <div class="form-group">
                    <label>Nickname</label>
                    <input type="text" name="nickname" class="form-control container" value="{{$data->nickname}}">
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" class="form-control container" value="{{$data->company}}"
                </div>
                <div class="form-group">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="active" class="ml-2">&ensp;Active
                    <input type="radio" name="status" value="Inactive" class="ml-2">&ensp;Inactive
                    @if($errors->has('status'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('status')}}</label>
                    @endif
                </div>
                <div class="form-group" align=center>
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="submit" name="sub" value="Update" id="submit" onclick="validateform()"class=" btn btn-success form-control h3 col-5">
                </div>
            </form>
        </div>
    </div><br>
    @endsection
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('validation.js')}}"></script>
</body>

</html>