<div id="email_smtp_configuration" class="hidechild">

    <div class="row mb-4">

        <div class="col-12">

            <div class="card border-0 box-shadow">

                <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">

                    <i class="fa-solid fa-envelope fs-5"></i>

                    <h5 class="px-2"><?php echo e(trans('labels.email_smtp_configuration')); ?></h5>

                </div>

                <div class="card-body">

                    <form action="<?php echo e(URL::to('admin/settings/update_email_config')); ?>" method="POST" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>

                        <div class="row">



                            <div class="form-group col-md-6">

                                <label class="form-label"><?php echo e(trans('labels.mail_driver')); ?><span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_driver" value="<?php echo e(@$settingdata->mail_driver); ?>" placeholder="<?php echo e(trans('labels.mail_driver')); ?>" required>

                                <?php $__errorArgs = ['mail_driver'];
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

                                <label class="form-label"><?php echo e(trans('labels.mail_host')); ?><span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_host" value="<?php echo e(@$settingdata->mail_host); ?>" placeholder="<?php echo e(trans('labels.mail_host')); ?>" required>

                                <?php $__errorArgs = ['mail_host'];
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

                                <label class="form-label"><?php echo e(trans('labels.mail_port')); ?><span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_port" value="<?php echo e(@$settingdata->mail_port); ?>" placeholder="<?php echo e(trans('labels.mail_port')); ?>" required>

                                <?php $__errorArgs = ['mail_port'];
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

                                <label class="form-label"><?php echo e(trans('labels.mail_username')); ?><span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_username" value="<?php echo e(@$settingdata->mail_username); ?>" placeholder="<?php echo e(trans('labels.mail_username')); ?>" required>

                                <?php $__errorArgs = ['mail_username'];
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

                                <label class="form-label"><?php echo e(trans('labels.mail_password')); ?><span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_password" value="<?php echo e(@$settingdata->mail_password); ?>" placeholder="<?php echo e(trans('labels.mail_password')); ?>" required>

                                <?php $__errorArgs = ['mail_password'];
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

                                <label class="form-label"><?php echo e(trans('labels.mail_encryption')); ?><span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_encryption" value="<?php echo e(@$settingdata->mail_encryption); ?>" placeholder="<?php echo e(trans('labels.mail_encryption')); ?>" required>

                                <?php $__errorArgs = ['mail_encryption'];
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

                                <label class="form-label"><?php echo e(trans('labels.mail_fromaddress')); ?><span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_fromaddress" value="<?php echo e(@$settingdata->mail_fromaddress); ?>" placeholder="<?php echo e(trans('labels.mail_fromaddress')); ?>" required>

                                <?php $__errorArgs = ['mail_fromaddress'];
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

                                <label class="form-label"><?php echo e(trans('labels.mail_fromname')); ?><span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_fromname" value="<?php echo e(@$settingdata->mail_fromname); ?>" placeholder="<?php echo e(trans('labels.mail_fromname')); ?>" required>

                                <?php $__errorArgs = ['mail_fromname'];
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



                        <div class="d-flex justify-content-between align-items-center">



                            <button class="btn btn-success btn-succes mt-3" <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="button" <?php endif; ?>

                            data-bs-toggle="modal" data-bs-target="#testmailmodal"><?php echo e(trans('labels.send_test_mail')); ?></button>



                            <button class="btn btn-success btn-succes mt-3" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>



                        </div>

                        

                        

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>







<!-- Modal -->

<div class="modal fade" id="testmailmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"

aria-labelledby="testmailmodalLabel" aria-hidden="true">

<div class="modal-dialog">

    <form action="<?php echo e(URL::to('/admin/testmail')); ?>" method="POST">

        <?php echo csrf_field(); ?>

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="testmailmodalLabel"><?php echo e(trans('labels.send_test_mail')); ?></h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"

                    aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <label class="form-label"><?php echo e(trans('labels.email_address')); ?><span class="text-danger"> *

                    </span></label>

                <input type="text" class="form-control" name="email_address"

                    value="<?php echo e(@$settingdata->email_address); ?>"

                    placeholder="<?php echo e(trans('labels.email_address')); ?>" required>

            </div>

            <div class="modal-footer">

                <button type="submit"

                    class="btn btn-success btn-succes mt-3"><?php echo e(trans('labels.send_test_mail')); ?></button>

            </div>

        </div>

    </form>



</div>

</div>



<?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/admin/emailsettings/email_setting.blade.php ENDPATH**/ ?>