<!-- For Large Devices -->
<nav class="sidebar sidebar-lg">
    <div class="d-flex justify-content-center align-items-center mb-3 border-bottom">
        <div class="navbar-header-logoc py-2">
            <img src="<?php echo e(helper::image_path(helper::appdata('')->logo)); ?>" alt="">
        </div>
    </div>
    <?php echo $__env->make('admin.layout.sidebarcommon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</nav>
<?php /**PATH C:\laragon\www\full_store\full_store\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>