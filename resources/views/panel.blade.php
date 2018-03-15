@guest

Access denied

@else

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
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/journals') }}">Journals</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ url('/panel') }}">Panel</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Logout</a>
	      </li>
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

<br><br>
<div class="container">
	<h2>Admin Panel</h2>
	<br>
	<div class="row">
		<div class="col-md-6">
			<a href="{{ url('/newnews') }}">
			<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
			  <div class="card-body">
			    <h4 class="card-title">New article</h4>
			    <p class="card-text">Create new articles here</p>
			  </div>
			</div>
			</a>
		</div>
		<div class="col-md-6">
			<a href="{{ url('/newbook') }}">
			<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
			  <div class="card-body">
			    <h4 class="card-title">New book</h4>
			    <p class="card-text">Got new books? Log them here.</p>
			  </div>
			</div>
			</a>
		</div>
		<div class="col-md-6">
			<a href="{{ url('/newbookprof') }}">
			<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
			  <div class="card-body">
			    <h4 class="card-title">Professor's collection</h4>
			    <p class="card-text">Professor got a new book he won't mind lending? Log here.</p>
			  </div>
			</div>
			</a>
		</div>
		<div class="col-md-6">
			<a href="{{ url('/newjournal') }}">
			<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
			  <div class="card-body">
			    <h4 class="card-title">New journal</h4>
			    <p class="card-text">Found a new journal somewhere? Share the info here.</p>
			  </div>
			</div>
			</a>
		</div>
	</div>
</div>

@include('inc.footer')

@endguest