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
                                    <select class="form-control kt-selectpicker" name="badges" data-size="3" data-live-search="true" multiple>
                                        <option value="selected_badge"> selected badge  </option>
                                        <option value="recent_badge"> recent badge    </option>
                                        <option value="our_stars_badge"> our stars badge </option>
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