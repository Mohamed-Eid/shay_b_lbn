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
                        <h3 class="kt-portlet__head-title"> اضافة موظف جديد </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START:: ADD NEW EMPLOYEE FORM-->
                <form class="kt-form p-3" method="POST" action="{{ route('users.store') }}">
                    <div class="row">
                        @csrf
                        <div class="form-group col-12 col-md-4">
                            <div class="row">
                                <label class="col-form-label col-12">اسم الموظف</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control" placeholder="الإسم">
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-12 col-md-4">
                            <div class="row">
                                <label class="col-form-label col-12">البريد الإلكترونى</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-at" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="email" class="form-control" placeholder="البريد الإلكترونى">
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <div class="row">
                                <label class="col-form-label col-12"> كلمة المرور </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-lock" style="font-size: 18px"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder=" كلمة المرور">
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
