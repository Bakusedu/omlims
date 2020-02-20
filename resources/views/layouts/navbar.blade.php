<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">O M L I M S</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @if(auth()->user())
        <li class="nav-item">
          <a class="nav-link" href="/logout"><img src="{{url('/img/logout.svg')}}" height="30px" alt="Image"/></a>
        </li>
      @endif
      @guest
        <li class="nav-item">
              <a class="nav-link" href="/new_staff">Register as new staff</a>
        </li>
      @endguest
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
      @if(auth()->user())
        @if(auth()->user()->privileges === 'nurse')
          <li class="nav-item">
            <p style="margin-bottom:0px;margin-top:9px;padding-left:40px;"><img src="{{url('/img/nurse.svg')}}" height="30px" alt="Image"/><a class="nav-item" href="/home"><strong>{{ auth()->user()->name }}</a></strong></p>
          </li>
        @endif
        @if(auth()->user()->privileges === 'lab')
          <li class="nav-item">
            <p style="margin-bottom:0px;margin-top:9px;padding-left:40px;"><img src="{{url('/img/lab.svg')}}" height="30px" alt="Image"/><a class="nav-item" href="/home"><strong>{{ auth()->user()->name }}</a></strong></p>
          </li>
        @endif
        @if(auth()->user()->privileges === 'clinician')
          <li class="nav-item">
            <p style="margin-bottom:0px;margin-top:9px;padding-left:40px;"><img src="{{url('/img/doctor.svg')}}" height="30px" alt="Image"/><a class="nav-item" href="/home"><strong>{{ auth()->user()->name }}</a></strong></p>
          </li>
        @endif
        @if(auth()->user()->privileges === 'admin')
          <li class="nav-item">
            <p style="margin-bottom:0px;margin-top:9px;padding-left:40px;"><img src="{{url('/img/admin.svg')}}" height="30px" alt="Image"/><a class="nav-item" href="/home"><strong>{{ auth()->user()->name }}</a></strong></p>
          </li>
        @endif
      @endif
    </ul>
    @if(auth()->user())
      @if(auth()->user()->privileges === 'nurse')
        <form class="form-inline my-2 my-lg-0" action="/search" method="post">
          @csrf
          <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search name,phone no" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      @endif
    @endif
  </div>
</nav>