<?php $__env->startSection('content'); ?>
    <div class="all-books-container w-100">
        <p>Все книги</p>
        <div class="all-books">
            <ul>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <button class="click">
                            <a href="<?php echo e(route('category.books', $category->id)); ?>">
                                <?php echo e($category->name['ru']); ?>

                            </a>
                        </button>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>

    <?php if($collections->first()->books->count() > 0): ?>
        <div class="top-books d-flex justify-content-between align-items-center flex-wrap-reverse w-100">
            <div class="top-books-info d-flex flex-column justify-content-between align-items-start">
                <button class="top-btn">
                    <?php echo e($collections->first()->name['ru']); ?>

                </button>
                <div>
                    <span class="author">• <?php echo e($collections->first()->books->first()->author->name['ru']); ?></span><br>
                    <h2>
                        <?php echo e($collections->first()->books->first()->title['ru']); ?>

                    </h2>
                    <p class="top-book-desc">
                        <?php echo e($collections->first()->books->first()->description['ru']); ?>

                    </p>
                </div>
                <div>
                    <button class="top-read-book"
                            onclick="window.location.href='<?php echo e(route('book.show', $collections->first()->books->first()->id)); ?>'">
                        Читать книгу
                    </button>
                    <button class="top-readen">
                        Прочитана
                    </button>
                </div>
            </div>

            <!-- Slider -->
            <div class="slider">
                <button class="top-btn">
                    <?php echo e($collections->first()->name['ru']); ?>

                </button>
                <div class="top-books-collection">
                    <img class="crown" src="<?php echo e(asset('/img/icons/crown.svg')); ?>" alt="">
                    <div class="d-flex flex-row swiper-container">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $collections->first()->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="top-book-container swiper-slide">
                                    <?php if($book->images->first()): ?>
                                        <img src="<?php echo e(asset('storage/'.$book->images->first()->url)); ?>" alt="">
                                    <?php endif; ?>
                                    <div class="book-container-content">
                                        <span class="author">• <?php echo e($book->author->name['ru']); ?></span><br>
                                        <p><?php echo e($book->title['ru']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $collections->first()->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="top-book-container swiper-slide">
                                    <?php if($book->images->first()): ?>
                                        <img src="<?php echo e(asset('storage/'.$book->images->first()->url)); ?>" alt="">
                                    <?php endif; ?>
                                    <div class="book-container-content">
                                        <span class="author">• <?php echo e($book->author->name['ru']); ?></span><br>
                                        <p><?php echo e($book->title['ru']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="nav-slider">
                    <div class="swiper-button-prev"><img src="<?php echo e(asset('img/icons/left.svg')); ?>" alt="left"></div>
                    <div class="swiper-button-next"><img src="<?php echo e(asset('/img/icons/right.svg')); ?>" alt="right"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php $placeNumber = 0; ?>
    <?php $__currentLoopData = $categories->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($category->books->count() > 0): ?>
            <?php $placeNumber++ ?>
            <div class="category-container w-100">
                <h3><?php echo e($category->name['ru']); ?></h3>
                <div class="swiper-category-container<?php echo e($placeNumber); ?>">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $category->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($book->is_active): ?>
                                <div class="book-container swiper-slide">
                                    <div>
                                        <?php if($book->images->first()): ?>
                                            <img src="<?php echo e(asset('storage/' . $book->images->first()->url)); ?>" alt=""
                                                 width="100%"
                                                 height="244px">
                                        <?php endif; ?>
                                        <div class="book-container-content">
                                            <span class="author">• <?php echo e($book->author->name['ru']); ?></span><br>
                                            <p><?php echo e($book->title['ru']); ?></p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='<?php echo e(route('book.show', $book->id)); ?>'"> Читать
                                        книгу
                                    </button>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="swiper-category-button-prev<?php echo e($placeNumber); ?>"><img src="<?php echo e(asset('/img/icons/left.svg')); ?>"
                                                                                  alt="left"></div>
                    <div class="swiper-category-button-next<?php echo e($placeNumber); ?>"><img
                            src="<?php echo e(asset('/img/icons/right.svg')); ?>"
                            alt="right"></div>
                </div>
            </div>
        <?php endif; ?>


        <?php if($placeNumber == 2): ?>
            <?php if($collections->find(2)): ?>
                <div class="best-book-month d-flex justify-content-between w-100">
                    <div class="d-flex top-books flex-column justify-content-between align-items-start">
                        <button class="top-btn">
                            <?php echo e($collections->find(2)->name['ru']); ?>

                        </button>
                        <div>
                        <span
                            class="author">•  <?php echo e($collections->find(2)->books->first()->author->name['ru']); ?></span><br>
                            <h2>
                                <?php echo e($collections->find(2)->books->first()->title['ru']); ?>

                            </h2>
                            <p class="top-book-desc">
                                <?php echo e($collections->find(2)->books->first()->description['ru']); ?>

                            </p>
                        </div>
                        <div>
                            <button class="top-read-book"
                                    onclick="window.location.href='<?php echo e(route('book.show', $collections->find(2)->books->first()->id)); ?>'">
                                Читать книгу
                            </button>
                            <button class="top-readen">
                                Прочитана
                            </button>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-start">
                        <?php if($collections->find(2)->books->first()->images): ?>
                            <img class="best-book"
                                 src="<?php echo e(asset('storage/' . $collections->find(2)->books->first()->images->first()->url)); ?>"
                                 alt=""
                                 height="518px" width="349px">

                        <?php endif; ?>

                        <div class="best-book-month-info">
                            <div>
                                <span class='author'>Рейтинг</span>
                                <div><img src="<?php echo e(asset('/img/icons/star.svg')); ?>" alt="star">
                                    <b>4,9 </b>
                                </div>
                            </div>
                            <div>
                                <span class="author">Прочитана (раз)</span>
                                <div><img class="me-2" src="<?php echo e(asset('/img/icons/heart.svg')); ?>" alt="heart">
                                    <b> 10,1 тыс</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-books-mobile">
                        <button class="top-btn">
                            <?php echo e($collections->find(2)->name['ru']); ?>

                        </button>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($placeNumber == 3): ?>
            <?php if($collections->find(3)): ?>
                <div class="top-readen-book-container d-flex justify-content-between align-items-center w-100">
                    <div class="top-readen-book d-flex justify-content-between flex-column align-items-start">
                        <button>Cамые читаемые книги</button>
                        <p><?php echo e($collections->find(3)->name['ru']); ?></p>
                        <span>
                     <?php echo e($collections->find(3)->description['ru']); ?>

                    </span>
                    </div>
                    <div class="category-container">
                        <div class="swiper-collection-container">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $collections->find(3)->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="book-container swiper-slide">
                                        <div>
                                            <?php if($book->images->first()): ?>
                                                <img src="<?php echo e(asset('storage/'. $book->images->first()->url)); ?>"
                                                     alt="<?php echo e($book->title['ru']); ?>">
                                            <?php endif; ?>
                                            <div class="book-container-content">
                                                <span class="author">• <?php echo e($book->author->name['ru']); ?></span><br>
                                                <p><?php echo e($book->title['ru']); ?></p>
                                            </div>
                                        </div>
                                        <button onclick="window.location.href='<?php echo e(route('book.show', $book->id)); ?>'">
                                            Читать
                                            книгу
                                        </button>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="swiper-collection-container-prev"><img src="<?php echo e(asset('/img/icons/left.svg')); ?>"
                                                                               alt="prev"></div>
                            <div class="swiper-collection-container-next"><img src="<?php echo e(asset('/img/icons/right.svg')); ?>"
                                                                               alt="next"></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if($placeNumber == 4): ?>
            <?php if($collections->find(4)): ?>
                <div class="new-books w-100">
                    <button>
                        <?php echo e($collections->find(4)->name['ru']); ?>

                    </button>
                    <p>
                        <?php echo e($collections->find(4)->description['ru']); ?>

                    </p>

                    <div class="new-books-slide swiper-new-book-container">
                        <div class="swiper-wrapper">
                            <?php $books = $collections->find(4)->books; ?>
                            <?php $__currentLoopData = $books->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookPair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <?php $__currentLoopData = $bookPair; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="new-book-container"
                                             onclick="window.location.href='<?php echo e(route('book.show', $book->id)); ?>'">
                                            <?php if($book->images->first()): ?>
                                                <img src="<?php echo e(asset('storage/'. $book->images->first()->url )); ?>" alt=""
                                                     width="161px"
                                                     height="100%">
                                            <?php endif; ?>
                                            <div class="book-container-content">
                                                <h3><?php echo e($book->title['ru']); ?></h3>
                                                <p><?php echo e($book->description['ru']); ?></p>
                                                <span class="author">• <?php echo e($book->author->name['ru']); ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="swiper-new-book-prev"><img src="<?php echo e(asset('/img/icons/left.svg')); ?>" alt="prev"></div>
                        <div class="swiper-new-book-next"><img src="<?php echo e(asset('/img/icons/right.svg')); ?>" alt="next"></div>
                    </div>
                </div>

                <div class="top-news-mobile category-container d-flex flex-column w-100">
                    <div class="swiper-top-book-container">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $collections->find(4)->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="book-container swiper-slide">
                                    <div>
                                        <?php if($book->images->first()): ?>
                                            <img src="<?php echo e(asset('storage/'.$book->images->first()->url)); ?>" alt="">
                                        <?php endif; ?>
                                        <div class="book-container-content">
                                            <span class="author">• <?php echo e($book->author->name['ru']); ?></span><br>
                                            <p><?php echo e($book->title['ru']); ?></p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='<?php echo e(route('book.show', $book->id)); ?>'"> Читать
                                        книгу
                                    </button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="swiper-top-book-container-prev"><img src="<?php echo e('/img/icons/left.svg'); ?>" alt="prev">
                        </div>
                        <div class="swiper-top-book-container-next"><img src="<?php echo e('img/icons/left.svg'); ?>" alt="next">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($topGenres->count() > 0): ?>
        <div class="top-genre w-100">
            <p class="top-genre-p">Топ жанры</p>
            <div class="genre-grid">
                <?php $__currentLoopData = $topGenres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="genre-container"
                         onclick="window.location.href='<?php echo e(route('genre.books', $top->genre->id)); ?>'">
                        <?php if($top->genre->images->first()): ?>
                            <img src="<?php echo e(asset('storage/' . $top->genre->images->first()->url)); ?>" alt="genre photo">
                        <?php endif; ?>
                        <div class="genres-info">
                            <span class="author">• <?php echo e($top->genre->name['ru']); ?></span><br>
                            <span class="author"><?php echo e($top->genre->description['ru'] ?? ''); ?></span><br>
                            <p>Книги в жанре<br>
                                <span>«<?php echo e($top->genre->name['ru']); ?>»</span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\onile-reading\resources\views/site/index.blade.php ENDPATH**/ ?>