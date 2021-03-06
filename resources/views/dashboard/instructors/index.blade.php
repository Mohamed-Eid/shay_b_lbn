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
                        <h3 class="kt-portlet__head-title"> قائمة المدربين </h3>
                        <div class="btns-box">
                            <a href="{{ route('instructors.create') }}" type="button" class="btn btn-outline-success mx-1 mb-1"> <i class="la la-plus"></i>  اضافة مدرب </a>
                        </div>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START: NEW instructor DATATABLE-->
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <table class="standard table table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th class="text-center" style="width: 130px !important;"> الاسم </th>
                                <th>نبذة مختصرة</th>
                                <th>الصورة</th>
                                <th class="action" style="width: 85px !important;">إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($instructors as $index => $instructor)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $instructor->name }}</td>
                                <td class="text-center">
                                    <a href="javascript:;" type="button" class="kt-link kt-font-bold"
                                    data-toggle="modal" data-target="#message-{{ $instructor->id }}">
                                    {!!  $instructor->words(3)  !!}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <img  width="50px" height="70px"  src="{{ $instructor->image_path }}" alt="your image" />
                                </td>
                                <td align="right" class="d-flex">
                                    @include('dashboard.layouts.includes.partials._edit_btn',['route' => route('instructors.edit',['instructor'=>$instructor])])
                                    @include('dashboard.layouts.includes.partials._delete_btn',['route' => route('instructors.destroy',['instructor'=>$instructor])])
                                </td>
                            </tr>
                            <!-- START:: ADD MESSAGE MODAL -->
                            <div class="modal fade" id="message-{{ $instructor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> نبذه مختصرة  </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="message-content lead text-justify py-3">
                                                {!! $instructor->bio !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END:: ADD MESSAGE MODAL -->
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <!--END: NEW instructor DATATABLE-->

            </div>
        </div>

    </div>
    <!-- END:: CONTENT -->
</div>

@endsection
