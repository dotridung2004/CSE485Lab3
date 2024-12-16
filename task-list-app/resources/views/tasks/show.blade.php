show.blade.php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết Task</h1>
        <p><strong>Tiêu đề:</strong> {{ $task->title }}</p>
        <p><strong>Mô tả:</strong> {{ $task->description }}</p>
        <p><strong>Mô tả chi tiết:</strong> {{ $task->long_description }}</p>
        <p><strong>Trạng thái:</strong> {{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection

edit.blade.php

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="long_description">Mô tả chi tiết:</label>
                <textarea class="form-control" id="long_description" name="long_description">{{ $task->long_description }}</textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed" {{ $task->completed ? 'checked' : '' }}>
                <label class="form-check-label" for="completed">Hoàn thành</label>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
