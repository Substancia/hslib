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
		<br><br>
		<div class="row">
			<legend>Bookshelf</legend>
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Book ID</th>
			      <th scope="col">Book name</th>
			      <th scope="col">Author</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(count($books) > 0)
			  		@foreach($books->all() as $book)
			    <tr>
				      <td>{{ $book->book_id }}</td>
				      <td>{{ $book->name }}</td>
				      <td>{{ $book->author }}</td>
				      <td><a href='{{ url("/read/{$book->id}") }}' class="badge badge-primary">More info</button></td>
			    </tr>
			  		@endforeach
			  	@endif
			  </tbody>
			</table>
		</div>
	</div>

@include('inc.footer')