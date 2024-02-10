<button id="locationToggleButton" style="display: none;" data-toggle="modal" data-target="#locationToggle"></button>
<div class="modal fade" id="locationToggle" aria-hidden="true" aria-labelledby="locationToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-5">

            {{-- <div class="modal-header px-4"> --}}
                {{-- <h5 class=" " id="gps_button_title">
                    {{trans('labels.Check_if_we_deliver_to_your_location')}}
                </h5>

            {{-- </div> --}}
            <div class="modal-body py-3 px-4">
                <div id="location_popup_page_1_main" style="text-align: center;">
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn header-main" 
                            id="location_popup_delivery" style="color: #fff"> 
                                {{trans('labels.delivery')}} 
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn header-main" 
                            id="location_popup_pickup" style="color: #fff"> 
                                {{trans('labels.pickup')}} 
                            </button>
                        </div>
                    </div>
                </div>
                <?php
                    $allDeliveryAreasCoordinatesToArray  =  $deliveryareas->whereNotNull('coordinates')
                                                            ->pluck('coordinates')
                                                            ->toArray(); 
                    $coordinates = json_encode($allDeliveryAreasCoordinatesToArray);
                ?>
                <div id="location_popup_page_2_delivery" style="display:none">
                    @include('maps.google_maps_homepage_delivery',[
                        'coordinates' => $coordinates,
                        'branches' => $branches,                    
                    ])
                </div>
                <div id="location_popup_page_2_pickup" style="display:none">
                    @include('maps.google_maps_homepage_pickup',[
                        'coordinates' => $coordinates,
                        'branches' => $branches,                    
                    ])
                </div>

               
            </div>
             
        </div>
    </div>
</div>
@if (!auth()->user())

    <script>
        document.getElementById('location_popup_delivery').addEventListener('click', function () {
        
            let currentScript = null;
            // Remove the current script
            if (currentScript) {
                currentScript.remove();
            }
            // Load the selected script
            const newScript = document.createElement('script');
            
            newScript.src = "{{ env('APP_URL_public', asset('')).'/js/map_homepage_delivery.js' }}";
            document.body.appendChild(newScript);
            // Update the currentScript variable
            currentScript = newScript;
            newScript.onload = function() {
                // Call the initMap function after loading the script
                if (typeof initMap === 'function') {
                    initMap();
                }
            };

            var divToHide = document.getElementById('location_popup_page_1_main').style.display = 'none';
            var divToHide = document.getElementById('location_popup_page_2_delivery').style.display = 'block';
            localStorage.setItem('modalShown', true);

        });
        document.getElementById('location_popup_pickup').addEventListener('click', function () {
            
            let currentScript = null;
            // Remove the current script
            if (currentScript) {
                currentScript.remove();
            }
            // Load the selected script
            const newScript = document.createElement('script');
            
            newScript.src = "{{ env('APP_URL_public', asset('')).'/js/map_homepage_pickup.js' }}";
            document.body.appendChild(newScript);
            // Update the currentScript variable
            currentScript = newScript;
            newScript.onload = function() {
                // Call the initMap function after loading the script
                if (typeof initMap === 'function') {
                    initMap();
                }
            };

            var divToHide = document.getElementById('location_popup_page_1_main').style.display = 'none';
            var divToHide = document.getElementById('location_popup_page_2_pickup').style.display = 'block';
            localStorage.setItem('modalShown', true);

        });
    </script>
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
@endif
