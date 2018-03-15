@include('inc.header')

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/') }}">Home</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="{{ url('/books') }}">Bookshelf <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/professor-possessions') }}">Imports</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/journals') }}">Journals</a>
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

	    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('/search') }}">
	    	{{ csrf_field()}}
	      <input class="form-control mr-sm-2" type="search" placeholder="Books" name="search" id="search">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>

	<div class="container">
		<br>
		<div class="row">
			<legend>Book Info</legend>
			<br>
			<div class="col-md-7">
				<h3>Book ID: {{ $book->book_id }}</h3>
				<h4>Book Name: {{ $book->name }}</h4>
				<p><b>Author:</b> {{ $book->author }}</p>
				<p><b>Copies available:</b> {{ $book->availability }}</p>
				<p><br><b>Description:</b><br>{{ $book->description }}</p>
			</div>
			<div class="col-md-5">
				@if(strlen($file->name) > 0)
				<img src="{{ asset('storage/images/'.$file->name) }}" width="100%" style="border: 1px solid grey;">
				@endif
			</div>
		</div>
	</div>
@include('inc.footer')