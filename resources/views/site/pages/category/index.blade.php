@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <h3>Категории</h3>
        <span class="author">Исследуйте разнообразные категории книг. Выберите свою любимую и найдите идеальное чтение для себя.</span>

        <div class="genre-grid  all-genres">
            @foreach($categories as $category)
                <div class="all-genres-section">
                    <div class="genre-container">
                        @if($category->images->first())
                            <img src="storage/{{ $category->images->first()->url }}" alt="">
                        @endif
                        <div class="genres-info">
                            <span class="author">{{ $category->description['ru'] ?? ''}}</span><br>
                            <p>
                                <span>{{ $category->name['ru'] }}</span>
                            </p>
                        </div>
                    </div>
                    <button class="btn" onclick="window.location.href='{{route('category.books', $category->id)}}'">
                        Посмотреть
                        книги
                    </button>
                </div>
            @endforeach
        </div>

        @if($collections->find(8)->books->count() > 0)
            <div class="category-container w-100">
                <h3>{{ $collections->find(8)->name['ru']}}</h3>
                <div class="swiper-category-container1">
                    <div class="swiper-wrapper">
                        @foreach($collections->find(8)->books as $book)
                            @if($book->is_active)
                                <div class="book-container swiper-slide">
                                    <div>
                                        @if($book->images->first())
                                            <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                                 width="100%"
                                                 height="244px">
                                        @endif
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="swiper-category-button-prev1"><img src="{{asset('img/icons/left.svg')}}" alt="left">
                    </div>
                    <div class="swiper-category-button-next1"><img src="{{asset('img/icons/right.svg')}}" alt="right">
                    </div>
                </div>
            </div>
        @endif

        @if($tags->count() > 0)
            <div class="all-books-container w-100">
                <h3>Теги</h3>
                <div class="all-books">
                    <ul>
                        @foreach($tags as $tag)
                            <li>
                                <button class="click">
                                    <a href="{{ route('tag.books', $tag->id) }}">
                                        {{ $tag->name['ru'] }}
                                    </a>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if($collections->find(9)->books->count() > 0)
            <div class="category-container w-100">
                <h3>{{ $collections->find(9)->name['ru']}}</h3>
                <div class="swiper-category-container2">
                    <div class="swiper-wrapper">
                        @foreach($collections->find(9)->books as $book)
                            @if($book->is_active)
                                <div class="book-container swiper-slide">
                                    <div>
                                        @if($book->images->first())
                                            <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                                 width="100%"
                                                 height="244px">
                                        @endif
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="swiper-category-button-prev2"><img src="{{asset('img/icons/left.svg')}}" alt="left">
                    </div>
                    <div class="swiper-category-button-next2"><img src="{{asset('img/icons/right.svg')}}" alt=right"">
                    </div>
                </div>
            </div>
        @endif


        @if($collections->find(10)->books->count() > 0)
            <div class="top-genre w-100">
                <p class="top-genre-p">{{ $collections->find(10)->name['ru']}}</p>
                <div class="genre-grid">
                    @foreach($collections->find(10)->books as $book)
                        @if($book->is_active)
                            <div class="book-container swiper-slide">
                                <div>
                                    @if($book->images->first())
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                             width="100%"
                                             height="244px">
                                    @endif
                                    <div class="book-container-content">
                                        <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                        <p>{{ $book->title['ru'] }}</p>
                                    </div>
                                </div>
                                <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать книгу
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
