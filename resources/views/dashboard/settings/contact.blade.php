@extends('dashboard.layouts.app')

@section('content')


<div class="row">
    <div class="col-12">

        <div class="kt-portlet">


            <!--START:: ADD NEW EMPLOYEE FORM-->
            <form class="kt-form p-3" method="POST" action="{{ route('settings.update') }}">
                @csrf
                @method('PUT')
                <!-- START:: TITLE -->
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label d-flex justify-content-between w-100">
                        <h3 class="kt-portlet__head-title"> روابط مواقع التواصل </h3>
                    </div>
                </div>
                <!--END:: TITLE-->
                <div class="row">

                    <div class="form-group col-12 col-md-3">
                        <div class="row">
                            <label class="col-form-label col-12">فيسبوك</label>
                            <div class="input-group-prepend col-12">
                                <span class="input-group-text"> <i class="la la-facebook" style="font-size: 18px"></i>
                                </span>
                                <input type="text" name="{{ get_setting_by_key('facebook')->id }}[one_value]" value="{{ get_setting_by_key('facebook')->one_value}}" class="form-control" placeholder="فيسبوك">
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-12 col-md-3">
                        <div class="row">
                            <label class="col-form-label col-12">تويتر</label>
                            <div class="input-group-prepend col-12">
                                <span class="input-group-text"> <i class="la la-twitter" style="font-size: 18px"></i> </span>
                                <input type="text" name="{{ get_setting_by_key('twitter')->id }}[one_value]" value="{{ get_setting_by_key('twitter')->one_value}}" class="form-control" placeholder="تويتر">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-12 col-md-3">
                        <div class="row">
                            <label class="col-form-label col-12"> يوتيوب</label>
                            <div class="input-group-prepend col-12">
                                <span class="input-group-text"> <i class="la la-youtube" style="font-size: 18px"></i>
                                </span>
                                <input type="text" name="{{ get_setting_by_key('youtube')->id }}[one_value]" value="{{ get_setting_by_key('youtube')->one_value}}" class="form-control" placeholder="يوتيوب">
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-12 col-md-3">
                        <div class="row">
                            <label class="col-form-label col-12"> انستجرام</label>
                            <div class="input-group-prepend col-12">
                                <span class="input-group-text"> <i class="la la-instagram" style="font-size: 18px"></i>
                                </span>
                                <input type="text" name="{{ get_setting_by_key('instagram')->id }}[one_value]" value="{{ get_setting_by_key('instagram')->one_value}}" class="form-control" placeholder=" انستجرام">
                            </div>
                        </div>
                    </div>

                </div>


                <!-- START:: TITLE -->
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label d-flex justify-content-between w-100">
                        <h3 class="kt-portlet__head-title"> العناوين </h3>
                    </div>
                </div>
                <!--END:: TITLE-->
                <div class="row">
                    <div class="form-group col-md-4">
                            <label class="col-form-label my-2 col-12">المقر الرئيسي</label>
                            <div class="input-group-prepend my-2 col-12">
                                <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i>
                                </span>
                                <input type="text" name="{{ get_setting_by_key('address_1')->id}}[one_value]" value="{{ get_setting_by_key('address_1')->one_value}}" class="form-control" placeholder="اسم الفرع">
                            </div>

                            <div class="input-group-prepend my-2 col-12">
                                <span class="input-group-text"> <i class="la la-map-marker" style="font-size: 18px"></i>
                                </span>
                                <input type="text" name="{{ get_setting_by_key('address_1_address')->id}}[one_value]" value="{{ get_setting_by_key('address_1_address')->one_value}}" class="form-control" placeholder="العنوان">
                            </div>

                            <div class="input-group-prepend my-2 col-12">
                                <span class="input-group-text"> <i class="la la-mobile" style="font-size: 18px"></i>
                                </span>
                                <input type="text" name="{{ get_setting_by_key('address_1_phone')->id}}[one_value]" value="{{ get_setting_by_key('address_1_phone')->one_value}}" class="form-control" placeholder="الهاتف">
                            </div>

                            <div class="input-group-prepend my-2 col-12">
                                <span class="input-group-text"> <i class="la la-envelope" style="font-size: 18px"></i>
                                </span>
                                <input type="text" name="{{ get_setting_by_key('address_1_email')->id}}[one_value]" value="{{ get_setting_by_key('address_1_email')->one_value}}" class="form-control" placeholder="البريد الالكترونى">
                            </div>

                            <div class="input-group-prepend my-2 col-12">
                                <div class="input-group-prepend  col-12">
                                    <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i> 
                                    </span>
                                    <select class="form-control kt-selectpicker" data-size="3" data-live-search="true" name="{{ get_setting_by_key('address_1_active')->id}}[one_value]">
                                        <option>عرض فى صفحة تواصل معنا</option>
                                        <option value="1" {{ get_setting_by_key('address_1_active')->one_value == "1" ? 'selected' : ''}}>نعم</option>
                                        <option value="0" {{ get_setting_by_key('address_1_active')->one_value == "0" ? 'selected' : ''}}>لا</option>
                                    </select>
                                </div>
                            </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="col-form-label my-2 col-12"> اسم الفرع</label>
                        <div class="input-group-prepend my-2 col-12">
                            <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i>
                            </span>
                            <input type="text" name="{{ get_setting_by_key('address_2')->id}}[one_value]" value="{{ get_setting_by_key('address_2')->one_value}}" class="form-control" placeholder="اسم الفرع">
                        </div>

                        <div class="input-group-prepend my-2 col-12">
                            <span class="input-group-text"> <i class="la la-map-marker" style="font-size: 18px"></i>
                            </span>
                            <input type="text" name="{{ get_setting_by_key('address_2_address')->id}}[one_value]" value="{{ get_setting_by_key('address_2_address')->one_value}}" class="form-control" placeholder="العنوان">
                        </div>

                        <div class="input-group-prepend my-2 col-12">
                            <span class="input-group-text"> <i class="la la-mobile" style="font-size: 18px"></i>
                            </span>
                            <input type="text" name="{{ get_setting_by_key('address_2_phone')->id}}[one_value]" value="{{ get_setting_by_key('address_2_phone')->one_value}}" class="form-control" placeholder="الهاتف">
                        </div>

                        <div class="input-group-prepend my-2 col-12">
                            <span class="input-group-text"> <i class="la la-envelope" style="font-size: 18px"></i>
                            </span>
                            <input type="text" name="{{ get_setting_by_key('address_2_email')->id}}[one_value]" value="{{ get_setting_by_key('address_2_email')->one_value}}" class="form-control" placeholder="البريد الالكترونى">
                        </div>

                        <div class="input-group-prepend my-2 col-12">
                            <div class="input-group-prepend  col-12">
                                <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i> 
                                </span>
                                <select class="form-control kt-selectpicker" data-size="3" data-live-search="true" name="{{ get_setting_by_key('address_2_active')->id}}[one_value]">
                                    <option>عرض فى صفحة تواصل معنا</option>
                                    <option value="1" {{ get_setting_by_key('address_2_active')->one_value == "1" ? 'selected' : ''}}>نعم</option>
                                    <option value="0" {{ get_setting_by_key('address_2_active')->one_value == "0" ? 'selected' : ''}}>لا</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="col-form-label my-2 col-12">الفرع الثانى</label>
                        <div class="input-group-prepend my-2 col-12">
                            <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i>
                            </span>
                            <input type="text" name="{{ get_setting_by_key('address_3')->id}}[one_value]" value="{{ get_setting_by_key('address_3')->one_value}}" class="form-control" placeholder="اسم الفرع">
                        </div>

                        <div class="input-group-prepend my-2 col-12">
                            <span class="input-group-text"> <i class="la la-map-marker" style="font-size: 18px"></i>
                            </span>
                            <input type="text" name="{{ get_setting_by_key('address_3_address')->id}}[one_value]" value="{{ get_setting_by_key('address_3_address')->one_value}}" class="form-control" placeholder="العنوان">
                        </div>

                        <div class="input-group-prepend my-2 col-12">
                            <span class="input-group-text"> <i class="la la-mobile" style="font-size: 18px"></i>
                            </span>
                            <input type="text" name="{{ get_setting_by_key('address_3_phone')->id}}[one_value]" value="{{ get_setting_by_key('address_3_phone')->one_value}}" class="form-control" placeholder="الهاتف">
                        </div>

                        <div class="input-group-prepend my-2 col-12">
                            <span class="input-group-text"> <i class="la la-envelope" style="font-size: 18px"></i>
                            </span>
                            <input type="text" name="{{ get_setting_by_key('address_3_email')->id}}[one_value]" value="{{ get_setting_by_key('address_3_email')->one_value}}" class="form-control" placeholder="البريد الالكترونى">
                        </div>

                        <div class="input-group-prepend my-2 col-12">
                            <div class="input-group-prepend  col-12">
                                <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i> 
                                </span>
                                <select class="form-control kt-selectpicker" data-size="3" data-live-search="true" name="{{ get_setting_by_key('address_3_active')->id}}[one_value]">
                                    <option>عرض فى صفحة تواصل معنا</option>
                                    <option value="1" {{ get_setting_by_key('address_3_active')->one_value == "1" ? 'selected' : ''}}>نعم</option>
                                    <option value="0" {{ get_setting_by_key('address_3_active')->one_value == "0" ? 'selected' : ''}}>لا</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label class="col-form-label my-2 col-12"> الخريطة </label>
                        <div class="input-group-prepend my-2 col-12">
                            <textarea name="{{ get_setting_by_key('map')->id}}[one_value]" class="form-control">{{ get_setting_by_key('map')->one_value}}</textarea>
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
            </form>
            <!--END::ADD NEW EMPLOYEE FORM-->

        </div>
    </div>

</div>

<!-- END:: CONTENT -->
@endsection
