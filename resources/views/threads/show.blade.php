@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">{{ $thread->title }}</div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($thread->replies as $reply)
                <div class="card">
                    <div class="card-body">
                        {{ $reply->body }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
