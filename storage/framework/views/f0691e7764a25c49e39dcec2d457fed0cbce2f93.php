<?php $__env->startSection('content'); ?>

<body class="bg-white">
    <div class="wrapper">
        <section>
            <div class="row justify-content-center align-items-center g-0 h-100vh">
                <div class="col-lg-6 col-xl-6 col-12 bg-white pt-5 pt-md-0">
                    <div class="row g-0 vh-100 d-flex justify-content-center align-items-center">
                        <div class="col-md-8 col-lg-10 col-xl-7">
                            <div class="card overflow-hidden border-0 w-100 bg-transparent">
                                <div class="card-body pt-0">
                                    <h4 class="fw-bold text-dark fs-1 pb-0 mb-0"><?php echo e(trans('labels.register')); ?></h4>

                                    <div class="d-flex align-items-center py-3">
                                        <p class="fs-7 text-center fw-500 text-muted"><?php echo e(trans('labels.already_have_an_account')); ?></p>
                                        <a href="<?php echo e(URL::to('/admin')); ?>" class="text-primary fw-semibold px-1"><?php echo e(trans('labels.login')); ?></a>
                                    </div>
                                    <form class="my-3" method="POST" action="<?php echo e(URL::to('admin/register_vendor')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                
                                                <label for="name" class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger"> * </span></label>
                                                
                                                <?php if(session()->has('social_login')): ?>
                                                    <input type="text" class="form-control" name="name"  value="<?php echo e(session()->get('social_login')['name']); ?>" id="name" placeholder="<?php echo e(trans('labels.name')); ?>">
                                                <?php else: ?>
                                                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" id="name" placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                                <?php endif; ?>
                                            <?php $__errorArgs = ['name'];
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
                                            <div class="form-group col-md-6">
                                                <label for="email" class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger"> * </span></label>
                                                    <?php if(session()->has('social_login')): ?>
                                                        <input type="email" class="form-control" name="email" value="<?php echo e(session()->get('social_login')['email']); ?>" id="email" placeholder="<?php echo e(trans('labels.email')); ?>" required>
                                                    <?php else: ?>
                                                        <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="<?php echo e(trans('labels.email')); ?>" required>
                                                    <?php endif; ?>
                                                <?php $__errorArgs = ['email'];
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
                                            <div class="form-group col-md-6">
                                                <label for="mobile" class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger"> * </span></label>
                                                <input type="number" class="form-control" name="mobile" value="<?php echo e(old('mobile')); ?>" id="mobile" placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                                                <?php $__errorArgs = ['mobile'];
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
                                            <?php if(!session()->has('social_login')): ?>
                                            <div class="form-group col-md-6">
                                                <label for="password" class="form-label"><?php echo e(trans('labels.password')); ?><span class="text-danger"> * </span></label>
                                                <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" id="password" placeholder="<?php echo e(trans('labels.password')); ?>" required>
                                                <?php $__errorArgs = ['password'];
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
                                            <?php endif; ?>
                                            <div class="form-group col-md-6">
                                                <label for="city" class="form-label"><?php echo e(trans('labels.city')); ?><span class="text-danger"> * </span></label>
                                                <select name="city" class="form-select" id="city" required>
                                                    <option value=""><?php echo e(trans('labels.select')); ?></option>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="area" class="form-label"><?php echo e(trans('labels.area')); ?><span class="text-danger"> * </span></label>
                                                <select name="area" class="form-select" id="area" required>
                                                    <option value=""><?php echo e(trans('labels.select')); ?></option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="basic-url" class="form-label"><?php echo e(trans('labels.personlized_link')); ?><span class="text-danger"> * </span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><?php echo e(URL::to('/')); ?>/</span>
                                                    <input type="text" class="form-control mb-0" id="slug" name="slug" value="<?php echo e(old('slug')); ?>" required>
                                                </div>
                                                <?php $__errorArgs = ['slug'];
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
                                            <div class="form-group my-3">
                                                <input class="form-check-input" type="checkbox" value="" name="check_terms" id="check_terms" checked required>
                                                <label class="form-check-label" for="check_terms">
                                                    <?php echo e(trans('labels.i_accept_the')); ?> <span class="fw-600"><a href="<?php echo e(URL::to('/terms_condition')); ?>" target="_blank"><?php echo e(trans('labels.terms')); ?></a> </span>
                                                </label>
                                            </div>
                                        </div>

                                        <?php echo $__env->make('landing.layout.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <button class="btn btn-primary w-100 mt-3" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.register')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-12 d-none d-lg-block">
                    <div class="vh-100 d-flex justify-content-center align-items-center m-auto">
                        <img src="<?php echo e(url(env('ASSETSPATHURL') . '/admin-assets/images/about/login.jpg')); ?>" alt="" class="formimg">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
    <script>
        var areaurl = "<?php echo e(URL::to('admin/getarea')); ?>";
        var select = "<?php echo e(trans('labels.select')); ?>";
        var areaid = '0';
    </script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . '/admin-assets/js/user.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.auth_default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/admin/auth/register.blade.php ENDPATH**/ ?>