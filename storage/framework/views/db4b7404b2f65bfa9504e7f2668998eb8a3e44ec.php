
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.products')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(URL::to('admin/products/add')); ?>" class="btn-add">
                    <i class="fa-regular fa-plus mx-1"></i><?php echo e(trans('labels.add')); ?>

                </a>
            </div>
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-12">
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="fw-500">
                                    <td><?php echo e(trans('labels.srno')); ?></td>
                                    <td><?php echo e(trans('labels.image')); ?></td>
                                    <td><?php echo e(trans('labels.category')); ?></td>
                                    <td><?php echo e(trans('labels.name')); ?></td>
                                    <td><?php echo e(trans('labels.price')); ?></td>
                                    <td><?php echo e(trans('labels.tax')); ?></td>
                                    <td><?php echo e(trans('labels.time')); ?></td>
                                    <td><?php echo e(trans('labels.status')); ?></td>
                                    <td><?php echo e(trans('labels.action')); ?></td>
                                </tr>
                            </thead>
                            <tbody id="tabledetails" data-url="<?php echo e(url('admin/products/reorder_product')); ?>">
                                <?php $i = 1; ?>
                                <?php $__currentLoopData = $getproductslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-7 row1" id="dataid<?php echo e($product->id); ?>" data-id="<?php echo e($product->id); ?>">
                                        <td><?php echo $i++; ?></td>
                                        <td><img src="<?php if( @$product['item_image']->image_url != null ): ?> <?php echo e(@$product['item_image']->image_url); ?> <?php else: ?> <?php echo e(helper::image_path($product->image)); ?> <?php endif; ?>"
                                                class="img-fluid rounded hw-50 object-fit-cover" alt=""> </td>
                                        <td><?php echo e($product['category_info']->name); ?></td>
                                        <td><?php echo e($product->item_name); ?> <br> <small
                                                class="fw-bold text-muted"><?php echo e($product->has_variants == 1 ? trans('labels.customizable') : ''); ?></small>
                                        </td>
                                        <td><?php echo e(helper::currency_formate($product->item_price, Auth::user()->id)); ?></td>
                                        <td><?php echo e($product->tax); ?>%</td>
                                        <td>
                                            <?php echo e($product->start_time_format); ?> <br>
                                            <?php echo e($product->end_time_format); ?>

                                        </td>

                                        <td>
                                            <?php if($product->is_available == '1'): ?>
                                                <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/products/status-' . $product->slug . '/2')); ?>')" <?php endif; ?>
                                                    class="btn btn-sm btn-success btn-size" tooltip="<?php echo e(trans('labels.active')); ?>"><i class="fas fa-check"></i></a>
                                            <?php else: ?>
                                                <a <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/products/status-' . $product->slug . '/1')); ?>')" <?php endif; ?>
                                                    class="btn btn-sm btn-danger btn-xmark" tooltip="<?php echo e(trans('labels.in_active')); ?>"><i class="fas fa-close"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-size" tooltip="<?php echo e(trans('labels.edit')); ?>"
                                                href="<?php echo e(URL::to('admin/products/edit-' . $product->slug)); ?>"> <i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                            <a class="btn btn-sm btn-danger btn-size" tooltip="<?php echo e(trans('labels.delete')); ?>"   
                                                <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="statusupdate('<?php echo e(URL::to('admin/products/delete-' . $product->slug)); ?>')" <?php endif; ?>><i
                                                    class="fa-regular fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\full_store\full_store\resources\views/admin/product/product.blade.php ENDPATH**/ ?>