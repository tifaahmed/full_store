<button id="locationToggleButton" style="display: none;" data-toggle="modal" data-target="#locationToggle"></button>

<div class="modal fade" id="locationToggle" aria-hidden="true" aria-labelledby="locationToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-5">
            <div class="modal-header px-4">
                <h5 class=" " id="gps_button_title">
                    <?php echo e(trans('labels.Check_if_we_deliver_to_your_location')); ?>

                </h5>
                <h5 class=" " id="select_branch_title" style="display: none">
                    <?php echo e(trans('labels.select_favorite_pickup_store')); ?>

                </h5>
                

            </div>
            <div class="modal-body py-3 px-4">
                <?php
                    $coordinatesToArray  =  $deliveryareas->whereNotNull('coordinates')
                                        ->pluck('coordinates')
                                        ->toArray(); 
                    $coordinates = json_encode($coordinatesToArray);
                ?>
                <?php echo $__env->make('maps.google_maps_homepage',[
                    'coordinates' => $coordinates,
                    'branches' => $branches,                    
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
             
        </div>
    </div>
</div>
<?php if(!auth()->user()): ?>
    <script>
        document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.key === 'F5') {
                localStorage.setItem('modalShown', false);
            }
        });
        $(window).on('load', function() {
            if (localStorage.getItem('modalShown') == 'false' || !localStorage.getItem('modalShown') ) {
                $('#locationToggle').modal('show');
            }
        });
    </script> 
<?php endif; ?>
<?php /**PATH /home/mostafa/  pro/full_store/full_store/resources/views/front/theme/location_popup.blade.php ENDPATH**/ ?>