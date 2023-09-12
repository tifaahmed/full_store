<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="<?php echo e(helper::appdata('')->meta_title); ?>" />
    <meta property="og:description" content="<?php echo e(helper::appdata('')->meta_description); ?>" />
    <meta property="og:image" content='<?php echo e(helper::image_path(helper::appdata('')->og_image)); ?>' />
    <link rel="icon" href="<?php echo e(helper::image_path(helper::appdata('')->favicon)); ?>" type="image" sizes="16x16">
    <title> <?php echo e(helper::appdata('')->website_title); ?> </title>
    <!-- Font Family Poppins -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/poppins.css')); ?>">

    <!-- Error Css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'admin-assets/css/error.css')); ?>">

    <!-- Error Responsive -->
    
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'admin-assets/css/error-responsive.css')); ?>">

</head>

<body>
    <div class="errorpage">
        <div>
            <h1>Oops!</h1>
            <b>404 - Page not Found</b>
            <p class="subtitle">Page you are looking for doesn't exit or an other error ocurred or temporarily unavailable.</p>
            <a href="<?php echo e(URL::to('/')); ?>" class="btn btn-primary">Go To Homepage</a>
        </div>
    </div>
</body>

</html><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>