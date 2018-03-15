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

	    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('/newssearch') }}">
	    	{{ csrf_field()}}
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" id="search">
	      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>

<div class="container" style="padding: 30px 20px;">

	<div class="tab-content">

			<form class="form-horizontal" method="POST" action="{{ url('/insertnews') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<legend>New Article</legend>
				@if(count($errors) > 0)
					@foreach($errors->all() as $error)
						<div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  {{ $error }}
						</div>
					@endforeach
				@endif
				<div class="row">
					<div class="col-md-12">
						<fieldset>
							<div class="form-group">
								<label for="name" class="control-label">Article name</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Book name">
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group">
								<label for="author" class="control-label">Author</label>
								<input type="text" name="author" class="form-control" id="author" placeholder="Author">
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group">
								<label for="subject" class="control-label">Subject</label>
								<input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
							</div>
						</fieldset>
						<fieldset>
							<div class="form-group">
								<label for="description" class="control-label">Description</label>
								<textarea name="description" class="form-control" placeholder="Description" rows="30"></textarea>
							</div>
						</fieldset>
						<button type="submit" class="btn btn-primary" id="submit">Submit</button>
						<a href="{{ url('/panel') }}" class="btn btn-primary">Back</a>
					</div>
				</div>
			</form>
	</div>

</div>


@include('inc.footer')

@endguest