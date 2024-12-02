<footer>
    <div class="container d-flex justify-content-between">
        <img class="logo-white" src="<?php echo e(asset('img/logo-white.png')); ?>" alt=""
             onclick="window.location.href='<?php echo e(url('/')); ?>'">
        <div class="footer-content d-flex justify-content-between">
            <ul class="d-flex align-items-center flex-row">
                <li><a>Правила <img src="<?php echo e(asset('img/icons/chevron-right.svg')); ?>" alt="chevron-right"></a></li>
                <li><a href="<?php echo e(route('offer')); ?>"> Оферта <img src="<?php echo e(asset('img/icons/chevron-right.svg')); ?>"
                                                              alt="chevron-right"></a></li>
                <li><a href="<?php echo e(route('contacts')); ?>">Контакты<img src="<?php echo e(asset('img/icons/chevron-right.svg')); ?>"
                                                                 alt="chevron-right"></a></li>
                <li><a href="<?php echo e(route('about-us')); ?>"> Связаться <img src="<?php echo e(asset('img/icons/chevron-right.svg')); ?>"
                                                                    alt="chevron-right">
                    </a></li>
            </ul>
        </div>
    </div>
</footer>
<?php /**PATH C:\OSPanel\domains\onile-reading\resources\views/site/layouts/footer.blade.php ENDPATH**/ ?>