<div class="aiz-category-menu bg-white rounded-0 border-top" id="category-sidebar" style="width:270px;">
    <ul class="list-unstyled categories no-scrollbar mb-0 text-left">
        <?php $__currentLoopData = \App\Models\Category::where('level', 0)->orderBy('order_level', 'desc')->get()->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="category-nav-element border border-top-0" data-id="<?php echo e($category->id); ?>">
                <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="text-truncate text-dark px-4 fs-14 d-block hov-column-gap-1">
                    <img class="cat-image lazyload mr-2 opacity-60"
                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                        data-src="<?php echo e(uploaded_asset($category->icon)); ?>"
                        width="16"
                        alt="<?php echo e($category->getTranslation('name')); ?>"
                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                    <span class="cat-name has-transition"><?php echo e($category->getTranslation('name')); ?></span>
                </a>
                <?php if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0): ?>
                    <div class="sub-cat-menu c-scrollbar-light border p-4 shadow-none">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH C:\Users\User\Documents\projects\Multipurcdrop\resources\views/frontend/partials/category_menu.blade.php ENDPATH**/ ?>