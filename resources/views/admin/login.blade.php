@include('admin.layouts.header')
  <body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="row">
            <div class="col-md-4"></div>
          <div class="card col-md-4 mt-5">
            <div class="card-body">
              <h4 class="mb-2 text-center">Admin Login</h4><hr><br>
              {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}
                @if(Session::has('error'))
                <p class="text-danger">{{ Session::get('error') }}</p>
                @endif

                @if(Session::has('success'))
                <p class="text-danger">{{ Session::get('success') }}</p>
                @endif

              <form id="formAuthentication" class="mb-3" action="/admin/logincheck" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username"/>
                  @if($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                  @endif
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                   </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  @if($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                  @endif
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    @include('admin.layouts.footerJS')

