@extends('layouts.app')
@section('content')

<div id="app">
    @include('admin.admin_nav')

    <div id="main">
        <header class="mb-3">
            <a href="{{ url("#") }}" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        
<div class="page-heading">
<h3><i class="bi bi-person-fill fs-2"></i> Create New User</h3>
</div> 
<div class="page-content"> 
<section class="row">
    <div class="col-12 col-lg-12">
      <div class="row">
        <div class="card">
           
            <div class="card-content">
                <div class="card-body">
                        <form class="form form-vertical" action="{{url('/admin/users')}}" method="POST">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="name">Name</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Full Name" id="name" name="name" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="username">Username</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="email">Email</label>
                                            <div class="position-relative">
                                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="mobile">Mobile</label>
                                            <div class="position-relative">
                                                <input type="tel" class="form-control" placeholder="Mobile" id="mobile" name="mobile" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                        
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="role">User Role</label>
                                                <select class="form-select" id="role" name="role" required onchange="generateUserId()">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="controller">Controller</option>
                                                    <option value="executive">Executive</option>
                                                    <option value="store_manager">Store Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password">Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                              

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                            <!-- CSRF Token -->
                            @csrf
                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    
</section>
</div>

       @include('admin.footer')
    </div>

</div>


@endsection

{{-- <script>
    function generateUserId() {
        const role = document.getElementById('role').value;
        const randomDigits = String(Math.floor(1000 + Math.random() * 9000));
        const userId = role.toUpperCase().charAt(0) + randomDigits;

        document.getElementById('user_id').value = userId;
    }
</script> --}}