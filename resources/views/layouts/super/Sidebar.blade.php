<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Plugins-->
    <script src="{{ asset('/jQuery/jquery.min.js') }}"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->
    <script src="{{ asset('/jQuery/jquery.dataTables.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/jQuery/jquery.dataTables.min.css') }}">
    <link href="{{ asset('/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!--My CSS & Scripts-->
    <link href="{{ asset('/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/js/hide_alert_messages.js') }}"></script>
</head>

<style>
  #dashboard{
    align-self:flex-start;
    margin-left: 10px;
    padding: 10px;
  }
  #dashboard a{
    text-decoration: none;
    color: white;
    font-size: 20px
  }
 .my-hide{
  display: none;
 }
 .my-show{
  display: inline;
 }
</style>

<!--Main sidebar-->
<section>
    <div id="admin-sidebar" class="abc">
        <h3 class="mt-3 text-light">Company Name</h3>
        <div id="dashboard">
          <a href="{{ Route('dashboard') }}">Dashboard</a>
        </div>
        <div class="accordion" id="accordionFlushExample">
          @if (Auth::user()->status == 'Admin')
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Users
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <li><a href="{{ Route('get-users') }}">Manage Users</a></li>
                </div>
              </div>
            </div>
          @endif
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Activities
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                      <li><a href="{{ Route('activities') }}">Manage Activities</a></li>
                      <li><a href="{{ Route('today-activities') }}">Today's Activities</a></li>
                      <li><a href="{{ Route('create-activity') }}">Create Activity</a></li>
                  </div>
                </div>
              </div>
          </div>
    </div>
</section>

<!--Main Content-->
<section>
    <div class="card" id="admin-content">
        <div class="card-header">
          <div id="admin-menu-nav">
            <div></div>
            <div></div>
            <div></div>
          </div>
            <div>
                <h3 class="text-danger">Welcome, {{ auth()->user()->first_name }} ({{ auth()->user()->status }})</h3>
            </div>
            <div id="admin-logout">
                <a href="{{ Route('logout') }}">
                    Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            @yield('title')
            @yield('content')
        </div>
    </div>
</section>

<script>
  $('#admin-menu-nav').click(function() {
      if ($('#admin-sidebar').hasClass('my-hide')) {
        $('#admin-content').css('width', 'calc(100% - 270px)')
        $('#admin-sidebar').css({
          'display':'inline'
        })
        $('#admin-sidebar').removeClass('my-hide')
      } else {
        $('#admin-sidebar').css({
          'display':'none'
        });
        $('#admin-content').css('width', '98%')
        $('#admin-sidebar').addClass('my-hide')
      }
  })
</script>