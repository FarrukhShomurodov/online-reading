@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <div id="reader-container" class="w-100"
             data-path="{{asset('book_files/'.$book->id.'/ru')}}"
             data-show-fullscreen="true"
             data‑language="ru"
             data-enable-swiping="true"
             data-enable-pinching="true"
             data-max-zoom="200"></div>
    </div>
@endsection
