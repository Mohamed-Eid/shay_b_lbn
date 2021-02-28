@extends('dashboard.layouts.app')

@section('content')
<!-- START:: CONTENT -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="row">
        <div class="col-12">

            <div class="kt-portlet">


                <!-- START:: TITLE -->
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label d-flex justify-content-between w-100">
                        <h3 class="kt-portlet__head-title"> اضافة مستشار جديد </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START:: ADD NEW EMPLOYEE FORM-->
                <form class="kt-form p-3 " method="POST" action="{{ route('consultants.store') }}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf


                        <div class="form-group col-12 col-md-12">
                            <div class="row">
                                <label class="col-form-label col-12">صورة المستشار</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="file" name="image" onchange="changeImagePreview(event);" class="form-control d-block {{ input_has_error('image',$errors) }}" placeholder="Image">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'image'])
                                </div>
                                <div class="border mt-2">

                                </div>
                            </div>
                        </div>


                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم المستشار باللغة العربية</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="ar[name]" class="form-control {{ input_has_error('ar.name',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'ar.name'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم المستشار باللغة الانجليزية</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="en[name]" class="form-control {{ input_has_error('en.name',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'en.name'])
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <div class="row">
                                <label class="col-form-label col-12"> نبذة عن المستشار باللغة العربية </label>
                                <div class="input-group-prepend col-12">
                                <textarea class="default-ar {{ input_has_error('ar.bio',$errors) }}" name="ar[bio]"></textarea>
                                @include('dashboard.layouts.includes.partials._input_validate',['field' => 'ar.bio'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <label class="col-form-label col-12"> نبذة عن المستشار باللغة الانجليزية </label>
                                <div class="input-group-prepend col-12">
                                    <textarea class="default-en {{ input_has_error('en.bio',$errors) }}" name="en[bio]"></textarea>
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'en.bio'])
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12"> العنوان باللغة العربية</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="ar[address]" class="form-control {{ input_has_error('ar.address',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'ar.address'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12"> العنوان باللغة الانجليزية</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="en[address]" class="form-control {{ input_has_error('en.address',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'en.address'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-12">
                            <div class="row">
                                <label class="col-form-label col-12"> البادج </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                    <select class="form-control kt-selectpicker" name="badges[]" data-size="3" data-live-search="true" multiple>
                                        <option value="selected_badge"> selected badge  </option>
                                        <option value="recent_badge"> recent badge    </option>
                                        <option value="our_stars_badge"> our stars badge </option>
                                        <option value="certificated"> Certificated </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">رقم الهاتف</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="phone" class="form-control {{ input_has_error('phone',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'phone'])
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">رابط الخريطة </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="map_link" class="form-control {{ input_has_error('map_link',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'map_link'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">عدد سنين الخبرة</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="experince" class="form-control {{ input_has_error('experince',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'experince'])
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">سعر الحجز</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="cost" class="form-control {{ input_has_error('cost',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'cost'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">نسبة الخصم</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="discount" class="form-control {{ input_has_error('discount',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'discount'])
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">نسبة التطبيق</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="comession" class="form-control {{ input_has_error('comession',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'comession'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="delivery-content">
                                <div class="content">
                                    <p class="name">الموقع</p>
                                    <input type="hidden" name="location" value="30.019651308053827,31.255714780351674">
                                    <div class="map">
                                        <div class="form-group">
                                            <input type="text" id="pac-input" class="form-control" placeholder="" name="address" value="" >
                                            <input type="hidden" id="latitude" name="lat" class="form-control" value="" required>
                                            <input type="hidden" id="longitude" name="lng" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div id="map" style="height: 300px;width: 100%;"></div>
                            </div>
                        </div>

                        <div class="kt-portlet__body col-12">

                            <div class="kt-form__section kt-form__section--first">
                                <h3 class="kt-portlet__head-title text-center" style="width: 100%">  المواعيد المتاحه </h3>

                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div id="kt_repeater_1" class="col-12">
                                    <div class="form-group form-group-last" id="kt_repeater_1">
                                        <div data-repeater-list="availables" class="col-12">
                                            <div data-repeater-item class="form-group align-items-center">
                                                <div class="col-12 d-flex">

                                                    <div class="kt-form__group--inline col-4">
                                                        <div class="input-group-prepend col-12 my-2">
                                                            <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                                            </span>
                                                            <input type="date" name="available_date" class="form-control d-block" placeholder="التاريخ الوقت">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="kt-form__group--inline col-4">
                                                        <div class="input-group-prepend col-12 my-2">
                                                            <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                                            </span>
                                                            <input type="time" name="available_time" class="form-control d-block" placeholder="إسم الفيديو باللغة الانجليزيه">
                                                        </div>
                                                    </div>

                                                    <div class="kt-form__group--inline col-1 mt-2">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                            <i class="la la-trash-o"></i>
                                                            حذف
                                                        </a>
                                                    </div>
        
                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last">
                                        <label class="col-lg-2 col-form-label"></label>
                                        <div class="col-lg-4">
                                            <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                                                <i class="la la-plus"></i> إضافة معاد
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>



                        <div class="form-group col-12 px-4">
                            <div class="input-group">
                                <div class="row">
                                    <button type="submit" class="btn btn-success"
                                        style="background-color:#17b978; border:none;">حفظ</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                <!--END::ADD NEW EMPLOYEE FORM-->

            </div>
        </div>

    </div>

    <!-- END:: CONTENT -->
</div>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '.default-ar' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
        } );
    </script>

<script>
    ClassicEditor
        .create( document.querySelector( '.default-en' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
    } );
</script>
		<!--begin::Page Scripts(used by this page) -->

    <script src="{{ asset('assets/js/pages/crud/file-upload/ktavatar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>

    <script>
        $("#pac-input").focusin(function() {
            $(this).val('');
        });
        $('#latitude').val('');
        $('#longitude').val('');
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.740691, lng: 46.6528521 },
                zoom: 16,
                mapTypeId: 'roadmap'
            });
           
            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow,marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('dsdsdsdsddsd');
                handleLocationError(false, infoWindow, map.getCenter());
            }
            var geocoder = new google.maps.Geocoder();
            var marker;
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                console.log(SelectedLatLng);
                //added by me
    
                //map.setZoom(8);
                if(!marker || !marker.setPosition){
                    deleteMarkers();
    
                    marker = new google.maps.Marker({
                        position: SelectedLatLng,
                        map: map
                    });
                    $('#latitude').val(marker.position.lat());
                    $('#longitude').val(marker.position.lng());
                }else{
                    marker.setPosition(SelectedLatLng);
                    $('#latitude').val(marker.position.lat());
                    $('#longitude').val(marker.position.lng());
                }
    
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });
            function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());
                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
            }
            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            //$("#pac-input").val("ابحث عن منطقة  ");
            $("#pac-input").attr('placeholder', 'ابحث عن منطقة ');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];
            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjuzA2dGe0KgLeVzjTGh9W6bvixhrjsQs&libraries=places&callback=initAutocomplete&language=ar&region=EG
        async defer"></script> 

@endpush