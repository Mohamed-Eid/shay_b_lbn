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
                        <h3 class="kt-portlet__head-title"> اضافة مدرب جديد </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START:: ADD NEW EMPLOYEE FORM-->
                <form class="kt-form p-3" method="POST" action="{{ route('instructors.store') }}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم المدرب باللغة العربيه</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="ar[name]" class="form-control"
                                        placeholder="اسم المدرب باللغة العربيه">
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم المدرب باللغة الانجليزيه</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-at" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="en[name]" class="form-control"
                                        placeholder="اسم المدرب باللغة الانجليزيه">
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

                        <div class="form-group col-12 col-md-12">
                            <div class="row">
                                <label class="col-form-label col-12">صورة المدرب</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="file" name="image" onchange="changeImagePreview(event);" class="form-control d-block {{ input_has_error('image',$errors) }}" placeholder="Image">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'image'])
                                </div>
                                <div class="border mt-2">
                                    <img  width="150px" height="100px" src="{{ asset('uploads/instructors/instructor.png') }}" alt="your image" />
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
@endpush