@extends('web')



@section('content')


<div class="content-wrapper">
  <div class="container">
    <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">General Form</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form id="registration" action="{{route('storePage')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-3">
                <!-- text input -->
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="firstname" value="{{old('firstname')}}" id="first_name">
                  <span class="text-danger">
                    @error('firstname')
                      {{$message}} 
                    @enderror
                  </span>
                </div>
              </div>
              <div class="col-1"></div>
              <div class="col-sm-3">
                <!-- text input -->
                <div class="form-group">
                  <label>Middle Name</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="middlename" value="{{old('middlename')}}" id="first_name" >
                </div>
              </div>
              <div class="col-1"></div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="lastname" value="{{old('lastname')}}" id="first_name">
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-4">
                
                <div class="form-group">
              
                  <label for="gaurdian" >Gaurdian</label>
                  <select  name="gaurdian" >
                      <option value="father">Father</option>
                      <option value="mother">Mother</option>
                      <option value="other">other</option>
                  </select>
                  
                  
      
                </div>
              </div>
              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="fathername" value="{{old('fathername')}}" id="first_name">
                        <span class="text-danger">
                            @error('fathername')
                              {{$message}} 
                            @enderror
                          </span>
                      </div>
                </div>
                <div class="col-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Mother Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="mothername" value="{{old('mothername')}}" id="first_name">
                      </div>
                </div>
            </div>
            <div class="row mt-3">
              <div class="col-3">
                
                <div class="form-group">
                  
                <label for="gender">Gender</label>
                <select  name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="trangender">Trangender</option>
                </select>
                <span class="text-danger">
                    @error('gender')
                      {{$message}} 
                    @enderror
                  </span>
                </div>
              </div>
              <div class="col-1"></div>
                <div class="col-3">
                  <div class="form-group">
                    <div class="col-4"></div>
                  <label for="category">Category</label>
                  <select  name="category"  >
                      <option value="gen">Gen</option>
                      <option value="obc">OBC</option>
                      <option value="sc">SC</option>
                      <option value="st">ST</option>
                  </select>
                  <span class="text-danger">
                      @error('category')
                        {{$message}} 
                      @enderror
                    </span>
                  </div>
                </div>
                <div class="col-1"></div>
                <div class="col-3">
                  <div class="form-group">
                  <label for="marriedstatus">Married Status</label>
                  <select  name="marriedstatus" >
                      <option value="married">Married</option>
                      <option value="single">Single</option>
                      <option value="divorced">Divorced</option>
                      <option value="other">other</option>
                  </select>
                  <span class="text-danger">
                      @error('marriedstatus')
                        {{$message}} 
                      @enderror
                    </span>
                  </div>
                </div>
              </div>
            
            
            {{-- Mobile number, adhar --}}
            <div class="row mt-2">
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="phone" class="form-control" name="mobile" value="{{old('mobile')}}" id="mobile">
                    <span class="text-danger">
                        @error('mobile')
                          {{$message}} 
                        @enderror
                      </span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="phone" class="form-control" name="phone" value="{{old('phone')}}">
                  </div>
                </div>
                <div class="col-sm-3">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" name="dob" value="{{old('dob')}}">
                    <span class="text-danger">
                      @error('dob')
                        {{$message}} 
                      @enderror
                    </span>
                  </div>
                </div>
                
            </div>

            <div class="row mt-2">
                <div class="col-sm-4">
                  <!-- email input -->
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                    <span class="text-danger">
                        @error('email')
                          {{$message}} 
                        @enderror
                      </span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Aadhaar Number</label>
                    <input type="text" class="form-control" name="adhar" value="{{old('adhar')}}" id="aadhaar">
                    <span class="text-danger">
                        @error('adhar')
                          {{$message}} 
                        @enderror
                      </span>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>PAN Number</label>
                    <input type="text" class="form-control" name="pan" value="{{old('pan')}}" id="pan">
                    <span class="text-danger">
                        @error('pan')
                          {{$message}} 
                        @enderror
                      </span>
                  </div>
                </div>
            </div>
            <div class="row mt-2">
              <div class="col-sm-5 mt-2">
                <!-- textarea -->
                <div class="form-group">
                  <label>Communication Address</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="communicationaddress" value="{{old('communicationaddress')}}"></textarea>
                  <span class="text-danger">
                    @error('communicationaddress')
                      {{$message}} 
                    @enderror
                  </span>
                </div>
              </div>
              <div class="col-sm-6 mt-2">
                <div class="form-group">
                  <label>Parmanent Address</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="parmanentaddress" value="{{old('parmanentaddress')}}"></textarea>
                </div>
              </div>
            </div>

            <!-- input states -->
            {{-- <div class="form-group">
              <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                success</label>
              <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Input with
                warning</label>
              <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Input with
                error</label>
              <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
            </div> --}}
    
            {{-- <div class="row">
              <div class="col-sm-6">
                <!-- checkbox -->
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label">Checkbox</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked>
                    <label class="form-check-label">Checkbox checked</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled>
                    <label class="form-check-label">Checkbox disabled</label>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- radio -->
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio1">
                    <label class="form-check-label">Radio</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio1" checked>
                    <label class="form-check-label">Radio checked</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" disabled>
                    <label class="form-check-label">Radio disabled</label>
                  </div>
                </div>
              </div>
            </div> --}}
    
            <div class="row mt-2">
              <div class="col-4">
                <!-- select -->
                <div class="form-group">
               
                  <label for="country-dd">Country name</label>
                  <select id="country-dd"  class="form-control">
                      <option value="">Select Country</option>
                      @foreach ($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>  
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-4">
                <!-- select -->
                <div class="form-group">
                  <label for="state-dd">State name</label>
                  <select id="state-dd"  class="form-control">
                    <option value="">Select State</option>
                  </select>
                </div>
              </div>
              <div class="col-3">
                <!-- select -->
                <div class="form-group">
                  <label for="city-dd">City name</label>
                  <select id="city-dd"  class="form-control">
                      <option value="">Select City</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                    <label>Pin Code</label>
                    <input type="text" class="form-control" name="pin" value="{{ old('pin') }}" id="pincode">
                    <span class="text-danger">
                      @error('pin')
                        {{$message}} 
                      @enderror
                    </span>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-3">
                  <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" name="image" class="form-control" value="{{old('image')}}">
                      <span class="text-danger">
                        @error('image')
                          {{$message}} 
                        @enderror
                      </span>
                  </div>
                
              </div>
            </div>
    
            {{-- <div class="row">
              <div class="col-sm-6">
                <!-- Select multiple-->
                <div class="form-group">
                  <label>Select Multiple</label>
                  <select multiple class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Select Multiple Disabled</label>
                  <select multiple class="form-control" disabled>
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
              </div>
            </div>
            --}}

            <div class="row mt-2">
              <div class="col-2">
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>
              {{-- <div class="col-2">
                <div class="form-group">
                  
                    <a href="{{route('dashboardPage')}}" class="btn btn btn-primary">Back</a>
                  
                
                </div>
              </div> --}}
            </div>
          </form>
        </div>
    
  </div>  
</div> 

    





<!-- general form elements disabled -->

@endsection



    
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body> --}}
{{-- @include('admin.layouts.side-nav') --}}

    
    {{-- </body>
</html> --}}



    
       


  

