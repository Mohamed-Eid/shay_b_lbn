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
                        <h3 class="kt-portlet__head-title"> تعديل موظف  </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START:: ADD NEW EMPLOYEE FORM-->
                <form class="kt-form p-3" method="POST" action="{{ route('users.update',$user) }}">
                    <div class="row">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">اسم الموظف</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="الإسم">
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12">البريد الإلكترونى</label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-at" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="البريد الإلكترونى">
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                              <label class="col-form-label col-12"> صلاحية المستخدم </label>
                              <div class="input-group-prepend col-12">
                                <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                <select class="form-control kt-selectpicker" data-size="7" data-live-search="true">
                                  <option > مدير النظام </option>
                                  <option > صانع محتوي </option>
                                </select>
                              </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <label class="col-form-label col-12"> كلمة المرور </label>
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text"> <i class="la la-lock" style="font-size: 18px"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control"  placeholder=" كلمة المرور">
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
