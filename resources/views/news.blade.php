@include('inc.header')

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/books') }}">Bookshelf</a>
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

	    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('/newssearch') }}">
	    	{{ csrf_field()}}
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" id="search">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>

<div class="container">
	<br><br>
	<h1 class="display-4">Humanities and Social Science Library Website</h1>
	<br><br>
	<h2>News</h2>
			  	@if(count($books) > 0)
			  		@foreach($books->all() as $book)
	<div class="jumbotron">
	  <h3>{{ $book->name }}</h3>
	  <p class="lead">{{ $book->author }}</p>
	  <hr class="my-4">
	  <p>{{ $book->subject }}</p>
	  <p class="lead">
	    <a class="btn btn-primary btn-lg" href='{{ url("/newsread/{$book->id}") }}' role="button">Learn more</a>
	  </p>
	</div>
			  		@endforeach
	<div class="row text-center">
		{{ $books->links() }}
	</div>
			  	@endif
</div>

@include('inc.footer')