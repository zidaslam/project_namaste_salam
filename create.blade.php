<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Form Dynamic</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="_token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="bg p-3 text-blue shadow-lg text-center">
        <h4>Laravel Dynamic Dependent dropdown User Form</h4>
        
    </div>
    <div class="container mt-3">
      
        <div class="row d-flex justify-content-center">
            <form action="#" method="POST" id="frm" name="frm">
                <div class="col-md-6">
                    <div class="card card-primary p-4 border-0 shadow-lg">
                      <div class="card body">
                        <h3>Create User</h3>
                        
                        <div class="mb-3">
                            <input type="text" class="form-control-lg form-control" name="name" id="name" placeholder="Enter your Name......"> 
                            <p class="invalid-feedback" id="name-error"></p>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control-lg form-control" name="email" id="email" placeholder="Enter Email......">
                            <p class="invalid-feedback" id="email-error"></p>
                        </div>
                        <div class="mb-3">
    
                            <select name="country" id="country" class="form-control-lg form-control">
                                <option value="">Select Country</option> 
                                @if(!empty($countries))
                                   @foreach ($countries as $country)
                                   <option value="{{ $country->id }}">{{ $country->name }}</option>   
                                   @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="state" id="state" class="form-control-lg form-control">
                                <option value="">Select State</option>
                            </select> 
                        </div>
                        
                        <div class="mb-3">
                            <select name="city" id="city" class="form-control-lg form-control">
                                <option value="">Select City</option>
                            </select>
                        </div>
                        

                        <div class="row">
                          <div class="col-12 d-flex justify-content-between">
                              <div class="form-group">
                                  <button class="btn btn-primary btn-lg">Create</button>
                              </div>
                              <div class="form-group">
                                  <a href="{{ route('list') }}" class="btn btn-primary btn-lg">Back</a>
                              </div>
                          </div>
                      </div>
                      </div>
                      
                        
                      </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script>
     $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
   });
   $(document).ready(function(){
              $(document).on('change', '#country', function(e) {
                                      
                var idCountry = $(this).val();
                //alert(idCountry);
                $('#state').html('');
                $.ajax({
                  type: "POST",
                  url: "{{ url('fetch-state') }}",
                  data: {country_id:idCountry,},
                  dataType: "json",
                  success: function (response) {
                    $('#state').html('<option value="" > Select State </option>');
                    $.each(response.states, function (index,val) { 
                      $('#state').append('<option value="'+val.id+'"> '+val.name+' </option>');   
                    });
                    $('#city').html('<option value="" > Select City </option>');   
                  }
                });
              });

              $('#state').change(function(event){                                      
                var idState = this.value;
                $('#city').html('');
                $.ajax({
                  type: "POST",
                  url: "{{ url('fetch-city') }}",
                  data: {state_id:idState},
                  dataType: "json",
                  success: function (response) {
                    $('#city').html('<option value="" > Select City </option>');
                    $.each(response.cities, function (index,val) { 
                      $('#city').append('<option value=" '+val.id+' " >'+val.name+'</option>');   
                    });
                    
                  }
                });
              });
              $('#frm').submit(function(event){
                event.preventDefault();
                $.ajax({
                  type: "POST",
                  url: "{{ url('save') }}",
                  data: $("#frm").serializeArray(),
                  dataType: "json",
                  success: function (response) {
                    if(response['status'] == 1){

                    }else{
                        if (response['errors']['name']) {
                            $("#name").addClass('is-invalid');
                            $("#name-error").html(response['errors']['name']);
                        } else{
                            $("#name").removeClass('is-invalid');
                            $("#name-error").html("");
                        }
                        if (response['errors']['email']){
                            $("#email").addClass('is-invalid');
                            $("#email-error").html(response['errors']['email']);
                        }else{
                            $("#email").removeClass('is-invalid');
                            $("#email-error").html("");
                        }
                    }

                  }
                })
            });
        });
</script>