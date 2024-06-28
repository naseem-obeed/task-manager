<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    



@extends('layouts.custom_layout')

@section('content')
<div class="container">
    <h1>Task: {{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Status: {{ $task->status }}</p>

    <form method="POST" action="{{ route('comments.store', $task) }}">
        @csrf
        <div class="form-group">
            <label for="content">Add Comment</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
    </form>

    <h3 class="mt-4">Comments</h3>
    @foreach($task->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $comment->content }}</p>
                <small>By {{ $comment->user->name }} on {{ $comment->created_at }}</small>
            </div>
        </div>
    @endforeach

</div>

@endsection



</body>
</html>