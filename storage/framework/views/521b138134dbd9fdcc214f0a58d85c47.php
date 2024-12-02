<?php $__env->startSection('content'); ?>
    <div class="all-categories">
        <h3>Категории</h3>
        <span class="author">Исследуйте разнообразные категории книг. Выберите свою любимую и найдите идеальное чтение для себя.</span>

        <div class="genre-grid  all-genres">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="all-genres-section">
                    <div class="genre-container">
                        <?php if($category->images->first()): ?>
                            <img src="storage/<?php echo e($category->images->first()->url); ?>" alt="">
                        <?php endif; ?>
                        <div class="genres-info">
                            <span class="author"><?php echo e($category->description['ru'] ?? ''); ?></span><br>
                            <p>
                                <span><?php echo e($category->name['ru']); ?></span>
                            </p>
                        </div>
                    </div>
                    <button class="btn" onclick="window.location.href='<?php echo e(route('category.books', $category->id)); ?>'">
                        Посмотреть
                        книги
                    </button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($collections->find(8)->books->count() > 0): ?>
            <div class="category-container w-100">
                <h3><?php echo e($collections->find(8)->name['ru']); ?></h3>
                <div class="swiper-category-container1">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $collections->find(8)->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <div class="swiper-category-button-prev1"><img src="<?php echo e(asset('img/icons/left.svg')); ?>" alt="left">
                    </div>
                    <div class="swiper-category-button-next1"><img src="<?php echo e(asset('img/icons/right.svg')); ?>" alt="right">
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($tags->count() > 0): ?>
            <div class="all-books-container w-100">
                <h3>Теги</h3>
                <div class="all-books">
                    <ul>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <button class="click">
                                    <a href="<?php echo e(route('tag.books', $tag->id)); ?>">
                                        <?php echo e($tag->name['ru']); ?>

                                    </a>
                                </button>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if($collections->find(9)->books->count() > 0): ?>
            <div class="category-container w-100">
                <h3><?php echo e($collections->find(9)->name['ru']); ?></h3>
                <div class="swiper-category-container2">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $collections->find(9)->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <div class="swiper-category-button-prev2"><img src="<?php echo e(asset('img/icons/left.svg')); ?>" alt="left">
                    </div>
                    <div class="swiper-category-button-next2"><img src="<?php echo e(asset('img/icons/right.svg')); ?>" alt=right"">
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if($collections->find(10)->books->count() > 0): ?>
            <div class="top-genre w-100">
                <p class="top-genre-p"><?php echo e($collections->find(10)->name['ru']); ?></p>
                <div class="genre-grid">
                    <?php $__currentLoopData = $collections->find(10)->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <button onclick="window.location.href='<?php echo e(route('book.show', $book->id)); ?>'"> Читать книгу
                                </button>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\onile-reading\resources\views/site/pages/category/index.blade.php ENDPATH**/ ?>