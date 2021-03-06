@extends('dashboard.layouts.app')

@section('content')

<!-- START:: CONTENT -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="row">
        <div class="col-12">
            <!--START::PORTEL-->
            <div class="kt-portlet">

                <!-- START:: TITLE -->
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label d-flex justify-content-between w-100">
                        <h3 class="kt-portlet__head-title">الكورسات </h3>
                        <div class="btns-box">
                            <a href="{{ route('courses.create') }}" type="button" class="btn btn-outline-success mx-1 mb-1"> <i class="la la-plus"></i>  اضافة كورس </a>
                        </div>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START: NEW course DATATABLE-->
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <table class="standard table table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th class="text-center" style="width: 130px !important;"> الاسم </th>
                                <th>صورة الكورس</th>
                                <th>القسم</th>
                                <th>المدرب</th>
                                <th class="action" style="width: 85px !important;">إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $index => $course)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <p class="mb-1">{{ $course->translate('ar')->name }}</p>
                                    <p class="mb-1">{{ $course->translate('en')->name }}</p>
                                </td>
                                <td class="text-center">
                                    <img alt="Pic"  width="80" src="{{ $course->image_path }}" />
                                </td>
                                <td class="text-center">
                                    <p class="mb-1">{{ $course->category->translate('ar')->name }}</p>
                                    <p class="mb-1">{{ $course->category->translate('en')->name }}</p>
                                </td>
                                <td>{{ $course->instructor->name }}</td>
 


                                <td align="right" class="d-flex">
                                    {{-- <a href="{{ route('courses.sections.index',$course) }}" class="kt-badge kt-badge--outline kt-badge--primary" data-skin="dark"
                                        data-toggle="kt-tooltip" data-placement="top" title="سكاشن">
                                        <i class="la la-database"></i>
                                    </a> --}}
                                    @include('dashboard.layouts.includes.partials._edit_btn',['route' => route('courses.edit',['course'=>$course])])
                                    @include('dashboard.layouts.includes.partials._delete_btn',['route' => route('courses.destroy',['course'=>$course])])
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <!--END: NEW course DATATABLE-->

            </div>
        </div>

    </div>
    <!-- END:: CONTENT -->
</div>

@endsection
