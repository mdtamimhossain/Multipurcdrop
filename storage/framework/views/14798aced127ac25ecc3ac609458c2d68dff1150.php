

<?php $__env->startSection('content'); ?>
    <section class="gry-bg py-6">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="card shadow-none rounded-0 border">
                            <div class="row">
                                <!-- Left Side -->
                                <div class="col-lg-6 col-md-7 p-4 p-lg-5">
                                    <!-- Titles -->
                                    <div class="text-center">
                                        <h1 class="fs-20 fs-md-24 fw-700 text-primary"><?php echo e(translate('Create an account')); ?></h1>
                                    </div>
                                    <!-- Register form -->
                                    <div class="pt-3 pt-lg-4">
                                        <div class="">
                                            <form id="reg-form" class="form-default" role="form" action="<?php echo e(route('register')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <!-- Name -->
                                                <div class="form-group">
                                                    <label for="name" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Full Name')); ?></label>
                                                    <input type="text" class="form-control rounded-0<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(translate('Full Name')); ?>" name="name">
                                                    <?php if($errors->has('name')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Email and Phone -->
                                                    <div class="form-group">
                                                        <label for="email" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Email')); ?></label>
                                                        <input type="email" class="form-control rounded-0<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email" required>
                                                        <?php if($errors->has('email')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <div class="form-group phone-form-group mb-1">
                                                    <label for="phone" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Phone')); ?></label>
                                                    <input type="tel" id="phone-code" class="form-control rounded-0<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('phone')); ?>" placeholder="" name="phone" autocomplete="off" required>
                                                </div>

                                                <input type="hidden" name="country_code" value="">


                                                <!-- password -->
                                                <div class="form-group">
                                                    <label for="password" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Password')); ?></label>
                                                    <input type="password" class="form-control rounded-0<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(translate('Password')); ?>" name="password">
                                                    <div class="text-right mt-1">
                                                        <span class="fs-12 fw-400 text-gray-dark"><?php echo e(translate('Password must contain at least 6 digits')); ?></span>
                                                    </div>
                                                    <?php if($errors->has('password')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- password Confirm -->
                                                <div class="form-group">
                                                    <label for="password_confirmation" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Confirm Password')); ?></label>
                                                    <input type="password" class="form-control rounded-0" placeholder="<?php echo e(translate('Confirm Password')); ?>" name="password_confirmation">
                                                </div>

                                                <!-- Recaptcha -->
                                                <?php if(get_setting('google_recaptcha') == 1): ?>
                                                    <div class="form-group">
                                                        <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>"></div>
                                                    </div>
                                                    <?php if($errors->has('g-recaptcha-response')): ?>
                                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                                            <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <!-- Terms and Conditions -->
                                                <div class="mb-3">
                                                    <label class="aiz-checkbox">
                                                        <input type="checkbox" name="checkbox_example_1" required>
                                                        <span class=""><?php echo e(translate('By signing up you agree to our ')); ?> <a href="<?php echo e(route('terms')); ?>" class="fw-500"><?php echo e(translate('terms and conditions.')); ?></a></span>
                                                        <span class="aiz-square-check"></span>
                                                    </label>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mb-4 mt-4">
                                                    <button type="submit" class="btn btn-primary btn-block fw-600 rounded-4"><?php echo e(translate('Create Account')); ?></button>
                                                </div>
                                            </form>

                                            <!-- Social Login -->
                                            <?php if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1 || get_setting('apple_login') == 1): ?>
                                                <div class="text-center mb-3">
                                                    <span class="bg-white fs-12 text-gray"><?php echo e(translate('Or Join With')); ?></span>
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
                                                            <a href="<?php echo e(route('social.login', ['provider' => 'apple'])); ?>" class="apple">
                                                                <i class="lab la-apple"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Log In -->
                                        <div class="text-center">
                                            <p class="fs-12 text-gray mb-0"><?php echo e(translate('Already have an account?')); ?></p>
                                            <a href="<?php echo e(route('user.login')); ?>" class="fs-14 fw-700 animate-underline-primary"><?php echo e(translate('Log In')); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Side Image -->
                                <div class="col-lg-6 col-md-5 py-3 py-md-0">
                                    <img src="<?php echo e(uploaded_asset(get_setting('register_page_image'))); ?>" alt="" class="img-fit h-100">
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
    <?php if(get_setting('google_recaptcha') == 1): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>

    <script type="text/javascript">

        <?php if(get_setting('google_recaptcha') == 1): ?>
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are humann!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });
        <?php endif; ?>

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
                isPhoneShown = false;
                $(el).html('<i>*<?php echo e(translate('Use Phone Number Instead')); ?></i>');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                isPhoneShown = true;
                $(el).html('*<?php echo e(translate('Use Email Instead')); ?>');
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\projects\Multipurcdrop\resources\views/frontend/user_registration.blade.php ENDPATH**/ ?>