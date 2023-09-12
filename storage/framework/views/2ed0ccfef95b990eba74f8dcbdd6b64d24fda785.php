<!DOCTYPE html>
<html lang="en" dir="<?php echo e(session()->get('direction') == 2 ? 'rtl' : 'ltr'); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?php echo e(helper::appdata('')->meta_title); ?>" />
    <meta property="og:description" content="<?php echo e(helper::appdata('')->meta_description); ?>" />
    <meta property="og:image" content='<?php echo e(helper::image_path(helper::appdata('')->og_image)); ?>' />
    <link rel="icon" type="image" sizes="16x16" href="<?php echo e(helper::image_path(helper::appdata('')->favicon)); ?>"><!-- Favicon icon -->
    <title><?php echo e(helper::appdata('')->landing_website_title); ?></title>
    <!-- Font Awesome icon css-->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'landing/css/all.min.css')); ?>">

    <!-- owl carousel css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'landing/css/owl.carousel.min.css')); ?>">

    <!-- owl carousel css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'landing/css/owl.theme.default.min.css')); ?>">

    <!-- Poppins fonts -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'landing/fonts/poppins.css')); ?>">

    <!-- bootstrap-icons css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'landing/css/bootstrap-icons.css')); ?>">

    <!-- bootstrap css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'landing/css/bootstrap.min.css')); ?>">

    <!-- style css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'landing/css/style.css')); ?>">

    <!-- responsive css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL').'landing/css/responsive.css')); ?>">
    <style>
        :root {

            /* Color */
            --bs-primary: <?php echo e(helper::appdata('')->primary_color); ?>;
            --bs-secondary : <?php echo e(helper::appdata('')->secondary_color); ?>;

        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>
    <?php echo $__env->make('landing.layout.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('landing.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div>
      
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('landing.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Modal -->
    <div class="d-flex align-items-center float-end">
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content search-modal-content rounded-5">
                    <div class="modal-header border-0 px-4 align-items-center">
                        <h3 class="page-title mb-0 d-block d-md-none">search</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 mb-0">
                        <form class="" action="<?php echo e(URL::to('stores')); ?>" method="get">

                            <div class="col-12">
                                <div class="row align-items-center justify-content-between">

                                    <div class="col-6 d-none d-lg-block">
                                        <div class="Search-left-img">
                                            <img src="<?php echo e(url(env('ASSETSPATHURL').'landing/images/search.webp')); ?>" alt="search-left-img" class="w-100 object-fit-cover search-left-img">
                                        </div>
                                    </div>


                                    <div class="col-12 col-lg-6">
                                        <div class="search-content text-capitalize">
                                            <h4 class="fs-2 text-dark fw-bolder mb-2 d-none d-md-block"><?php echo e(trans('labels.search')); ?></h4>
                                            <p class="fs-6"><?php echo e(trans('labels.search_title')); ?></p>
                                        </div>


                                        <select name="city" id="city" class="py-2 input-width px-2 mt-4 mb-1 w-100 border rounded-5 fs-7">
                                            <option value="" data-value="<?php echo e(URL::to('/stores?city=' . '&area=' . request()->get('area'))); ?>" data-id="0" selected><?php echo e(trans('landing.select_city')); ?></option>

                                            <?php $__currentLoopData = helper::get_city(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($city->name); ?>" data-value="<?php echo e(URL::to('/stores?city=' . request()->get('city') . '&area=' . request()->get('area'))); ?>" data-id=<?php echo e($city->id); ?> <?php echo e(request()->get('city') == $city->name ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <select name="area" id="area" class="py-2 input-width px-2 mt-2 mb-1 w-100 border rounded-5 fs-7">
                                            <option value=""><?php echo e(trans('landing.select_area')); ?></option>
                                            <?php if(request()->get('area')): ?>
                                            <option value="<?php echo e(request()->get('area')); ?>" selected><?php echo e(request()->get('area')); ?></option>
                                            <?php endif; ?>


                                        </select>

                                        <div class="search-btn-group">
                                            <div class="d-flex justify-content-between align-items-center mt-5">
                                                <a type="submit" class="btn-primary bg-danger w-100 rounded-3 rounded-3 m-1 text-center" data-bs-dismiss="modal"><?php echo e(trans('labels.cancel')); ?> </a>
                                                <input type="submit" class="btn-primary w-100 rounded-3 rounded-3 m-1 text-center" value="<?php echo e(trans('labels.submit')); ?>" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- whatsapp modal start -->
    <?php if(helper::appdata(@$storeinfo->id)->contact != ""): ?>
    <input type="checkbox" id="check">
    <div class="whatsapp_icon <?php echo e(session()->get('direction') == 2 ? 'whatsapp_icon_rtl' : 'whatsapp_icon_ltr'); ?>">
        <label class="chat-btn" for="check">
            <i class="fa-brands fa-whatsapp comment"></i>
            <i class="fa fa-close close"></i>
        </label>
    </div>

    <div class="<?php echo e(session()->get('direction') == 2 ? 'wrapper_rtl' : 'wrapper'); ?>  wp_chat_box d-none">
        <div class="msg_header">
            <h6><?php echo e(helper::appdata('')->website_title); ?></h6>
        </div>
        <div class="text-start p-3 bg-msg">
            <div class="card p-2 msg">
                How can I help you ?
            </div>
        </div>
        <div class="chat-form">
        
            <form action="https://api.whatsapp.com/send" method="get" target="_blank" class="d-flex align-items-center d-grid gap-2">
                <textarea class="form-control" name="text" placeholder="Your Text Message"></textarea>
                <input type="hidden" name="phone" value="<?php echo e(helper::appdata('')->contact); ?>">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
    <?php endif; ?>
    <!-- whatsapp modal end -->




    <!-- Jquery Min js -->
    <script>
        let direction = "<?php echo e(session()->get('direction')); ?>";

    </script>

    <script src="<?php echo e(url(env('ASSETSPATHURL').'landing/js/jquery.min.js')); ?>"></script>

    <!-- Bootstrap js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'landing/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- owl carousel js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'landing/js/owl.carousel.min.js')); ?>"></script>

    <!-- custom js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL').'landing/js/custom.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <script>
        var areaurl = "<?php echo e(URL::to('admin/getarea')); ?>";
        var select = "<?php echo e(trans('landing.select_area')); ?>";
        var areaname = "<?php echo e(request()->get('area')); ?>";


        $('.whatsapp_icon').on("click",function(event)
        {  
            $(".wp_chat_box").toggleClass("d-none"); 
        });


    </script>

    
</body><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/landing/layout/default.blade.php ENDPATH**/ ?>