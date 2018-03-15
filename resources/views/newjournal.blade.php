@guest

Access denied

@else

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

	    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('/journalsearch') }}">
	    	{{ csrf_field()}}
	      <input class="form-control mr-sm-2" type="search" placeholder="Journals" name="search" id="search">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>

<div class="container" style="padding: 30px 20px;">

	<div class="tab-content">

			<form class="form-horizontal" method="POST" action="{{ url('/insertjournal') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<legend>New Journal</legend>
				@if(count($errors) > 0)
					@foreach($errors->all() as $error)
						<div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  {{ $error }}
						</div>
					@endforeach
				@endif
				<div class="row">
					<div class="col-md-6">
						<fieldset>
							<div class="form-group">
								<label for="name" class="control-label">Book Name</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Book name">
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group">
								<label for="description" class="control-label">Description (optional)</label>
								<textarea name="description" class="form-control" placeholder="Description"></textarea>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group">
								<label for="place" class="control-label">Available places</label>
								<textarea name="place" class="form-control" placeholder="Places"></textarea>
							</div>
						</fieldset>
						<button type="submit" class="btn btn-primary" id="submit">Submit</button>
						<a href="{{ url('/panel') }}" class="btn btn-primary">Back</a>
					</div>
					<div class="col-md-6">
						<center><h4>Journal cover</h4><h5>(Optional)</h5><br><input type="file" name="file"></center>
					</div>
				</div>
			</form>
	</div>

</div>


@include('inc.footer')

@endguest