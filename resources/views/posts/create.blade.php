@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">
							Add Post
						</h3>
					</div>

					<form role="form" method="POST" action="{{ route('posts.store') }}">
						
						@csrf

                		<div class="card-body">
                  			<div class="form-group">
                    			<label for="title">Title</label>
                    			<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">

                    			@error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    		</div>

                    		<div class="form-group">
                    			<label for="content">Content</label>
                    			<textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content">{{ old('content') }}</textarea>

                    			@error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    		</div>
                  			
                  			<button type="submit" class="btn btn-primary">Create</button>
              		</form>
				</div>
        </div>
    </div>
</div>

@endsection