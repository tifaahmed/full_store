

<?php $__env->startSection('content'); ?>

<header class="pos-header">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo e(URL::to('admin/dashboard')); ?>" class="logo">
                <img src="<?php echo e(helper::image_path(helper::appdata(Auth::user()->id)->logo)); ?>">
            </a>
            <p class="text-uppercase fw-bold fs-4"><?php echo e(trans('labels.pos')); ?></p>
            <div class="d-flex d-grid gap-2">
                <a href="#" class="btn btn-primary ring d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#rightsidebar" aria-controls="rightsidebar">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <a href="<?php echo e(URL::to('admin/dashboard')); ?>" class="btn btn-primary ring">
                    <i class="fa-light fa-house"></i>
                </a>
            </div>
        </div>
        <!------------------------------------------ mobile siderbar ------------------------------------------>
    </div>
</header>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12 col-lg-8 col-xl-9 vh-100  pb-5">
            <div class="overflow-y-scroll overflow-x-hidden h-100">
                <div class="col-12 mt-3">
                    
                    <!-------------------- search section start -------------------->
                    <!----------------- pos categorys section start ----------------->
                    <div class="pos-left">
                        <div class="pos-categorys">
                            <div class="row justify-content-between align-items-center mb-4">
                                <div class="col-md-6 col-lg-8">
                                    <h5 class="pages-title fs-2 mb-0">Welcome POS</h5>
                                    <p class="text-muted text-truncate fs-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut eveniet possimus cumque harum laboriosam vitae vero. Dignissimos deserunt laborum tempore tenetur, id delectus eligendi omnis minus libero corporis consequatur? Sapiente.</p>
                                </div>
                                <div class="col-md-6 col-lg-4 mt-3 mt-md-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="pos-card-input form-control py-2 border">
                                            <i class="fa-light fa-magnifying-glass fs-5 px-1"></i>
                                            <input type="hidden" value="<?php echo e(url('admin/pos')); ?>" id="search-url">
                                            <input type="text" placeholder="<?php echo e(trans('labels.search_item')); ?>" value="" id="search-keyword" name="search-keyword" class="search-input">
                                        </div>
                                        <a href="#" class="ms-2 possearch-button px-3"><?php echo e(trans('labels.search')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <nav class="scroll-wrapper p-0 p-lg-2 rounded-4">
                                <ul class="d-flex flex-lg-wrap scroll-list">
                                    <li>
                                        <a href="javascript:void(0)" class="cats me-3 active d-flex align-items-center p-2 rounded-4 border" id="cat" onclick="categories_filter('','<?php echo e(url('admin/pos')); ?>')">
                                            <div class="">
                                                <img src="<?php echo e(url(env('ASSETSPATHURL').'admin-assets/images/category/menu.png')); ?>" alt="">
                                            </div>
                                            <span class="px-2">
                                                <?php echo e(trans('labels.all_category')); ?>

                                            </span>
                                        </a>

                                    </li>

                                    <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="javascript:void(0)" id="cat-<?php echo e($category->id); ?>" class="cats me-3 d-flex align-items-center p-2 rounded-4 border" onclick="categories_filter('<?php echo e($category->id); ?>','<?php echo e(url('admin/pos')); ?>')">
                                            <div class="categoryimg">
                                                <img src="<?php echo e(url(env('ASSETSPATHURL').'admin-assets/images/category/'.$category->image)); ?>" alt="">
                                            </div>
                                            <span class="px-2">
                                                <?php echo e($category->name); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </nav>
                        </div>

                        <!----------------- pos categorys section start ----------------->
                        <!----------------- pos-menu section start ----------------->
                        <section class="pos-menu">
                            
                            <div id="pos-item">
                                <?php echo $__env->make('admin.pos.positem', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>



                            <input type="hidden" id="addtocarturl" value="<?php echo e(url('admin/pos/addtocart')); ?>" />
                            <input type="hidden" id="showitemurl" value="<?php echo e(url('admin/pos/item-details')); ?>" />
                            <input type="hidden" id="deletecarturl" value="<?php echo e(URL::to('admin/pos/cart/deletecartitem')); ?>" />
                            <!-- items variants Modal -->
                            <div class="modal fade" id="additems" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5"><span id="viewitem_name"></span> <span id="viewitem_price">(price)</span></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <input type="hidden" id="item_id" value="" />
                                        <input type="hidden" id="item_name" value="" />
                                        <input type="hidden" id="item_price" value="" />
                                        <input type="hidden" id="item_tax" value="" />
                                        <input type="hidden" id="orignal_price" value="" />
                                        <input type="hidden" id="item_image" value="" />



                                        <div class="modal-body">

                                            <div class="variants">

                                                <p class="title pb-1 pt-3 variants" id="variants_title"><?php echo e(trans('labels.varients')); ?></p>

                                                <div id="variants"></div>

                                            </div>

                                            <div class="variants">
                                                <p class="title pb-1 pt-3 variants" id="extras_title"><?php echo e(trans('labels.extras')); ?></p>

                                                <div id="extras"></div>

                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex align-items-center justify-content-between">
                                            <ul class="pagination m-0 justify-content-end">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous" id="minusqty">
                                                        <span aria-hidden="true">
                                                            <i class="fa-solid fa-minus fs-8"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <input type="text" class="page-link px-2 px-md-4 bg-light" id="qty" value="1" readonly />
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next" id="plusqty">
                                                        <span aria-hidden="true">
                                                            <i class="fa-solid fa-plus fs-8"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="#" type="button" class="btn btn-primary" onclick="calladdtocart()"><?php echo e(trans('labels.add_to_cart')); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- items variants Modal -->
                        </section>
                        <!----------------- pos-menu section end ----------------->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 col-xl-3 vh-100 overflow-hidden  d-lg-block pb-5">
            <div class="overflow-y-scroll overflow-x-hidden h-100">
                <div class="righ-side mt-3 mt-lg-0">
                    <div id="cartview">
                        <?php echo $__env->make('admin.pos.cartview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
    var title = "<?php echo e(trans('messages.are_you_sure')); ?>";
    var yes = "<?php echo e(trans('messages.yes')); ?>";
    var no = "<?php echo e(trans('messages.no')); ?>";

    function currency_formate(price) {
        if ("<?php echo e(@helper::appdata(Auth::user()->id)->currency_position); ?>" == "left") {
            return "<?php echo e(@helper::appdata(Auth::user()->id)->currency); ?>" + parseFloat(price).toFixed(2);
        } else {
            return parseFloat(price).toFixed(2) + "<?php echo e(@helper::appdata(Auth::user()->id)->currency); ?>";
        }
    }
</script>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/pos.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.pos_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/admin/pos/index.blade.php ENDPATH**/ ?>