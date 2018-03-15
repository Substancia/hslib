@include('inc.header')

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/') }}">Home</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/books') }}">Bookshelf</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/professor-possessions') }}">Imports</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="{{ url('/journals') }}">Journals <span class="sr-only">(current)</span></a>
	      </li>
	      @guest
	      @else
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/panel') }}">Panel</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Logout</a>
	      </li>
	      @endguest
	    </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

	    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('/journalsearch') }}">
	    	{{ csrf_field()}}
	      <input class="form-control mr-sm-2" type="search" placeholder="Journals" name="search" id="search">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>

	<div class="container">
		<br>
		<div class="row">
			<legend>Journal Info</legend>
			<br>
			<div class="col-md-7">
				<h3>Journal Name: {{ $book->name }}</h3>
				<p><br><b>Description:</b><br>{{ $book->description }}</p>
				<p><br><b>Available places:</b><br>{{ $book->place }}</p>
			</div>
			<div class="col-md-5">
				@if(strlen($file->name) > 0)
				<img src="{{ asset('storage/images/'.$file->name) }}" width="100%" style="border: 1px solid grey;">
				@endif
			</div>
		</div>
	</div>
@include('inc.footer')