

<?php $__env->startSection('content'); ?>
    <section class="gry-bg py-6">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 mx-auto">
                        <div class="card shadow-none rounded-0 border">
                            <div class="row">
                                <!-- Left Side -->
                                <div class="col-lg-6 col-md-7 p-4 p-lg-5">
                                    <!-- Titles -->
                                    <div class="text-center">
                                        <h1 class="fs-20 fs-md-24 fw-700 text-primary"><?php echo e(translate('Welcome Back !')); ?></h1>
                                        <h5 class="fs-14 fw-400 text-dark"><?php echo e(translate('Login to your account')); ?></h5>
                                    </div>
                                    <!-- Login form -->
                                    <div class="pt-3 pt-lg-4">
                                        <div class="">
                                            <form class="form-default" role="form" action="<?php echo e(route('login')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                
                                                <!-- Email or Phone -->
                                                <?php if(addon_is_activated('otp_system')): ?>
                                                    <div class="form-group phone-form-group mb-1">
                                                        <label for="phone" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Phone')); ?></label>
                                                        <input type="tel" id="phone-code" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?> rounded-0" value="<?php echo e(old('phone')); ?>" placeholder="" name="phone" autocomplete="off">
                                                    </div>

                                                    <input type="hidden" name="country_code" value="">
                                                    
                                                    <div class="form-group email-form-group mb-1 d-none">
                                                        <label for="email" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Email')); ?></label>
                                                        <input type="email" class="form-control rounded-0 <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('johndoe@example.com')); ?>" name="email" id="email" autocomplete="off">
                                                        <?php if($errors->has('email')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                    <div class="form-group text-right">
                                                        <button class="btn btn-link p-0 text-primary" type="button" onclick="toggleEmailPhone(this)"><i>*<?php echo e(translate('Use Email Instead')); ?></i></button>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="form-group">
                                                        <label for="email" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Email')); ?></label>
                                                        <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?> rounded-0" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('johndoe@example.com')); ?>" name="email" id="email" autocomplete="off">
                                                        <?php if($errors->has('email')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                    
                                                <!-- password -->
                                                <div class="form-group">
                                                    <label for="password" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Password')); ?></label>
                                                    <input type="password" class="form-control rounded-0 <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(translate('Password')); ?>" name="password" id="password">
                                                </div>

                                                <div class="row mb-2">
                                                    <!-- Remember Me -->
                                                    <div class="col-6">
                                                        <label class="aiz-checkbox">
                                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                            <span class="has-transition fs-12 fw-400 text-gray-dark hov-text-primary"><?php echo e(translate('Remember Me')); ?></span>
                                                            <span class="aiz-square-check"></span>
                                                        </label>
                                                    </div>
                                                    <!-- Forgot password -->
                                                    <div class="col-6 text-right">
                                                        <a href="<?php echo e(route('password.request')); ?>" class="text-reset fs-12 fw-400 text-gray-dark hov-text-primary"><u><?php echo e(translate('Forgot password?')); ?></u></a>
                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mb-4 mt-4">
                                                    <button type="submit" class="btn btn-primary btn-block fw-700 fs-14 rounded-4"><?php echo e(translate('Login')); ?></button>
                                                </div>
                                            </form>

                                            <!-- DEMO MODE -->
                                            <?php if(env("DEMO_MODE") == "On"): ?>
                                                <div class="mb-4">
                                                    <table class="table table-bordered mb-0">
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td><?php echo e(translate('Customer Account')); ?></td>
                                                                <td>
                                                                    <button class="btn btn-info btn-sm" onclick="autoFillCustomer()"><?php echo e(translate('Copy credentials')); ?></button>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Social Login -->
                                            <?php if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1 || get_setting('apple_login') == 1): ?>
                                                <div class="text-center mb-3">
                                                    <span class="bg-white fs-12 text-gray"><?php echo e(translate('Or Login With')); ?></span>
                                                </div>
                                                <ul class="list-inline social colored text-center mb-4">
                                                    <?php if(get_setting('facebook_login') == 1): ?>
                                                        <li class="list-inline-item">
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>" class="facebook">
                                                                <i class="lab la-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if(get_setting('google_login') == 1): ?>
                                                        <li class="list-inline-item">
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="google">
                                                                <i class="lab la-google"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if(get_setting('twitter_login') == 1): ?>
                                                        <li class="list-inline-item">
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>" class="twitter">
                                                                <i class="lab la-twitter"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if(get_setting('apple_login') == 1): ?>
                                                        <li class="list-inline-item">
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'apple'])); ?>"
                                                                class="apple">
                                                                <i class="lab la-apple"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Register Now -->
                                        <div class="text-center">
                                            <p class="fs-12 text-gray mb-0"><?php echo e(translate('Dont have an account?')); ?></p>
                                            <a href="<?php echo e(route('user.registration')); ?>" class="fs-14 fw-700 animate-underline-primary"><?php echo e(translate('Register Now')); ?></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Right Side Image -->
                                <div class="col-lg-6 col-md-5 py-3 py-md-0">
                                    <img src="<?php echo e(uploaded_asset(get_setting('login_page_image'))); ?>" alt="" class="img-fit h-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if(country.iso2 == 'bd'){
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "<?php echo e(static_asset('assets/js/intlTelutils.js')); ?>?1590403638580",
            onlyCountries: <?php echo json_encode(\App\Models\Country::where('status', 1)->pluck('code')->toArray()) ?>,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if(selectedCountryData.iso2 == 'bd'){
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                $('input[name=phone]').val(null);
                isPhoneShown = false;
                $(el).html('<i>*<?php echo e(translate('Use Phone Number Instead')); ?></i>');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                $('input[name=email]').val(null);
                isPhoneShown = true;
                $(el).html('<i>*<?php echo e(translate('Use Email Instead')); ?></i>');
            }
        }

        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }

        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }
        
        function autoFillDeliveryBoy(){
            $('#email').val('deliveryboy@example.com');
            $('#password').val('123456');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tamim\Documents\projects\multipurcdrop\resources\views/frontend/user_login.blade.php ENDPATH**/ ?>