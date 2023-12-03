
<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.edit')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="row mb-7">
    <div class="col-md-12">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <?php if(!empty($getproductdata)): ?>
                <form action="<?php echo e(URL::to('admin/products/update-' . $getproductdata->slug)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.category')); ?> <span class="text-danger"> * </span></label>
                                    <select class="form-select" name="category" id="editcat_id" required>
                                        <option value=""><?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = $getcategorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($catdata->id); ?>" data-id="<?php echo e($catdata->id); ?>" <?php echo e($getproductdata->cat_id == $catdata->id ? 'selected' : ''); ?>>
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
                                <div class="col-md-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.name')); ?> <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="product_name" value="<?php echo e($getproductdata->item_name); ?>" placeholder="<?php echo e(trans('labels.name')); ?>" required>
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
                                <div class="col-md-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.tax')); ?><span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="tax" value="<?php echo e($getproductdata->tax); ?>" placeholder="<?php echo e(trans('labels.tax')); ?>" required>
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
                                <div class="col-sm-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.description')); ?><span class="text-danger"> * </span></label>
                                    <textarea name="description" class="form-control" rows="5" placeholder="<?php echo e(trans('labels.description')); ?>" required><?php echo e($getproductdata->description); ?></textarea>
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



                                <div class="col-md-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.start_time')); ?> <span class="text-danger"> * </span></label>
                                    <input type="time" class="form-control" name="start_time" value="<?php echo e($getproductdata->start_time); ?>"  required>
                                    <?php $__errorArgs = ['start_time'];
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
                                <div class="col-md-12 form-group">
                                    <label class="form-label"><?php echo e(trans('labels.end_time')); ?><span class="text-danger"> * </span></label>
                                    <input type="time" class="form-control" name="end_time" value="<?php echo e($getproductdata->end_time); ?>" required>
                                    <?php $__errorArgs = ['end_time'];
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
                        <div class="col-md-6">
                            <div class="row align-items-center">
                                <div class="col-md-12 col-lg-12 col-xl-6">
                                    <div class="form-group">
                                        <label for="has_variants" class="col-form-label"><?php echo e(trans('labels.product_has_variation')); ?></label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio" name="has_variants" id="no" value="2" checked <?php if($getproductdata->has_variants == 2): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="no"><?php echo e(trans('labels.no')); ?></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input me-0 has_variants" type="radio" name="has_variants" id="yes" value="1" <?php if($getproductdata->has_variants == 1): ?> checked <?php endif; ?>>
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
                                <?php if($getproductdata->has_variants == 1 && count($getproductdata['variation']) > 0): ?>
                                <div class="col-md-12 col-lg-12 col-xl-6 d-flex justify-content-end mb-3 mb-xl-0">
                                    <button class="btn-add border-0 <?php if($getproductdata->has_variants == 2): ?> dn <?php endif; ?>" type="button" onclick="edititem_fields('<?php echo e(trans('labels.variation')); ?>','<?php echo e(trans('labels.price')); ?>','<?php echo e(trans('labels.original_price')); ?>');">
                                        <?php echo e(trans('labels.add_variation')); ?> <i class="fa-sharp fa-solid fa-plus"></i>
                                    </button>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="row <?php if($getproductdata->has_variants == 1): ?> dn <?php endif; ?> mt-4" id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo e(trans('labels.price')); ?> <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control numbers_only" name="price" value="<?php echo e($getproductdata->item_price); ?>" placeholder="<?php echo e(trans('labels.price')); ?>" id="price">
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
                                        <label class="form-label"><?php echo e(trans('labels.original_price')); ?></label>
                                        <input type="text" class="form-control numbers_only" name="original_price" value="<?php echo e($getproductdata->item_original_price > 0 ? $getproductdata->item_original_price : 0); ?>" placeholder="<?php echo e(trans('labels.original_price')); ?>" id="original_price">
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
                            <div class="<?php if($getproductdata->has_variants == 2): ?> dn <?php endif; ?> mt-4" id="variations">
                                <?php $__empty_1 = true; $__currentLoopData = $getproductdata['variation']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky => $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="row" id="del-<?php echo e($variation->id); ?>">
                                    <input type="hidden" class="form-control" id="variation_id" name="variation_id[<?php echo e($ky); ?>]" value="<?php echo e($variation->id); ?>">
                                    <div class="col-md-12 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <?php if($ky == 0): ?>
                                            <label for="variation" class="col-form-label"><?php echo e(trans('labels.variation')); ?>

                                                <span class="text-danger">*</span> </label>
                                            <?php endif; ?>
                                            <input type="text" class="form-control variation" name="variation[<?php echo e($ky); ?>]" placeholder="<?php echo e(trans('labels.variation')); ?>" required value="<?php echo e($variation->name); ?>">
                                            <?php if($errors->has('variation.' . $ky)): ?>
                                            <span class="text-danger"><?php echo e($errors->first('variation.' . $ky)); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <?php if($ky == 0): ?>
                                            <label for="price" class="col-form-label"><?php echo e(trans('labels.price')); ?>

                                                <span class="text-danger">*</span> </label>
                                            <?php endif; ?>
                                            <input type="text" class="form-control numbers_only variation_price" name="variation_price[<?php echo e($ky); ?>]" placeholder="<?php echo e(trans('labels.price')); ?>" required value="<?php echo e($variation->price); ?>">
                                            <?php if($errors->has('price.' . $ky)): ?>
                                            <span class="text-danger"><?php echo e($errors->first('price.' . $ky)); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-4">
                                        <div class="form-group">
                                            <?php if($ky == 0): ?>
                                            <label for="original_price" class="col-form-label"><?php echo e(trans('labels.original_price')); ?>

                                                  </label>
                                            <?php endif; ?>
                                            <div class="d-flex">
                                                <input type="text" class="form-control numbers_only variation_original_price" name="variation_original_price[<?php echo e($ky); ?>]" placeholder="<?php echo e(trans('labels.original_price')); ?>" required value="<?php echo e($variation->original_price); ?>">
                                                <a class="btn btn-danger ms-2 btn-sm rounded-5 pricebtn" type="button" <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="deletedata('<?php echo e(URL::to('admin/products/delete/variation-' . $variation->id . '-' . $variation->item_id)); ?>')" <?php endif; ?> <?php echo e(count($getproductdata['variation']) == 1 ? 'disabled' : ''); ?>>
                                                <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <?php if($errors->has('original_price.' . $ky)): ?>
                                            <span class="text-danger"><?php echo e($errors->first('original_price.' . $ky)); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                   
                                </div>
                                <span class="hiddencount d-none"><?php echo e($ky); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label"><?php echo e(trans('labels.variation')); ?></label>
                                            <input type="text" class="form-control variation" name="variation[]" placeholder="<?php echo e(trans('labels.variation')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label"><?php echo e(trans('labels.price')); ?></label>
                                            <input type="text" class="form-control numbers_only variation_price" name="variation_price[]" placeholder="<?php echo e(trans('labels.price')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label"><?php echo e(trans('labels.original_price')); ?></label>
                                            <div class="d-flex">
                                                <input type="text" class="form-control numbers_only variation_original_price" name="variation_original_price[]" placeholder="<?php echo e(trans('labels.original_price')); ?>" value="0">
                                                <button class="btn btn-success ms-2 btn-sm rounded-5" type="button" onclick="edititem_fields('<?php echo e(trans('labels.variation')); ?>','<?php echo e(trans('labels.price')); ?>','<?php echo e(trans('labels.original_price')); ?>');">
                                                    <i class="fa-sharp fa-solid fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <?php endif; ?>
                                <div id="edititem_fields"></div>
                            </div>
                            <div class="border-bottom px-0 my-2 d-flex justify-content-between align-items-center">
                                <p class="fs-5"><?php echo e(trans('labels.extras')); ?></p>
                                <?php if(count($getproductdata['extras']) > 0): ?>
                                <button class="btn btn-sm btn-outline-info m-2 float-end <?php if($getproductdata->has_variants == 2): ?> dn <?php endif; ?>" type="button" onclick="more_editextras_fields('<?php echo e(trans('labels.name')); ?>','<?php echo e(trans('labels.price')); ?>')">
                                    <?php echo e(trans('labels.add_extras')); ?> <i class="fa-sharp fa-solid fa-plus"></i> </button>
                                <?php endif; ?>
                            </div>
                            <?php $__empty_1 = true; $__currentLoopData = $getproductdata['extras']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $extras): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="row">
                                <input type="hidden" class="form-control" name="extras_id[]" value="<?php echo e($extras->id); ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php if($key == 0): ?>
                                        <label class="col-form-label"><?php echo e(trans('labels.name')); ?></label>
                                        <?php endif; ?>
                                        <input type="text" class="form-control extras_name" name="extras_name[]" value="<?php echo e($extras->name); ?>" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php if($key == 0): ?>
                                        <label class="col-form-label"><?php echo e(trans('labels.price')); ?></label>
                                        <?php endif; ?>

                                        <div class="d-flex">
                                            <input type="text" class="form-control numbers_only extras_price" name="extras_price[]" value="<?php echo e($extras->price); ?>" placeholder="<?php echo e(trans('labels.price')); ?>" required>
                                            <button class="btn btn-danger ms-2 btn-sm rounded-5" type="button" <?php if(env('Environment')=='sendbox' ): ?> onclick="myFunction()" <?php else: ?> onclick="deletedata('<?php echo e(URL::to('admin/products/delete/extras-' . $extras->id)); ?>')" <?php endif; ?>><i class=" fa-solid fa-trash" aria-hidden="true"></i> </button>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                            <span class="hiddenextrascount d-none"><?php echo e($key); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.name')); ?></label>
                                        <input type="text" class="form-control extras_name" name="extras_name[]" placeholder="<?php echo e(trans('labels.name')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(trans('labels.price')); ?></label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control numbers_only extras_price" name="extras_price[]" placeholder="<?php echo e(trans('labels.price')); ?>">
                                            <button class="btn btn-success ms-2 btn-sm rounded-5" type="button" onclick="more_editextras_fields('<?php echo e(trans('labels.name')); ?>','<?php echo e(trans('labels.price')); ?>')"><i class="fa-sharp fa-solid fa-plus"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <?php endif; ?>
                            <div id="more_editextras_fields"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-end">
                            <a href="<?php echo e(URL::to('admin/products')); ?>" class="btn btn-danger btn-cancel m-1"><?php echo e(trans('labels.cancel')); ?></a>
                            <button class="btn btn-success btn-succes m-1" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </div>
                </form>

                <button class="btn-add border-0 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#AddProduct"> <?php echo e(trans('labels.add')); ?> <?php echo e(trans('labels.image')); ?>s <i class="fa-sharp fa-solid fa-plus"></i> </button>
        


                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-5 g-4">
                <?php if(count($getproductimage) > 0): ?>
                    <?php $__currentLoopData = $getproductimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card p-2">
                            <div class="overflow-hidden">
                                <img src="<?php echo e(helper::image_path($productimage->image)); ?>" class="img-fluid product-image rounded-3">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info btn-size" tooltip="Edit" onclick="imageview('<?php echo e($productimage->id); ?>','<?php echo e($productimage->image); ?>')"><i class="fa-regular fa-pen-to-square"></i></a>

                                <?php if(count($getproductimage) > 1): ?>
                                <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-size" tooltip="Delete" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> onClick="deleteItemImage('<?php echo e($productimage->id); ?>','<?php echo e($getproductdata->id); ?>','<?php echo e(URL::to('admin/products/destroyimage')); ?>')" <?php endif; ?>>
                                <i class="fa-solid fa-trash" aria-hidden="true"></i> </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <?php echo $__env->make('admin.layout.no_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>

<!-- Add Item Image -->
<div class="modal fade" id="AddProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?php echo e(URL::to('admin/products/storeimages')); ?>" name="addproduct" class="addproduct" id="addproduct" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <span id="msg"></span>
            <input type="hidden" id="storeimagesurl" value="">
            <input type="hidden" name="itemid" id="itemid" value="<?php echo e($getproductdata->id); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(trans('labels.image')); ?> add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <span id="iiemsg"></span>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label"><?php echo e(trans('labels.image')); ?> <span class="text-danger">*</span></label>
                        <input type="file" multiple="true" class="form-control" name="file[]" id="file" accept="image/*" required="">
                    </div>
                    <div class="gallery"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-cancel m-1" data-bs-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                    <button class="btn btn-success btn-succes m-1" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal modal-fade-transform" id="editModal" tabindex="-1" aria-labelledby="editModallable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModallable"><?php echo e(trans('labels.image')); ?> <span class="text-danger"> * </span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=" <?php echo e(URL::to('admin/products/updateimage')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" id="item_id" name="id">
                    <input type="hidden" id="img_name" name="image">
                    <input type="file" name="product_image" class="form-control" id="" required>
                    <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-succes m-1"><?php echo e(trans('labels.save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/product.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\jop\full_store\resources\views/admin/product/edit_product.blade.php ENDPATH**/ ?>