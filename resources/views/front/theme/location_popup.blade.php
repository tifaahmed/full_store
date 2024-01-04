<button id="locationToggleButton" style="display: none;" data-toggle="modal" data-target="#locationToggle"></button>

<div class="modal fade" id="locationToggle" aria-hidden="true" aria-labelledby="locationToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-5">
            <div class="modal-header px-4">
                <h5 class=" ">
                    {{trans('labels.Check_if_we_deliver_to_your_location')}}
                </h5>
            </div>
            <div class="modal-body py-3 px-4">
                <?php
                    $coordinatesToArray  =  $deliveryareas->whereNotNull('coordinates')
                                        ->pluck('coordinates')
                                        ->toArray(); 
                    $coordinates = json_encode($coordinatesToArray);
                ?>
                @include('maps.google_maps_homepage',[
                    'coordinates' => $coordinates,
                    'branches' => $branches,                    
                ])
            </div>
             
        </div>
    </div>
</div>
<script>
    // document.addEventListener('keydown', function(event) {
    // if (event.ctrlKey && event.key === 'F5') {
    //         localStorage.setItem('modalShown', false);
    //     }
    // });
    $(window).on('load', function() {
    //     if (localStorage.getItem('modalShown') == 'false' || !localStorage.getItem('modalShown') ) {
            $('#locationToggle').modal('show');
    //     localStorage.setItem('modalShown', true);
    //     }
    });
</script>