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
                        <h3 class="kt-portlet__head-title"> تعديل درس  </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START:: ADD NEW EMPLOYEE FORM-->
                <form class="kt-form p-3 " method="POST" action="{{ route('courses.lessons.update',[$course,$lesson]) }}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        @method('PUT')

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم الدرس باللغة العربية</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="ar[name]" value="{{ $lesson->translate('ar')->name }}" class="form-control {{ input_has_error('ar.name',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'ar.name'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم الدرس باللغة الانجليزية</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="en[name]" value="{{ $lesson->translate('en')->name }}" class="form-control {{ input_has_error('en.name',$errors) }}" placeholder="الإسم">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'en.name'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12"> حالة الدرس </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                    <select class="form-control kt-selectpicker" name="status" data-size="2" data-live-search="true">
                                        <option value="enrollers" {{ $lesson->status == "enrollers" ? "selected" : "" }}> للمشتركين فقط </option>
                                        <option value="visitors" {{ $lesson->status == "visitors" ? "selected" : "" }}> للزوار </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">رابط الدرس</label>
                                <div class="input-group-prepend col-12 timepicker">
                                    <span class="input-group-text">
                                        <i class="la la-file-video-o" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="url" value="{{ $lesson->url }}" class="form-control {{ input_has_error('url',$errors) }}" placeholder="رابط الفديو">
                                    @include('dashboard.layouts.includes.partials._input_validate',['field' => 'url'])
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">مدة الدرس</label>
                                <div class="input-group-prepend col-12 timepicker">
                                    <span class="input-group-text">
                                        <i class="la la-clock-o" style="font-size: 18px"></i>
                                    </span>
                                    <input class="form-control" value="{{ $lesson->duration }}"  name="duration" id="kt_timepicker_2" readonly placeholder="Select time" type="text" />
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
<script src="https://cdn.jsdelivr.net/npm/html-duration-picker/dist/html-duration-picker.min.js"></script>
@endpush