@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">{{ $thread->author->name }}</a> posted: {{ $thread->title }}
                    </div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
        @if( auth()->check())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ $thread->path() . '/replies' }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <legend>Add reply</legend>
                            <textarea type="text" name="body" class="form-control" id="" rows="5" placeholder="Have something to say?"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @else
            <p class="text-center">Please <a href="{{ route('login') }}">login</a> to participate in this thread</p>
        @endif
    </div>
@endsection
