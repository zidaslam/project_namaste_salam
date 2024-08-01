<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Form Dynamic</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <meta name="_token" content="{{ csrf_token() }}"> --}}
</head>
<body>
    <div class="bg p-3 text-blue shadow-lg text-center">
        <h4>Laravel Dynamic Dependent dropdown User Form</h4>
    </div>
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
           <div class="container" >
            <a class="btn btn-primary btn-sm" href="{{ route('index') }}">Create User</a>
           </div>
           <div class="Card card-primary p-4 border-0 shadow-lg">
            @if (Session::has('success'))
                
           <div class="alert alert-success">
              {{ Session::get('success') }}
           </div>
            
            @endif

            @if (Session::has('error'))
                
            <div class="alert alert-danger">
               {{ session::get('error') }}
            </div>
             
             @endif
           </div>
            <div class="card-body">
                <h3>Users</h3>
                    <table class="table">
                     <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    @if(!empty($users))
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ $user->state }}</td>
                            <td>{{ $user->city }}</td>
                            <td><a href="{{ route('edit', $user->id) }}" class="btn btn-success">Edit</a></td>
                        </tr>
                            
                        @endforeach
                        <tr>

                        </tr>
                    @endif
                     </thead>
                  </table>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
{{-- <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
