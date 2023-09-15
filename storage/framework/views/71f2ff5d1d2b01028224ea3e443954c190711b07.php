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
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/sweetalert/sweetalert2.min.css')); ?>">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/style.css')); ?>"><!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/responsive.css')); ?>">
    <!-- Responsive CSS -->
    <link rel="stylesheet"
        href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/timepicker/jquery.timepicker.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/datatables/dataTables.bootstrap5.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/datatables/buttons.dataTables.min.css')); ?>">

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/jquery/jquery.min.js')); ?>"></script><!-- jQuery JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script><!-- Bootstrap JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/toastr/toastr.min.js')); ?>"></script><!-- Toastr JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/sweetalert/sweetalert2.min.js')); ?>"></script><!-- Sweetalert JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/chartjs/chart_3.9.1.min.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/jquery.dataTables.min.js')); ?>"></script><!-- Datatables JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/dataTables.bootstrap5.min.js')); ?>"></script><!-- Datatables Bootstrap5 JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/dataTables.buttons.min.js')); ?>"></script><!-- Datatables Buttons JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/jszip.min.js')); ?>"></script><!-- Datatables Excel Buttons JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/pdfmake.min.js')); ?>"></script><!-- Datatables Make PDF Buttons JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/vfs_fonts.js')); ?>"></script><!-- Datatables Export PDF Buttons JS -->
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/datatables/buttons.html5.min.js')); ?>"></script><!-- Datatables Buttons HTML5 JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
</head>
<body class="posbody">
 
<?php echo $__env->make('admin.layout.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    
    
    <script>
        var are_you_sure = "<?php echo e(trans('messages.are_you_sure')); ?>";
        var yes = "<?php echo e(trans('messages.yes')); ?>";
        var no = "<?php echo e(trans('messages.no')); ?>";
        var cancel = "<?php echo e(trans('labels.cancel')); ?>";
        let wrong = "<?php echo e(trans('messages.wrong')); ?>";
        let env = "<?php echo e(env('Environment')); ?>";
        toastr.options = {
            "closeButton": true,
            "positionClass": "toast-top-right",
        }
        <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

        <?php if(Auth::user()->type == 2): ?>
            // New Notification
            var noticount = 0;
            var notificationurl = "<?php echo e(URL::to('/admin/getorder')); ?>";
            var vendoraudio =
                "<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/notification/' . helper::appdata(Auth::user()->id)->notification_sound)); ?>";
        <?php endif; ?>
    </script>
        <?php if(Auth::user()->type == 2): ?>
            <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/sound.js')); ?>"></script>
        <?php endif; ?>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/common.js')); ?>"></script><!-- Common JS -->
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /home/mostafa/small_store/new_full_store/resources/views/admin/layout/pos_header.blade.php ENDPATH**/ ?>