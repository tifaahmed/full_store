
<span class="btn btn-success btngoogle-new" id="gps-button" style="width: 100%">gps-location</span>  

<input readonly type="text" name="address" id="address" hidden>
<input id="latitude" name="latitude" value="<?php echo e(isset($latitude) ? $latitude : ''); ?>" hidden    readonly/>
<input id="longitude" name="longitude" value="<?php echo e(isset($longitude) ? $longitude : ''); ?>" hidden readonly    />

<textarea name="coordinates" id="map_coordinates_direct"   rows="12"  style="width:100%"   hidden 
><?php echo e(isset($coordinates) ? $coordinates : ''); ?></textarea>
  
<div class="row pg-none">
    <div class="col-lg-12 col-md-12 pg-none">
        <label for="">    <?php echo e(trans('labels.address')); ?> ar</label>
        <input readonly type="text"  value="<?php echo e(old('address_ar')); ?>"
        id="address-input-ar" class="form-control  " style="width:100%"
        placeholder="<?php echo e(trans('labels.address')); ?> ar">
        <?php $__errorArgs = ['address.ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
        <label for=""><?php echo e(trans('labels.address')); ?> en</label>
        <input readonly type="text" value="<?php echo e(old('address_en')); ?>"
        id="address-input-en" class="form-control " style="width:100%" 
        placeholder="<?php echo e(trans('labels.address')); ?> en">
        <?php $__errorArgs = ['address.en'];
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

<div id="map" style="height: 400px;"></div>

<?php /**PATH /home/mostafa/  pro/full_store/fullstore/resources/views/maps/google_maps_checkout.blade.php ENDPATH**/ ?>