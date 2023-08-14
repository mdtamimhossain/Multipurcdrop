

<?php $__env->startSection('content'); ?>


    <!-- Sliders & Today's deal -->
    <div class="home-banner-area mb-3" style="">
        <div class="container">
            <div class="d-flex flex-wrap position-relative">
                <div class="position-static d-none d-xl-block">
                    <?php echo $__env->make('frontend.partials.category_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <!-- Sliders -->
                <div class="home-slider">
                    <?php if(get_setting('home_slider_images') != null): ?>
                        <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-autoplay="true">
                            <?php $slider_images = json_decode(get_setting('home_slider_images'), true);  ?>
                            <?php $__currentLoopData = $slider_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-box">
                                    <a href="<?php echo e(json_decode(get_setting('home_slider_links'), true)[$key]); ?>">
                                        <!-- Image -->
                                        <img class="d-block mw-100 img-fit overflow-hidden h-sm-auto h-md-320px h-lg-460px overflow-hidden"
                                             src="<?php echo e(uploaded_asset($slider_images[$key])); ?>"
                                             alt="<?php echo e(env('APP_NAME')); ?> promo"
                                             onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Deal -->
    <?php
        $flash_deal = \App\Models\FlashDeal::where('status', 1)->where('featured', 1)->first();
    ?>
    <?php if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date): ?>
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex flex-wrap mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                        <span class="d-inline-block"><?php echo e(translate('Flash Sale')); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24" class="ml-3">
                            <path id="Path_28795" data-name="Path 28795" d="M30.953,13.695a.474.474,0,0,0-.424-.25h-4.9l3.917-7.81a.423.423,0,0,0-.028-.428.477.477,0,0,0-.4-.207H21.588a.473.473,0,0,0-.429.263L15.041,18.151a.423.423,0,0,0,.034.423.478.478,0,0,0,.4.2h4.593l-2.229,9.683a.438.438,0,0,0,.259.5.489.489,0,0,0,.571-.127L30.9,14.164a.425.425,0,0,0,.054-.469Z" transform="translate(-15 -5)" fill="#fcc201"/>
                        </svg>
                    </h3>
                    <!-- Links -->
                    <div>
                        <div class="text-dark d-flex align-items-center mb-0">
                            <a href="<?php echo e(route('flash-deals')); ?>" class="fs-10 fs-md-12 fw-700 text-reset has-transition opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary mr-3"><?php echo e(translate('View All Flash Sale')); ?></a>
                            <span class=" border-left border-soft-light border-width-2 pl-3">
                            <a href="<?php echo e(route('flash-deal-details', $flash_deal->slug)); ?>" class="fs-10 fs-md-12 fw-700 text-reset has-transition opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary"><?php echo e(translate('View All Products from This Flash Sale')); ?></a>
                        </span>
                        </div>
                    </div>
                </div>

                <!-- Countdown for small device -->
                <div class="bg-white mb-3 d-md-none">
                    <div class="aiz-count-down-circle" end-date="<?php echo e(date('Y/m/d H:i:s', $flash_deal->end_date)); ?>"></div>
                </div>

                <div class="row gutters-5 gutters-md-16">
                    <!-- Flash Deals Baner & Countdown -->
                    <div class="col-xxl-4 col-lg-5 col-6 h-200px h-md-400px h-lg-475px">
                        <div class="h-100 w-100 w-xl-auto" style="background-image: url('<?php echo e(uploaded_asset($flash_deal->banner)); ?>'); background-size: cover; background-position: center center;">
                            <div class="py-5 px-md-3 px-xl-5 d-none d-md-block">
                                <div class="bg-white">
                                    <div class="aiz-count-down-circle" end-date="<?php echo e(date('Y/m/d H:i:s', $flash_deal->end_date)); ?>"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Flash Deals Products -->
                    <div class="col-xxl-8 col-lg-7 col-6">
                        <?php
                            $flash_deals = $flash_deal->flash_deal_products->take(10);
                        ?>
                        <div class="aiz-carousel border-top <?php if(count($flash_deals)>8): ?> border-right <?php endif; ?> arrow-inactive-none arrow-x-0" data-items="5" data-xxl-items="5" data-xl-items="3.5" data-lg-items="3" data-md-items="2" data-sm-items="2.5" data-xs-items="2" data-arrows="true" data-dots="false">
                            <?php
                                $init = 0 ;
                                $end = 1 ;
                            ?>
                            <?php for($i = 0; $i < 5; $i++): ?>
                                <div class="carousel-box  <?php if($i==0): ?> border-left <?php endif; ?>">
                                    <?php $__currentLoopData = $flash_deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key >= $init && $key <= $end): ?>
                                            <?php
                                                $product = \App\Models\Product::find($flash_deal_product->product_id);
                                            ?>
                                            <?php if($product != null && $product->published != 0): ?>
                                                <?php
                                                    $product_url = route('product', $product->slug);
                                                    if($product->auction_product == 1) {
                                                        $product_url = route('auction-product', $product->slug);
                                                    }
                                                ?>
                                                <div class="h-100px h-md-200px h-lg-auto flash-deal-item position-relative text-center border-bottom <?php if($i!=4): ?> border-right <?php endif; ?> has-transition hov-shadow-out z-1">
                                                    <a href="<?php echo e($product_url); ?>" class="d-block py-md-3 overflow-hidden hov-scale-img" title="<?php echo e($product->getTranslation('name')); ?>">
                                                        <!-- Image -->
                                                        <img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>" class="lazyload h-60px h-md-100px h-lg-140px mw-100 mx-auto has-transition"
                                                             alt="<?php echo e($product->getTranslation('name')); ?>" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                                        <!-- Price -->
                                                        <?php if(Auth::user()): ?>
                                                            <div class="fs-10 fs-md-14 mt-md-3 text-center h-md-48px has-transition overflow-hidden pt-md-4 flash-deal-price">
                                                                <span class="d-block text-primary fw-700"><?php echo e(home_discounted_base_price($product)); ?></span>

                                                                <?php if(home_base_price($product) != home_discounted_base_price($product)): ?>

                                                                    <del class="d-block fw-400 text-secondary"><?php echo e(home_base_price($product)); ?></del>
                                                                <?php endif; ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if(!Auth::user()): ?>

                                                                <span class="d-block text-primary fw700"><a href="<?php echo e(route('user.login')); ?>">Login to see price</a></span>

                                                        <?php endif; ?>

                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        $init += 2;
                                        $end += 2;
                                    ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!--featered categort-->
    <?php if(count($featured_categories) > 0): ?>
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <div class="bg-white">
                    <!-- Top Section -->
                    <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                            <span class=""><?php echo e(translate('Featured Categories')); ?></span>
                        </h3>
                        <!-- Links -->
                        <div class="d-flex">
                            <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary" href="<?php echo e(route('categories.all')); ?>"><?php echo e(translate('View All Categories')); ?></a>
                        </div>
                    </div>
                </div>
                <!-- Categories -->
                <div class="bg-white px-sm-3">
                    <div class="row">
                        <?php $__currentLoopData = $featured_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-4 col-6 mb-3">
                                <div class="position-relative text-center has-transition hov-scale-img hov-animate-outline border-right border-top border-bottom <?php if($key == 0): ?> border-left <?php endif; ?>">
                                    <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="d-block">
                                        <img src="<?php echo e(uploaded_asset($category->banner)); ?>" class="lazyload h-130px mx-auto has-transition p-2 p-sm-4 mw-100"
                                             alt="<?php echo e($category->getTranslation('name')); ?>" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                    </a>
                                    <h6 class="text-dark mb-3 h-40px text-truncate-2">
                                        <a class="text-reset fw-700 fs-14 hov-text-primary" href="<?php echo e(route('products.category', $category->slug)); ?>" title="<?php echo e($category->getTranslation('name')); ?>"><?php echo e($category->getTranslation('name')); ?></a>
                                    </h6>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Cupon -->
    <?php if(get_setting('coupon_system') == 1): ?>
    <div class="mb-2 mb-md-3 mt-2 mt-md-3" style="background-color: <?php echo e(get_setting('cupon_background_color', '#292933')); ?>">
        <div class="container">
            <div class="row py-5">
                <div class="col-xl-8 text-center text-xl-left">
                    <div class="d-lg-flex">
                        <div class="mb-3 mb-lg-0">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="109.602" height="93.34" viewBox="0 0 109.602 93.34">
                                <defs>
                                  <clipPath id="clip-pathcup">
                                    <path id="Union_10" data-name="Union 10" d="M12263,13778v-15h64v-41h12v56Z" transform="translate(-11966 -8442.865)" fill="none" stroke="#fff" stroke-width="2"/>
                                  </clipPath>
                                </defs>
                                <g id="Group_24326" data-name="Group 24326" transform="translate(-274.201 -5254.611)">
                                  <g id="Mask_Group_23" data-name="Mask Group 23" transform="translate(-3652.459 1785.452) rotate(-45)" clip-path="url(#clip-pathcup)">
                                    <g id="Group_24322" data-name="Group 24322" transform="translate(207 18.136)">
                                      <g id="Subtraction_167" data-name="Subtraction 167" transform="translate(-12177 -8458)" fill="none">
                                        <path d="M12335,13770h-56a8.009,8.009,0,0,1-8-8v-8a8,8,0,0,0,0-16v-8a8.009,8.009,0,0,1,8-8h56a8.009,8.009,0,0,1,8,8v8a8,8,0,0,0,0,16v8A8.009,8.009,0,0,1,12335,13770Z" stroke="none"/>
                                        <path d="M 12335.0009765625 13768.0009765625 C 12338.3095703125 13768.0009765625 12341.0009765625 13765.30859375 12341.0009765625 13762 L 12341.0009765625 13755.798828125 C 12336.4423828125 13754.8701171875 12333.0009765625 13750.8291015625 12333.0009765625 13746 C 12333.0009765625 13741.171875 12336.4423828125 13737.130859375 12341.0009765625 13736.201171875 L 12341.0009765625 13729.9990234375 C 12341.0009765625 13726.6904296875 12338.3095703125 13723.9990234375 12335.0009765625 13723.9990234375 L 12278.9990234375 13723.9990234375 C 12275.6904296875 13723.9990234375 12272.9990234375 13726.6904296875 12272.9990234375 13729.9990234375 L 12272.9990234375 13736.201171875 C 12277.5576171875 13737.1298828125 12280.9990234375 13741.1708984375 12280.9990234375 13746 C 12280.9990234375 13750.828125 12277.5576171875 13754.869140625 12272.9990234375 13755.798828125 L 12272.9990234375 13762 C 12272.9990234375 13765.30859375 12275.6904296875 13768.0009765625 12278.9990234375 13768.0009765625 L 12335.0009765625 13768.0009765625 M 12335.0009765625 13770.0009765625 L 12278.9990234375 13770.0009765625 C 12274.587890625 13770.0009765625 12270.9990234375 13766.412109375 12270.9990234375 13762 L 12270.9990234375 13754 C 12275.4111328125 13753.9990234375 12278.9990234375 13750.4111328125 12278.9990234375 13746 C 12278.9990234375 13741.5888671875 12275.41015625 13738 12270.9990234375 13738 L 12270.9990234375 13729.9990234375 C 12270.9990234375 13725.587890625 12274.587890625 13721.9990234375 12278.9990234375 13721.9990234375 L 12335.0009765625 13721.9990234375 C 12339.412109375 13721.9990234375 12343.0009765625 13725.587890625 12343.0009765625 13729.9990234375 L 12343.0009765625 13738 C 12338.5888671875 13738.0009765625 12335.0009765625 13741.5888671875 12335.0009765625 13746 C 12335.0009765625 13750.4111328125 12338.58984375 13754 12343.0009765625 13754 L 12343.0009765625 13762 C 12343.0009765625 13766.412109375 12339.412109375 13770.0009765625 12335.0009765625 13770.0009765625 Z" stroke="none" fill="#fff"/>
                                      </g>
                                    </g>
                                  </g>
                                  <g id="Group_24321" data-name="Group 24321" transform="translate(-3514.477 1653.317) rotate(-45)">
                                    <g id="Subtraction_167-2" data-name="Subtraction 167" transform="translate(-12177 -8458)" fill="none">
                                      <path d="M12335,13770h-56a8.009,8.009,0,0,1-8-8v-8a8,8,0,0,0,0-16v-8a8.009,8.009,0,0,1,8-8h56a8.009,8.009,0,0,1,8,8v8a8,8,0,0,0,0,16v8A8.009,8.009,0,0,1,12335,13770Z" stroke="none"/>
                                      <path d="M 12335.0009765625 13768.0009765625 C 12338.3095703125 13768.0009765625 12341.0009765625 13765.30859375 12341.0009765625 13762 L 12341.0009765625 13755.798828125 C 12336.4423828125 13754.8701171875 12333.0009765625 13750.8291015625 12333.0009765625 13746 C 12333.0009765625 13741.171875 12336.4423828125 13737.130859375 12341.0009765625 13736.201171875 L 12341.0009765625 13729.9990234375 C 12341.0009765625 13726.6904296875 12338.3095703125 13723.9990234375 12335.0009765625 13723.9990234375 L 12278.9990234375 13723.9990234375 C 12275.6904296875 13723.9990234375 12272.9990234375 13726.6904296875 12272.9990234375 13729.9990234375 L 12272.9990234375 13736.201171875 C 12277.5576171875 13737.1298828125 12280.9990234375 13741.1708984375 12280.9990234375 13746 C 12280.9990234375 13750.828125 12277.5576171875 13754.869140625 12272.9990234375 13755.798828125 L 12272.9990234375 13762 C 12272.9990234375 13765.30859375 12275.6904296875 13768.0009765625 12278.9990234375 13768.0009765625 L 12335.0009765625 13768.0009765625 M 12335.0009765625 13770.0009765625 L 12278.9990234375 13770.0009765625 C 12274.587890625 13770.0009765625 12270.9990234375 13766.412109375 12270.9990234375 13762 L 12270.9990234375 13754 C 12275.4111328125 13753.9990234375 12278.9990234375 13750.4111328125 12278.9990234375 13746 C 12278.9990234375 13741.5888671875 12275.41015625 13738 12270.9990234375 13738 L 12270.9990234375 13729.9990234375 C 12270.9990234375 13725.587890625 12274.587890625 13721.9990234375 12278.9990234375 13721.9990234375 L 12335.0009765625 13721.9990234375 C 12339.412109375 13721.9990234375 12343.0009765625 13725.587890625 12343.0009765625 13729.9990234375 L 12343.0009765625 13738 C 12338.5888671875 13738.0009765625 12335.0009765625 13741.5888671875 12335.0009765625 13746 C 12335.0009765625 13750.4111328125 12338.58984375 13754 12343.0009765625 13754 L 12343.0009765625 13762 C 12343.0009765625 13766.412109375 12339.412109375 13770.0009765625 12335.0009765625 13770.0009765625 Z" stroke="none" fill="#fff"/>
                                    </g>
                                    <g id="Group_24325" data-name="Group 24325">
                                      <rect id="Rectangle_18578" data-name="Rectangle 18578" width="8" height="2" transform="translate(120 5287)" fill="#fff"/>
                                      <rect id="Rectangle_18579" data-name="Rectangle 18579" width="8" height="2" transform="translate(132 5287)" fill="#fff"/>
                                      <rect id="Rectangle_18581" data-name="Rectangle 18581" width="8" height="2" transform="translate(144 5287)" fill="#fff"/>
                                      <rect id="Rectangle_18580" data-name="Rectangle 18580" width="8" height="2" transform="translate(108 5287)" fill="#fff"/>
                                    </g>
                                  </g>
                                </g>
                            </svg>
                        </div>
                        <div class="ml-lg-3">
                            <h5 class="fs-36 fw-400 text-white mb-3"><?php echo e(translate(get_setting('cupon_title'))); ?></h5>
                            <h5 class="fs-20 fw-400 text-gray"><?php echo e(translate(get_setting('cupon_subtitle'))); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 text-center text-xl-right mt-4">
                    <a href="<?php echo e(route('coupons.all')); ?>" class="btn text-white hov-bg-white hov-text-dark border border-width-2 fs-16 px-4" style="border-radius: 28px;background: rgba(255, 255, 255, 0.2);box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.16);"><?php echo e(translate('View All Coupons')); ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>






    <!-- Top Brands -->
    <?php if(get_setting('top_brands') != null): ?>
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0"><?php echo e(translate('Top Brands')); ?></h3>
                    <!-- Links -->
                    <div class="d-flex">
                        <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary" href="<?php echo e(route('brands.all')); ?>"><?php echo e(translate('View All Brands')); ?></a>
                    </div>
                </div>
                <!-- Brands Section -->
                <div class="bg-white px-3">
                    <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-3 gutters-16 border-top border-left">
                        <?php $top_brands = json_decode(get_setting('top_brands')); ?>
                        <?php $__currentLoopData = $top_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $brand = \App\Models\Brand::find($value); ?>
                            <?php if($brand != null): ?>
                                <div class="col text-center border-right border-bottom hov-scale-img has-transition hov-shadow-out z-1">
                                    <a href="<?php echo e(route('products.brand', $brand->slug)); ?>" class="d-block p-sm-3">
                                        <img src="<?php echo e(uploaded_asset($brand->logo)); ?>" class="lazyload h-md-100px mx-auto has-transition p-2 p-sm-4 mw-100"
                                            alt="<?php echo e($brand->getTranslation('name')); ?>" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                        <p class="text-center text-dark fs-12 fs-md-14 fw-700 mt-2"><?php echo e($brand->getTranslation('name')); ?></p>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){

            $.post('<?php echo e(route('home.section.auction_products')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\projects\Multipurcdrop\resources\views/frontend/index.blade.php ENDPATH**/ ?>