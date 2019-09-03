@if (Auth::user())
    <div class="container-fluid">
      	<div class="row">
         	<nav class="navbar navbar-default">
             	<div class="container-fluid">
              	<ul class="nav navbar-nav navbar-right">
                  <li>
                  	<a href="{{route('home')}}">Home</a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">Profile</a>
                  </li>
                	<li>
                  	<a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                      @csrf
                    </form>
                	</li>
              	</ul>
             	</div>
         	</nav>
      </div>
    <div>
@endif
