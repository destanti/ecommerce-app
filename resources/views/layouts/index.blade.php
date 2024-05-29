<!DOCTYPE html>
<html lang="en">
  @include('partials.head')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#dashboard" class="site_title"><i class="fa fa-paw"></i> <span>My Healthy Shop!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
           @include('partials.profile')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           @include('partials.sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
          
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('partials.top')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
                
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
     @include('partials.footer')  
        <!-- /footer content -->
      </div>
    </div>

@include('partials.script')
  </body>
</html>
