@extends('admin.layouts.app')

@section('title')
    <title>Reading | Активация книг</title>
@endsection

@section('content')
    <div>
        <div class="d-flex justify-content-between flex-row align-items-center">
            <h2>{{$book->title['ru']}} ({{strtoupper($lang)}})</h2>
            <a class="btn btn-sm btn-primary text-white" href="{{ route('books.index') }}">Назад</a>
        </div>
        <div id="reader-container" class="w-100 mt-4"
             data-path="{{ asset('book_files/' . $book->id . '/'. $lang) }}"
             data-show-fullscreen="true"
             data-language="ru"
             data-enable-swiping="true"
             data-enable-pinching="true"
             data-max-zoom="200"></div>
    </div>
@endsection
