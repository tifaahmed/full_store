<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-6">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="row mb-7">
    <div class="col-12">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <form action="<?php echo e(URL::to('admin/products/save')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.category')); ?> <span class="text-danger"> * </span></label>
                                    <select class="form-select" name="category" id="cat_id" required>
                                        <option value=""><?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = $getcategorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($catdata->id); ?>" data-id="<?php echo e($catdata->id); ?>" <?php echo e(old('category') == $catdata->id ? 'selected' : ''); ?>>
                                            <?php echo e($catdata->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.name')); ?> <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="product_name" value="<?php echo e(old('product_name')); ?>" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                    <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.tax')); ?> <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control numbers_only" name="tax" value="<?php echo e(old('tax') > 0 ? old('tax') : 0); ?>" placeholder="<?php echo e(trans('labels.tax')); ?>" required>
                                    <?php $__errorArgs = ['tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 form-group mt-2">
                                    <label class="form-label"><?php echo e(trans('labels.description')); ?> <span class="text-danger"> * </span></label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="<?php echo e(trans('labels.description')); ?>" required><?php echo e(old('description')); ?></textarea>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.image')); ?> <span class="text-danger"> * </span></label>
                                    <input type="file" class="form-control" name="product_image[]" accept="image/*" id="image" multiple required>
                                    <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span> <br>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="gallery"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="has_variants" class="col-form-label"><?php echo e(trans('labels.product_has_variation')); ?></label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio" name="has_variants" id="no" value="2" checked <?php if(old('has_variants')==2): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="no"><?php echo e(trans('labels.no')); ?></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio" name="has_variants" id="yes" value="1" <?php if(old('has_variants')==1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="yes"><?php echo e(trans('labels.yes')); ?></label>
                                            </div>
                                            <?php $__errorArgs = ['has_variants'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <br><span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row dn mt-4 <?php if($errors->has('variants_name.*') || $errors->has('variants_price.*')): ?> dn <?php endif; ?> <?php if(old('variants') == 2): ?> d-flex <?php endif; ?>" id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.price')); ?> <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only" name="price" value="<?php echo e(old('price')); ?>" placeholder="<?php echo e(trans('labels.price')); ?>" id="price">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.original_price')); ?>

                                            <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only" name="original_price" value="<?php echo e(old('original_price')); ?>" placeholder="<?php echo e(trans('labels.original_price')); ?>" id="original_price">
                                        <?php $__errorArgs = ['original_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 dn <?php if($errors->has('variation.*') || $errors->has('variation_price.*') || old('has_variants') == 1): ?> d-flex <?php endif; ?>" id="variations">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.variation')); ?> <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control variation" name="variation[]" placeholder="<?php echo e(trans('labels.variation')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.price')); ?> <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only variation_price" name="variation_price[]" placeholder="<?php echo e(trans('labels.price')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.original_price')); ?> <span class="text-danger"> * </span></label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control numbers_only variation_original_price" name="variation_original_price[]" placeholder="<?php echo e(trans('labels.original_price')); ?>">
                                            <button class="btn btn-success btn-sm rounded-5 ms-2" type="button" onclick="variation_fields('<?php echo e(trans('labels.variation')); ?>','<?php echo e(trans('labels.price')); ?>','<?php echo e(trans('labels.original_price')); ?>')"><i class="fa-sharp fa-solid fa-plus"></i> </button>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div id="more_variation_fields"></div>
                            <div class="card-header bg-transparent px-0"> <?php echo e(trans('labels.extras')); ?> </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.name')); ?></label>
                                        <input type="text" class="form-control" name="extras_name[]" placeholder="<?php echo e(trans('labels.name')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.price')); ?></label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control numbers_only" name="extras_price[]" placeholder="<?php echo e(trans('labels.price')); ?>">
                                             <!--  for rtl use this class (me-2) -->
                                            <button class="btn btn-success btn-sm rounded-5 ms-2" type="button" onclick="extras_fields('<?php echo e(trans('labels.name')); ?>','<?php echo e(trans('labels.price')); ?>')"><i class="fa-sharp fa-solid fa-plus"></i> </button>

                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div id="more_extras_fields"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-end">
                            <a href="<?php echo e(URL::to('admin/products')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>
                            <button class="btn btn-success btn-succes m-1" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/product.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/product/add_product.blade.php ENDPATH**/ ?>