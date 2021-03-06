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
                        <h3 class="kt-portlet__head-title">دروس دورة : {{ $course->translate('ar')->name }}</h3>
                        <div class="btns-box">
                            <a href="{{ route('courses.lessons.create',[$course ]) }}" type="button" class="btn btn-outline-success mx-1 mb-1"> <i class="la la-plus"></i>  اضافة درس </a>
                        </div>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START: NEW section DATATABLE-->
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <table class="standard table table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: auto !important;">#</th>
                                <th class="text-center"> الاسم </th>
                                <th class="text-center"> رابط الفيديو </th>
                                <th class="text-center"> مدة الدرس </th>
                                <th class="text-center"> حالة الدرس </th>
                                <th class="action" style="width: 85px !important;">إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $index => $lesson)
                            
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <p class="mb-1">{{ $lesson->translate('ar')->name }}</p>
                                    <p class="mb-1">{{ $lesson->translate('en')->name }}</p>
                                </td>
                                <td class="text-center">{{ $lesson->url }}</td>
                                <td class="text-center">{{ $lesson->duration }}</td>
                                <td class="text-center">{{ $lesson->status }}</td>

                                <td align="right" class="d-flex">
                                    @include('dashboard.layouts.includes.partials._edit_btn',['route' => route('courses.lessons.edit',['course'=>$course , 'lesson' => $lesson ])])
                                    @include('dashboard.layouts.includes.partials._delete_btn',['route' => route('courses.lessons.destroy',['course'=>$course,'lesson' => $lesson ])])
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
                <!--END: NEW section DATATABLE-->

            </div>
        </div>

    </div>
    <!-- END:: CONTENT -->
</div>

@endsection
