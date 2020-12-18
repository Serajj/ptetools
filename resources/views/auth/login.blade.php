@extends('layouts.main')

@section('content')
<div class="container">
            <!-- Modal -->
            <div
              class="modal-dialog modal-dialog-centered modal-lg"
              role="document"
            >
              <div class="modal-content">
                <div class="modal-body row">
                  <div
                    class="col-md-6 bg-red white text-center cus_padd"
                  >
                    <div
                      class="d-flex flex-wrap h-100 align-items-center"
                    >
                      <h3 class="ctchdng font-italic">
                        Let’s work together to define and engage your
                        <span class="sitename sprinthdng"
                          >Company Name</span
                        >
                      </h3>
                      <h3 class="ctchdng font-italic cus_hdng_ctc">
                        First, tell us a little more about yourself,
                        your company/project and your Creative Design
                        ideas.
                      </h3>
                    </div>
                  </div>
                  <div class="col-md-6 cus_paddtwo">
                    <form class="ctcfrm" method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="sprint2">&nbsp;&nbsp;</div>

                      <h6 class="rqsthdng bold black">Login</h6>

                      <div class="form-group">
                        <!-- <label for="inputemail"></label> -->
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                      <div class="form-group">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <div
                          class="custom-control custom-checkbox mb-3"
                        >
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label
                            class="custom-control-label cus_size"
                            for="authorize"
                            >Remember Me</label
                          >
                        </div>
                      </div>

                      <button type="submit" class="btn sendbtn white">
                          {{ __('Login') }}
                      </button>

                      <a class="btn sendbtn white"  href="{{ route('login.google') }}"">Google</a>

                      <a class="btn sendbtn white mt-2"  href="{{ route('login.facebook') }}"">Facebook</a>
                      <a class="btn sendbtn white mt-2"  href="{{ route('register') }}"">Sign Up</a>
                     
                     


                      <br />
                      <span id="resultt"> </span>
                    </form>
                    
                    
                    <div class="divider mx-auto my-3 bg-red"></div>
                    <span class="hinthdng font-weight-bold"
                      >Or simply contact us:</span
                    >
                    <div class="contact-detail-wrapper ml-5">
                      <span
                        class="sprinthdng regular mt-3 d-inline-block font-weight-bold"
                        >Address , Flat Number</span
                      >
                      <div class="detail-wrapper">
                        <div class="phone-wrapper">
                          <a class="sitecolor" href="tel:+123 123 123"
                            >Mobile +123 123 123</a
                          >
                        </div>
                        <div class="email-wrapper">
                          <a
                            class="sitecolor"
                            href="mailto:mail@yourcompany.com"
                            >mail@yourcompany.com</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</li>
<!--login end-->
</div>



@endsection