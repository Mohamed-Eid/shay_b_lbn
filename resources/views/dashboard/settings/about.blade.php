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
                        <h3 class="kt-portlet__head-title"> من نحن ؟ </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START:: ADD NEW EMPLOYEE FORM-->
                <form class="kt-form p-3 " method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">صورة الصفحة</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="file" name="{{ get_setting_by_key('about_image')->id }}[one_value]" onchange="changeImagePreview(event);" class="form-control d-block " placeholder="Image" >
                                </div>
                                <div class="border mt-2">
                                    <img  width="150px" height="100px" src="{{ get_setting_by_key('about_image')->image_path }}" alt="your image" />

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <label class="col-form-label col-12"> الوصف باللغة العربية </label>
                                <div class="input-group-prepend col-12">
                                <textarea class="default-ar" name="{{ get_setting_by_key('about')->id }}[ar][value]">{!! get_setting_by_key('about')->translate('ar')->value ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <label class="col-form-label col-12"> الوصف باللغة الانجليزية </label>
                                <div class="input-group-prepend col-12">
                                    <textarea class="default-en" name="{{ get_setting_by_key('about')->id }}[en][value]">{!! get_setting_by_key('about')->translate('en')->value ?? '' !!}</textarea>
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

<script>
    ClassicEditor
        .create( document.querySelector( '.goals-ar' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
    } );
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '.goals-en' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
    } );
</script>
		<!--begin::Page Scripts(used by this page) -->

        <script>
            function readURL(input) {
                
                el = 'input[name='+ "'" + input.name + "'" +']';
                $(el).on('change', function () {
                    console.log(el + ' - ' +'changed');
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = (e) => {
                            $(el).next('img').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    };
                });
            }
        </script>
    <script src="{{ asset('assets/js/pages/crud/file-upload/ktavatar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>


@endpush
