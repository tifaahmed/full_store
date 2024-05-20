<!DOCTYPE html>
<html lang="en" dir="<?php echo e(session()->get('direction') == 2 ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:title" content="<?php echo e(helper::appdata('')->meta_title); ?>" />
    <meta property="og:description" content="<?php echo e(helper::appdata('')->meta_description); ?>" />
    <meta property="og:image" content="<?php echo e(helper::image_path(helper::appdata('')->og_image)); ?>" />
    <link rel="icon" href="<?php echo e(helper::image_path(helper::appdata('')->favicon)); ?>" type="image" sizes="16x16">
    <title><?php echo e(helper::appdata('')->website_title); ?></title>
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/bootstrap/bootstrap.min.css')); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/fontawesome/all.min.css')); ?>">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/toastr/toastr.min.css')); ?>">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/style.css')); ?>"><!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/responsive.css')); ?>">
    <!-- Responsive CSS -->
    <!-- IF VERSION 2  -->
    <?php if(helper::appdata('')->recaptcha_version == 'v2'): ?>
    <script src='https://www.google.com/recaptcha/api.js'></script> 
    <?php endif; ?>
    <!-- IF VERSION 3  -->
    <?php if(helper::appdata('')->recaptcha_version == 'v3'): ?>
    <?php echo RecaptchaV3::initJs(); ?>

    <?php endif; ?>
</head>
<body>
    <?php echo $__env->make('admin.layout.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/jquery/jquery.min.js')); ?>"></script><!-- jQuery JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script><!-- Bootstrap JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/toastr/toastr.min.js')); ?>"></script><!-- Toastr JS -->
    <script>
        toastr.options = {
          "closeButton": true,
          "timeOut": "500",
          "showEasing": "swing", // Set your desired timeout here (in milliseconds)
          "positionClass": "toast-bottom-right",
          
        }
        <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>
        $(window).on("load", function() {
          "use strict";
          $('#preloader').fadeOut('slow')
        });
        function myFunction() {
          // "use strict";
        //   toastr.error("This operation was not performed due to demo mode");
        //   return false;
        }

        $('#name').on('blur', function() {
          "use strict";
          $('#slug').val($('#name').val().split(" ").join("-").toLowerCase());
        });
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/admin/layout/auth_default.blade.php ENDPATH**/ ?>