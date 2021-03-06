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
                        <h3 class="kt-portlet__head-title">الايفينتات </h3>
                        <div class="btns-box">
                            <a href="{{ route('events.create') }}" type="button" class="btn btn-outline-success mx-1 mb-1"> <i class="la la-plus"></i>  اضافة إيفينت </a>
                        </div>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START: NEW event DATATABLE-->
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <table class="standard table table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th class="text-center" style="width: 130px !important;"> الاسم </th>
                                <th>صورة الإيفينت</th>
                                <th>تاريخ بداية الإيفينت</th>
                                <th>تاريخ نهاية الإيفينت</th>
                                <th>المدرب</th>
                                <th class="action" style="width: 85px !important;">إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $index => $event)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <p class="mb-1">{{ $event->translate('ar')->name }}</p>
                                    <p class="mb-1">{{ $event->translate('en')->name }}</p>
                                </td>
                                <td class="text-center">
                                    <img alt="Pic"  width="80" src="{{ $event->image_path }}" />
                                </td>
                                <td>{{ $event->start_date .' - '.$event->start_time  }}</td>
                                <td>{{ $event->end_date .' - '.$event->end_time  }}</td>
                                <td>{{ $event->instructor->name }}</td>


                                <td align="right" class="d-flex">
                                    @include('dashboard.layouts.includes.partials._edit_btn',['route' => route('events.edit',['event'=>$event])])
                                    @include('dashboard.layouts.includes.partials._delete_btn',['route' => route('events.destroy',['event'=>$event])])
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <!--END: NEW event DATATABLE-->

            </div>
        </div>

    </div>
    <!-- END:: CONTENT -->
</div>

@endsection
