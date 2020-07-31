@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
            <ul>
              <li v-for="message in messages">
                @{{ message }}
              </li>
            </ul>
        </div>
        <div class="col-md-8">
        	<table class="table table-striped">
        		<th width="30%">Title</th>
        		<th width="50%">Comment</th>
                <th width="20%">Action</th>
        		@foreach($posts as $post)
        		<tr>
        			<td>{{ $post->title }}</td>
        			@php /*
        			<td>{{ $post->comments->sortByDesc('id')->first()->comment ?? '' }}</td> */ @endphp
        			<td>{{ $post->last_comment ?? '' }}</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <a class="btn btn-sm btn-danger" href="{{ route('posts.delete', $post->id) }}">Delete</a>
                    </td>
        		</tr>
        		@endforeach
        	</table>
        </div>
    </div>
</div>
@endsection