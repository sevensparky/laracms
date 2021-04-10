@push('footer')
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
          <div class="row gap-y align-items-center">
  
            <div class="col-6 col-lg-3">
              <a href="{{ route('home') }}"><img src="{{ asset('images/icons/logo.png') }}" alt="logo" width="60" height="15"></a>
            </div>
  
            <div class="col-6 col-lg-3 text-right order-lg-last">
              <div class="social">
                <p> 
                  تمامی حقوق محفوظ می باشد
                  ©
                </p>
              </div>
            </div>
  
            <div class="col-lg-6">
              <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                
              </div>
            </div>
  
          </div>
        </div>
      </footer>
      <!-- /.footer -->
  
      <!-- Scripts -->
      <script src="{{ asset('js/page.min.js') }}"></script>
      <script src="{{ asset('js/script.js') }}"></script>
      @include('sweetalert::alert')  
    </body>
  </html>  
@endpush