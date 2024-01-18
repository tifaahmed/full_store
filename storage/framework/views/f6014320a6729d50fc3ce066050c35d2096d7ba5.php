<?php $__env->startSection('content'); ?>
<?php if(count(helper::footer_features(@$storeinfo->id)) > 0 || (count($getcategory) > 0 && count($getitem) > 0) || count($bannerimage) > 0 || count($blogs) > 0): ?>
<?php
  $home_background_color = isset($storeinfo->setting) ? $storeinfo->setting->home_background_color : null;
?>
<main style="background-color: <?php echo e($home_background_color); ?>">
    <!-- Theme 4 Banner Start -->
    <section>
        <div class="theme-4-bannre">
            <?php if($bannerimage->count()): ?>
                <div class="owl-carousel owl-theme" id="slider-header">
                    <?php $__currentLoopData = $bannerimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="overflow-hidden">
                            <img src="<?php echo e(helper::image_path($image->banner_image)); ?>" alt="">
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->banner)); ?>" alt="">
            <?php endif; ?>
            
        </div>
    </section>
    <!-- Theme 4 Banner End -->

    <!-- Theme 4 only Categories  Start -->
    <section class="categorythme-main">
        <div class="container">
            <div class="categorythme-4">
                <div class="main-row-categorythme" id="menu-center">
                    <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <a href="#<?php echo e($category->slug); ?>" class="scroll-link">
                                <span><?php echo e($category->name); ?></span>
                            </a>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Theme 4 only Categories  End -->

    <!-- Theme 4 Categoriy & Product Start -->
    <section class="product-template">
        <div class="container">
            <div class="categorythme-4">
                <div class="scrollspy_row">
                    <?php if(helper::appdata($storeinfo->id)->template_type == 1): ?>
                    <?php echo $__env->make('front.template-4.theme-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(helper::appdata($storeinfo->id)->template_type == 2): ?>
                    <?php echo $__env->make('front.template-4.theme-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(helper::appdata($storeinfo->id)->template_type == 3): ?>
                    <?php echo $__env->make('front.template-4.theme-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>

                
                
                
            </div>
        </div>
    </section>
    <!-- Theme 4 Categoriy & Product End -->



    <!-- Subscription Section Start -->
    <section class="theme-1-margin-top">
        <div class="container">
            <div class="row g-0">
                <div class="col">
                    <div class="subscription-main position-relative w-100 overflow-hidden">
                        <div class="overflow-hidden rounded-5">
                            <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->subscribe_background)); ?>" class="img-fluid subscription-image rounded-2">
                            <div class="caption-subscription col-md-7 col-lg-6">
                                <div class="subscription-text">
                                    <h3><?php echo e(trans('labels.subscribe_title')); ?></h3>
                                    <p><?php echo e(trans('labels.subscribe_description')); ?></p>
                                    <form action="<?php echo e(URL::to($storeinfo->slug . '/subscribe')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="subscribe-input form-control col-md-6">
                                            <input type="hidden" value="<?php echo e($storeinfo->id); ?>" name="id">
                                            <input type="email" name="email" class="form-control border-0" placeholder="<?php echo e(trans('labels.enter_email')); ?>" required>
                                            <button type="submit" class="btn btn-primary"><?php echo e(trans('labels.subscribe')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscription Section End -->
    <!-- Blogs Section Start -->
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
     App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
     <?php
     if ($storeinfo->allow_without_subscription == 1) {
     $blog = 1;
     } else {
     $blog = @helper::get_plan($storeinfo->id)->blogs;
     }
     ?>
     <?php if($blog == 1): ?>
     <?php if(count($blogs) > 0): ?>
     <section class="bg-light theme-1-margin-top">
          <div class="container overflow-hidden">
               <div class="row blogs-card">
                    <div class="row align-items-center">
                         <div class="col-8">
                              <h3 class="page-title mb-1"> <?php echo e(trans('labels.blogs')); ?></h3>
                              <p class="page-subtitle line-limit-2 mb-4">
                                   <?php echo e(trans('labels.blog_desc')); ?>

                              </p>
                         </div>
                         <div class="col-4 d-flex justify-content-end align-items-center">
                              <a href="<?php echo e(URL::to(@$storeinfo->slug.'/blog-list')); ?>" class="border text-dark p-1 rounded-3">
                                   <span class="fs-8 p-1"><?php echo e(trans('labels.view_all')); ?></span>
                              </a>
                         </div>
                    </div>
                    <div class="col">
                         <div class="owl-carousel blogs-slider owl-theme">
                              <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <a href="<?php echo e(URL::to(@$storeinfo->slug.'/blog-details-'.$blog->slug)); ?>">
                                   <div class="item">
                                        <div class="card h-100 rounded-5">
                                             <img src="<?php echo e(helper::image_path($blog->image)); ?>" alt="" class="rounded-5">
                                             <div class="card-body py-4">
                                                  <p class="title mt-2 blog-title"><?php echo e($blog->title); ?></p>
                                                  <span class="blog-description"><?php echo $blog->description; ?></span>
                                             </div>
                                        </div>
                                   </div>
                              </a>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <?php endif; ?>
     <?php endif; ?>
     <?php endif; ?>
     <!-- Blogs Section End -->

    <!-- Theme 4 Footer Fisher Start -->
    <section class="thme4-section-padding py-4 pb-lg-5">
        <div class="container px-0">
            <div class="theme4-footerfisher">
                <div class="row my-1 justify-content-center align-items-center overflow-hidden g-3">
                    <?php $__currentLoopData = helper::footer_features(@$storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card theme4footer-card h-100">
                            <div class="card-body d-flex align-items-start">
                                <h2 class="theme4quality-image"><?php echo $feature->icon; ?></h2>
                                <div class="card-body pt-0 quality-content">
                                    <h3><?php echo e($feature->title); ?></h3>
                                    <p><?php echo e($feature->description); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Theme 4 Footer Fisher End -->



    <?php echo $__env->make('front.theme.footer-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</main>
<?php else: ?>
<?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    window.addEventListener("scroll", onScroll);
    function onScroll(event) {
        var scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
        var menuLinks = document.querySelectorAll("#menu-center ul li a");
        for (var i = 0; i < menuLinks.length; i++) {
            var currLink = menuLinks[i];
            var refElement = document.querySelector(currLink.getAttribute("href"));
            if (
                refElement.offsetTop - 150 <= scrollPos &&
                refElement.offsetTop + refElement.offsetHeight > scrollPos
            ) {
                document.querySelectorAll("#menu-center ul li a").forEach(function(el) {
                    el.classList.remove("active");
                });
                currLink.classList.add("active");
            } else {
                currLink.classList.remove("active");
            }
        }
    }
    var tabLinks = document.querySelectorAll(".tab-row a");
    for (var i = 0; i < tabLinks.length; i++) {
        tabLinks[i].addEventListener("click", function(event) {
            event.preventDefault();
            var currentId = this.getAttribute("href");
            setTimeout(function() {
                document.documentElement.scrollTop = document.body.scrollTop = document.querySelector(currentId).offsetTop - 50;
            }, 0);
        });
    }
    $('.theme-4-banner-2 .owl-carousel').owlCarousel({
        rtl: direction == '2' ? true : false,
        dots: false,
        loop: false,
        autoplay: false,
        margin: 25,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1024: {
                items: 2
            },
            1636: {
                items: 3
            }
        }
    })

    $('#slider-header').owlCarousel({
        rtl: direction == '2' ? true : false,
        dots: false,
        loop: true,
        autoplay: true,
        margin: 0,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        items:1,
    })


    let scrollLinks = document.querySelectorAll('.scroll-link');

    // إضافة مستمع حدث لكل رابط
    scrollLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        var targetId = this.getAttribute('href').substring(1);
        var targetElement = document.getElementById(targetId);

        targetElement.scrollIntoView({ behavior: "smooth" });

        scrollLinks.forEach(function(link) {
        link.classList.remove('active-link');
        });
        this.classList.add('active-link');
    });
    });

</script>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>

<?php echo $__env->make('front.theme.location_popup',[
    'deliveryareas' => $deliveryareas,
    'branches' => $branches, 
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/template-4/index.blade.php ENDPATH**/ ?>