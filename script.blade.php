<script>

    $(document).on('input', '#first_name', function(e) {
     var inputValue = $(this).val();
     var newValue = '';
     var containsNumeric = false;
   
     // Check if input contains numeric characters
     for (var i = 0; i < inputValue.length; i++) {
       if (!/^[a-zA-Z\s]*$/.test(inputValue[i])) {  // Check if character is a number
        containsNonAlphabetic = true;
                    alert('The name field should only contain alphabetic characters.');
                } else {
                    newValue += inputValue[i];
                }
            }
            
            // Update the input field value
            $(this).val(newValue);
            
            // Add or remove error class based on validation
            if (containsNonAlphabetic) {
                $(this).addClass('error');  // Add error class if input contains invalid characters
                //$(this).css('border-color', 'red');  // Change border color to red
            } else {
                $(this).removeClass('error');  // Remove error class if input is valid
               // $(this).css('border-color', '');  // Reset border color
            }
        });
   $(document).ready(function () {
               // Mobile number validation
               $(document).on('input', '#mobile', function(e) {
                   this.value = this.value.replace(/\D/g, '');
                   if (this.value.length > 10) {
                       this.value = this.value.slice(0, 10);
                   }
               });

               // Show error if mobile number is not exactly 10 digits when the user leaves the field
                    $(document).on('blur', '#mobile', function(e) {
                        const mobile = $(this).val();
                        if (mobile.length !== 10) {
                            alert('The mobile number must be exactly 10 digits.');
                        }
                    });

               // Salary
               $(document).on('input', '#salary', function(e) {
                this.value = this.value.replace(/\D/g, '');
               });
               // Aadhaar card validation (12 digits)
               $(document).on('input', '#aadhaar', function(e) {
                   this.value = this.value.replace(/\D/g, '');
                   if (this.value.length > 12) {
                       this.value = this.value.slice(0, 12);
                   }
               });
               // Show error if adhar is not exactly 12 digits when the user leaves the field
               $(document).on('blur', '#aadhaar', function(e) {
                        const aadhaar = $(this).val();
                        if (aadhaar.length !== 12) {
                            alert('The aadhaar number must be exactly 12 digits.');
                        }
                    });

               //Age validation
               $(document).on('input', '#age', function(e) {
                   this.value = this.value.replace(/\D/g, '');
                   if (this.value.length > 2) {
                       this.value = this.value.slice(0, 2);
                   }
               });
   
               // PAN number validation (10 characters, alphanumeric)
               $(document).on('input', '#pan', function(e) {
                   this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
                   if (this.value.length > 10) {
                       this.value = this.value.slice(0, 10);
                   }
               });

                // Show error if pan is not exactly 12 digits when the user leaves the field
                $(document).on('blur', '#pan', function(e) {
                        const pan = $(this).val();
                        if (pan.length !== 10) {
                            alert('The pan number must be exactly this format ABCDE0123E.');
                        }
                    });
   
               // Pin code validation (6 digits)
               $(document).on('input', '#pincode', function(e) {
                   this.value = this.value.replace(/\D/g, '');
                   if (this.value.length > 6) {
                       this.value = this.value.slice(0, 6);
                   }
               });

               // Show error if pin code is not exactly 12 digits when the user leaves the field
                $(document).on('blur', '#pincode', function(e) {
                        const pincode = $(this).val();
                        if (pincode.length !== 10) {
                            alert('The pincode number must be exactly 6 digits.');
                        }
                    });
   
   
               $('#userForm').on('submit', function(e) {
                   e.preventDefault();
   
                   let isValid = true;
                   let messages = [];
   
                   // Validate Mobile Number (exactly 10 digits)
                   const mobile = $('#mobile').val();
                   if (mobile.length !== 10) {
                       isValid = false;
                       messages.push('The mobile number must be exactly 10 digits.');
                   }
   
                   // Validate Aadhaar Card (exactly 12 digits)
                   const aadhaar = $('#aadhaar').val();
                   if (aadhaar.length !== 12) {
                       isValid = false;
                       messages.push('The Aadhaar card number must be exactly 12 digits.');
                   }

                   // validation salary
                   const salary = $('#salary').val();
                   
                   // validation age
                   const age = $('#age').val();
                   if (age.length !== 2) {
                       isValid = false;
                       messages.push('The age  must be exactly 2 digits.');
                   }
   
                   // Validate PAN Number (exactly 10 alphanumeric characters)
                   const pan = $('#pan').val();
                   if (pan.length !== 10 || !/^[A-Z0-9]{10}$/.test(pan)) {
                       isValid = false;
                       messages.push('The PAN number must be exactly 10 alphanumeric characters.');
                   }
   
                   // Validate Pin Code (exactly 6 digits)
                   const pincode = $('#pincode').val();
                   if (pincode.length !== 6) {
                       isValid = false;
                       messages.push('The pin code must be exactly 6 digits.');
                   }
   
                   if (!isValid) {
                       alert(messages.join('\n'));
                       return false;
                   }
   
                   // If validation passes, alert success message
                   alert('Validation passed, form is ready to be submitted.');
               });
           });
   
   
   
   
   //   $(function(){
   //   var $registerForm= $("#registration");
   //   alert('oo');
   //   if($registerForm.length){
   //     $registerForm.validate({
   //       rules:{
   //         firstname:{
   //           required:true
   //           maxlength:50 
   //           lettersOnly: true
   
   //         }
   //       },
   //       messages:{
   //         firstname:{
   //           required:'user name is mandatory',
   //           maxlength:'try again letter',
   //           lettersOnly:'invalid syntax'
   //         }
   //       }
   //     })
   //   }
    
   
   // })
   
   
   
</script>
   {{-- dropdown --}}
   

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

{{-- table script --}}
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- third party css -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

		<!-- App css -->
		<link href="{{ asset('assets/css/bootstrap-creative.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{ asset('assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{ asset('assets/css/bootstrap-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="{{ asset('assets/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />



        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- third party js -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

<script >
            $(document).ready(function(){
              $(document).on('change', '#country-dd', function(e) {
                                      
                var idCountry = $(this).val();
                //alert(idCountry);
                $('#state-dd').html('');
                $.ajax({
                  type: "POST",
                  url: "{{ url('api/fatch-state') }}",
                  data: {country_id:idCountry,_token:"{{ csrf_token() }}"},
                  dataType: "json",
                  success: function (response) {
                    $('#state-dd').html('<option value="" > Select State </option>');
                    $.each(response.states, function (index,val) { 
                      $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>');   
                    });
                    $('#city-dd').html('<option value="" > Select City </option>');   
                  }
                });
              });

              $('#state-dd').change(function(event){                                      
                var idState = this.value;
                $('#city-dd').html('');
                $.ajax({
                  type: "POST",
                  url: "{{ url('api/fatch-city') }}",
                  data: {state_id:idState,_token:"{{ csrf_token() }}"},
                  dataType: "json",
                  success: function (response) {
                    $('#city-dd').html('<option value="" > Select City </option>');
                    $.each(response.cities, function (index,val) { 
                      $('#city-dd').append('<option value=" '+val.id+' " >' +val.name+ '</option>');   
                    });
                    
                  }
                });
              });
              
            });
          
            
</script>
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
          

       