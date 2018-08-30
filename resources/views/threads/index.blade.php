@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Threads</div>

                    <div class="card-body">
                        @foreach($threads as $thread)
                            <article>
                                <h4><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h4>
                                <div class="body">{{ $thread->body }}</div>
                                <div class="author">Posted by <a href="#">{{ $thread->author->name }}</a> at {{ $thread->created_at->format('d M Y, H:m:s') }}</div>
                                <hr>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
