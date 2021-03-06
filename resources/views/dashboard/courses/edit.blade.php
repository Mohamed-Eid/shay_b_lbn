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
                        <h3 class="kt-portlet__head-title"> تعديل كورس  </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START:: ADD NEW EMPLOYEE FORM-->
                <form class="kt-form p-3 " method="POST" action="{{ route('courses.update',$course) }}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-12 col-md-12">
                            <div class="row">
                                <label class="col-form-label col-12">صورة الكورس</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="file" name="image" onchange="changeImagePreview(event);" class="form-control d-block {{ input_has_error('image',$errors) }}" placeholder="Image">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'image'])
                                </div>
                                <div class="border mt-2">
                                    <img  width="150px" height="100px" src="{{ $course->image_path }}" alt="your image" />

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12"> القسم </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                    <select class="form-control kt-selectpicker" name="category_id" data-size="3" data-live-search="true">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12"> المدرب </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                    <select class="form-control kt-selectpicker" name="instructor_id" data-size="5" data-live-search="true">
                                        @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}" {{ $course->instructor_id == $instructor->id ? 'selected' : '' }}> {{ $instructor->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم الكورس باللغة العربية</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="ar[name]" value="{{ $course->translate('ar')->name }}" class="form-control {{ input_has_error('ar.name',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'ar.name'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم الكورس باللغة الانجليزية</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="en[name]" value="{{ $course->translate('en')->name }}" class="form-control {{ input_has_error('en.name',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'en.name'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <label class="col-form-label col-12"> الوصف باللغة العربية </label>
                                <div class="input-group-prepend col-12">
                                <textarea class="default-ar {{ input_has_error('ar.description',$errors) }}" name="ar[description]">{!! $course->translate('ar')->description !!}</textarea>
                                @include('dashboard.layouts.includes.partials._input_validate',['field' => 'ar.description'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="row">
                                <label class="col-form-label col-12"> الوصف باللغة الانجليزية </label>
                                <div class="input-group-prepend col-12">
                                    <textarea class="default-en {{ input_has_error('en.description',$errors) }}" name="en[description]">{!! $course->translate('en')->description !!}</textarea>
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'en.description'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12"> نوع الكورس </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                    <select class="form-control kt-selectpicker" name="type" data-size="2" data-live-search="true">
                                        <option value="online" {{ $course->type == "online" ? 'selected' : '' }}> Online </option>
                                        <option value="offline" {{ $course->type == "offline" ? 'selected' : '' }}> Offline </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">سعر الكورس</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="price" value="{{ $course->price }}" class="form-control {{ input_has_error('price',$errors) }}" placeholder="سعر الكورس">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'price'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">نسبه الخصم</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="number" min="0" max="99" value="{{ $course->discount }}" name="discount" class="form-control {{ input_has_error('discount',$errors) }}" placeholder="نسبه الخصم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'discount'])
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">رسالة الخصم</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="discount_message" value="{{ $course->discount_message }}" class="form-control {{ input_has_error('discount_message',$errors) }}" placeholder="رسالة الخصم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'discount_message'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-12">
                            <div class="row">
                                <label class="col-form-label col-12"> مفعل ؟ </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                    <select class="form-control kt-selectpicker" name="active" data-size="3" data-live-search="true">
                                        <option value="0" {{ $course->active == "0" ? "selected" : "" }}> لا </option>
                                        <option value="1" {{ $course->active == "1" ? "selected" : "" }}> نعم </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                                                <!-- START:: TITLE -->
                        <div class="kt-portlet__head col-12">
                            <div class="kt-portlet__head-label d-flex justify-content-between w-100">
                                <h3 class="kt-portlet__head-title text-center" style="width: 100%">  المميزات </h3>
                            </div>
                        </div>
                        <!--END:: TITLE-->

                        @foreach ($course->features as $feature)
                        <div class="row">
                                <div class="input-group-prepend col-6 my-2">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="old_features[{{ $feature->id }}][ar_name]" value="{{ $feature->translate('ar')->name }}" class="form-control d-block" placeholder="اسم الميزة باللغة العربية">
                                </div>

                                <div class="input-group-prepend col-6 my-2">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="old_features[{{ $feature->id }}][en_name]" value="{{ $feature->translate('en')->name }}" class="form-control d-block" placeholder="اسم الميزة باللغة الانجليزيه">
                                </div>
                                <div class="input-group-prepend col-12 my-2">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="old_features[{{ $feature->id }}][ar_description]" value="{{ $feature->translate('ar')->description }}" class="form-control d-block" placeholder="وصف الميزة باللغة العربية">
                                </div>

                                <div class="input-group-prepend col-12 my-2">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="old_features[{{ $feature->id }}][en_description]" value="{{ $feature->translate('en')->description }}" class="form-control d-block" placeholder="وصف الميزة باللغة الانجليزيه">
                                </div>

                            <div class="kt-form__group--inline col-2 mt-2">
                                <a href="{{ route('features.destroy',$feature) }}" class="delete_investigation btn-sm btn btn-label-danger btn-bold">
                                    <i class="la la-trash-o"></i>
                                    حذف
                                </a>
                            </div>
                        </div>

                        @endforeach


                        <div id="kt_repeater_2" class="col-12">
                            <div class="form-group form-group-last" id="kt_repeater_2">
                                <div data-repeater-list="features" class="col-12">
                                    <div data-repeater-item class="form-group align-items-center">
                                        <div class="col-12 d-flex" style="display: none;">
                                            <div class="row">
                                                    <div class="input-group-prepend col-6 my-2">
                                                        <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                                        </span>
                                                        <input type="text" name="ar_name" class="form-control d-block" placeholder="اسم الميزة باللغة العربية">
                                                    </div>
                
                                                    <div class="input-group-prepend col-6 my-2">
                                                        <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                                        </span>
                                                        <input type="text" name="en_name" class="form-control d-block" placeholder="اسم الميزة باللغة الانجليزيه">
                                                    </div>
                                                    <div class="input-group-prepend col-12 my-2">
                                                        <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                                        </span>
                                                        <input type="text" name="ar_description" class="form-control d-block" placeholder="وصف الميزة باللغة العربية">
                                                    </div>
                
                                                    <div class="input-group-prepend col-12 my-2">
                                                        <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                                        </span>
                                                        <input type="text" name="en_description" class="form-control d-block" placeholder="وصف الميزة باللغة الانجليزيه">
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
                                        <i class="la la-plus"></i> إضافة ميزة
                                    </a>
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


@endpush
