<div class="sticky-top z-3 row gutters-10">
    <?php
        $photos = [];
    ?>
    <?php if($detailedProduct->photos != null): ?>

        <?php
            $photos = explode(',', $detailedProduct->photos);
        ?>
    <?php endif; ?>
    <!-- Gallery Images -->
    <div class="col-12">
        <div class="aiz-carousel product-gallery arrow-inactive-transparent arrow-lg-none"
            data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true' data-arrows='true'>
            <?php if($detailedProduct->digital == 0): ?>

                <?php $__currentLoopData = $detailedProduct->stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($stock->image != null): ?>
                        <div class="carousel-box img-zoom rounded-0">
                            <img class="img-fluid h-auto lazyload mx-auto"
                                src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                data-src="<?php echo e(uploaded_asset($stock->image)); ?>"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="carousel-box img-zoom rounded-0">
                    <img class="img-fluid h-auto lazyload mx-auto"
                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>" data-src="<?php echo e(uploaded_asset($photo)); ?>"
                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <!-- Thumbnail Images -->
    <div class="col-12 mt-3 d-none d-lg-block">
        <div class="aiz-carousel product-gallery-thumb" data-items='7' data-nav-for='.product-gallery'
            data-focus-select='true' data-arrows='true' data-vertical='false' data-auto-height='true'>

            <?php if($detailedProduct->digital == 0): ?>
                <?php $__currentLoopData = $detailedProduct->stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($stock->image != null): ?>
                        <div class="carousel-box c-pointer rounded-0" data-variation="<?php echo e($stock->variant); ?>">
                            <img class="lazyload mw-100 size-60px mx-auto border p-1"
                                src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                data-src="<?php echo e(uploaded_asset($stock->image)); ?>"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-box c-pointer rounded-0">
                    <img class="lazyload mw-100 size-60px mx-auto border p-1"
                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>" data-src="<?php echo e(uploaded_asset($photo)); ?>"
                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>


</div>
<div style="margin-left: 5vw">
    <form action="">
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
            </svg>
        </button>
    </form>

</div>
<?php /**PATH C:\Users\Tamim\Documents\projects\multipurcdrop\resources\views/frontend/product_details/image_gallery.blade.php ENDPATH**/ ?>