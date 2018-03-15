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
	    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('/journalsearch') }}">
	    	{{ csrf_field()}}
	      <input class="form-control mr-sm-2" type="search" placeholder="Journals" name="search" id="search">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	    </form>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

	  </div>
	</nav>

	<div class="container">
		<br><br>
		<div class="row">
			<legend>Journals available</legend>
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Journal name</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(count($books) > 0)
			  		@foreach($books->all() as $book)
			    <tr>
				      <td>{{ $book->name }}</td>
				      <td><a href='{{ url("/journalread/{$book->id}") }}' class="badge badge-primary">More info</button></td>
			    </tr>
			  		@endforeach
			  	@endif
			  </tbody>
			</table>
		</div>
	</div>

@include('inc.footer')