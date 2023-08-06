<?php $__env->startSection('content'); ?>

    <!-- Steps -->
    <section class="pt-5 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row gutters-5 sm-gutters-10">
                        <div class="col done">
                            <div class="text-center border border-bottom-6px p-2 text-success">
                                <i class="la-3x mb-2 las la-shopping-cart"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('1. My Cart')); ?></h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center border border-bottom-6px p-2 text-success">
                                <i class="la-3x mb-2 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('2. Shipping info')); ?>

                                </h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center border border-bottom-6px p-2 text-success">
                                <i class="la-3x mb-2 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('4. Payment')); ?></h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center border border-bottom-6px p-2 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32.001" viewBox="0 0 32 32.001" class="cart-rotate mb-3 mt-1">
                                    <g id="Group_23976" data-name="Group 23976" transform="translate(-282 -404.889)">
                                      <path class="cart-ok has-transition" id="Path_28723" data-name="Path 28723" d="M313.283,409.469a1,1,0,0,0-1.414,0l-14.85,14.85-5.657-5.657a1,1,0,1,0-1.414,1.414l6.364,6.364a1,1,0,0,0,1.414,0l.707-.707,14.85-14.849A1,1,0,0,0,313.283,409.469Z" fill="#ffffff"/>
                                      <g id="LWPOLYLINE">
                                        <path id="Path_28724" data-name="Path 28724" d="M313.372,416.451,311.72,418.1a14,14,0,1,1-5.556-8.586l1.431-1.431a16,16,0,1,0,5.777,8.365Z" fill="#d43533"/>
                                      </g>
                                    </g>
                                </svg>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('5. Confirmation')); ?>

                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Confirmation -->
    <section class="py-4">
        <div class="container text-left">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <?php
                        $first_order = $combined_order->orders->first()
                    ?>
                    <!-- Order Confirmation Text-->
                    <div class="text-center py-4 mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" class=" mb-3">
                            <g id="Group_23983" data-name="Group 23983" transform="translate(-978 -481)">
                              <circle id="Ellipse_44" data-name="Ellipse 44" cx="18" cy="18" r="18" transform="translate(978 481)" fill="#85b567"/>
                              <g id="Group_23982" data-name="Group 23982" transform="translate(32.439 8.975)">
                                <rect id="Rectangle_18135" data-name="Rectangle 18135" width="11" height="3" rx="1.5" transform="translate(955.43 487.707) rotate(45)" fill="#fff"/>
                                <rect id="Rectangle_18136" data-name="Rectangle 18136" width="3" height="18" rx="1.5" transform="translate(971.692 482.757) rotate(45)" fill="#fff"/>
                              </g>
                            </g>
                        </svg>
                        <h1 class="mb-2 fs-28 fw-500 text-success"><?php echo e(translate('Thank You for Your Order!')); ?></h1>
                        <p class="fs-13 text-soft-dark"><?php echo e(translate('A copy or your order summary has been sent to')); ?> <strong><?php echo e(json_decode($first_order->shipping_address)->email); ?></strong></p>
                    </div>
                    <!-- Order Summary -->
                    <div class="mb-4 bg-white p-4 border">
                        <h5 class="fw-600 mb-3 fs-16 text-soft-dark pb-2 border-bottom"><?php echo e(translate('Order Summary')); ?></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table fs-14 text-soft-dark">
                                    <tr>
                                        <td class="w-50 fw-600 border-top-0 pl-0 py-2"><?php echo e(translate('Order date')); ?>:</td>
                                        <td class="border-top-0 py-2"><?php echo e(date('d-m-Y H:i A', $first_order->date)); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600 border-top-0 pl-0 py-2"><?php echo e(translate('Name')); ?>:</td>
                                        <td class="border-top-0 py-2"><?php echo e(json_decode($first_order->shipping_address)->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600 border-top-0 pl-0 py-2"><?php echo e(translate('Email')); ?>:</td>
                                        <td class="border-top-0 py-2"><?php echo e(json_decode($first_order->shipping_address)->email); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600 border-top-0 pl-0 py-2"><?php echo e(translate('Shipping address')); ?>:</td>
                                        <td class="border-top-0 py-2"><?php echo e(json_decode($first_order->shipping_address)->address); ?>, <?php echo e(json_decode($first_order->shipping_address)->city); ?>, <?php echo e(json_decode($first_order->shipping_address)->country); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <td class="w-50 fw-600 border-top-0 py-2"><?php echo e(translate('Order status')); ?>:</td>
                                        <td class="border-top-0 pr-0 py-2"><?php echo e(translate(ucfirst(str_replace('_', ' ', $first_order->delivery_status)))); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600 border-top-0 py-2"><?php echo e(translate('Total order amount')); ?>:</td>
                                        <td class="border-top-0 pr-0 py-2"><?php echo e(single_price($combined_order->grand_total)); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600 border-top-0 py-2"><?php echo e(translate('Shipping')); ?>:</td>
                                        <td class="border-top-0 pr-0 py-2"><?php echo e(translate('Flat shipping rate')); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600 border-top-0 py-2"><?php echo e(translate('Payment method')); ?>:</td>
                                        <td class="border-top-0 pr-0 py-2"><?php echo e(translate(ucfirst(str_replace('_', ' ', $first_order->payment_type)))); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Info -->
                    <?php $__currentLoopData = $combined_order->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card shadow-none border rounded-0">
                            <div class="card-body">
                                <!-- Order Code -->
                                <div class="text-center py-1 mb-4">
                                    <h2 class="h5 fs-20"><?php echo e(translate('Order Code:')); ?> <span class="fw-700 text-primary"><?php echo e($order->code); ?></span></h2>
                                </div>
                                <!-- Order Details -->
                                <div>
                                    <h5 class="fw-600 text-soft-dark mb-3 fs-16 pb-2"><?php echo e(translate('Order Details')); ?></h5>
                                    <!-- Product Details -->
                                    <div>
                                        <table class="table table-responsive-md text-soft-dark fs-14">
                                            <thead>
                                                <tr>
                                                    <th class="opacity-60 border-top-0 pl-0">#</th>
                                                    <th class="opacity-60 border-top-0" width="30%"><?php echo e(translate('Product')); ?></th>
                                                    <th class="opacity-60 border-top-0"><?php echo e(translate('Variation')); ?></th>
                                                    <th class="opacity-60 border-top-0"><?php echo e(translate('Quantity')); ?></th>
                                                    <th class="opacity-60 border-top-0"><?php echo e(translate('Delivery Type')); ?></th>
                                                    <th class="text-right opacity-60 border-top-0 pr-0"><?php echo e(translate('Price')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="border-top-0 border-bottom pl-0"><?php echo e($key+1); ?></td>
                                                        <td class="border-top-0 border-bottom">
                                                            <?php if($orderDetail->product != null): ?>
                                                                <a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank" class="text-reset">
                                                                    <?php echo e($orderDetail->product->getTranslation('name')); ?>

                                                                    <?php
                                                                        if($orderDetail->combo_id != null) {
                                                                            $combo = \App\ComboProduct::findOrFail($orderDetail->combo_id);

                                                                            echo '('.$combo->combo_title.')';
                                                                        }
                                                                    ?>
                                                                </a>
                                                            <?php else: ?>
                                                                <strong><?php echo e(translate('Product Unavailable')); ?></strong>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="border-top-0 border-bottom">
                                                            <?php echo e($orderDetail->variation); ?>

                                                        </td>
                                                        <td class="border-top-0 border-bottom">
                                                            <?php echo e($orderDetail->quantity); ?>

                                                        </td>
                                                        <td class="border-top-0 border-bottom">
                                                            <?php if($order->shipping_type != null && $order->shipping_type == 'home_delivery'): ?>
                                                                <?php echo e(translate('Home Delivery')); ?>

                                                            <?php elseif($order->shipping_type != null && $order->shipping_type == 'carrier'): ?>
                                                                <?php echo e(translate('Carrier')); ?>

                                                            <?php elseif($order->shipping_type == 'pickup_point'): ?>
                                                                <?php if($order->pickup_point != null): ?>
                                                                    <?php echo e($order->pickup_point->getTranslation('name')); ?> (<?php echo e(translate('Pickip Point')); ?>)
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="border-top-0 border-bottom pr-0 text-right"><?php echo e(single_price($orderDetail->price)); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Order Amounts -->
                                    <div class="row">
                                        <div class="col-xl-5 col-md-6 ml-auto mr-0">
                                            <table class="table ">
                                                <tbody>
                                                    <!-- Subtotal -->
                                                    <tr>
                                                        <th class="border-top-0 py-2"><?php echo e(translate('Subtotal')); ?></th>
                                                        <td class="text-right border-top-0 pr-0 py-2">
                                                            <span class="fw-600"><?php echo e(single_price($order->orderDetails->sum('price'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <!-- Shipping -->
                                                    <tr>
                                                        <th class="border-top-0 py-2"><?php echo e(translate('Shipping')); ?></th>
                                                        <td class="text-right border-top-0 pr-0 py-2">
                                                            <span><?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <!-- Tax -->
                                                    <tr>
                                                        <th class="border-top-0 py-2"><?php echo e(translate('Tax')); ?></th>
                                                        <td class="text-right border-top-0 pr-0 py-2">
                                                            <span><?php echo e(single_price($order->orderDetails->sum('tax'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <!-- Coupon Discount -->
                                                    <tr>
                                                        <th class="border-top-0 py-2"><?php echo e(translate('Coupon Discount')); ?></th>
                                                        <td class="text-right border-top-0 pr-0 py-2">
                                                            <span><?php echo e(single_price($order->coupon_discount)); ?></span>
                                                        </td>
                                                    </tr>
                                                    <!-- Total -->
                                                    <tr>
                                                        <th class="py-2"><span class="fw-600"><?php echo e(translate('Total')); ?></span></th>
                                                        <td class="text-right pr-0">
                                                            <strong><span><?php echo e(single_price($order->grand_total)); ?></span></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tamim\Documents\projects\multipurcdrop\resources\views/frontend/order_confirmed.blade.php ENDPATH**/ ?>