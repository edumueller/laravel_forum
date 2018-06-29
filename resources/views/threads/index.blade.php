@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forum Threads</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                @foreach ($threads as $thread)
                                    <article>
                                        <h4>{{ $thread->title }}</h4>
                                        <div class="body">{{ $thread->body }}</div>
                                    </article>
                                @endforeach
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
