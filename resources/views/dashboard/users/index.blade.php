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
                        <h3 class="kt-portlet__head-title"> قائمة الموظفين </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START: NEW USER DATATABLE-->
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <table class="standard table table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th class="text-center" style="width: 130px !important;"> الاسم </th>
                                <th>البريد الإلكتروني</th>
                                <th class="action" style="width: 85px !important;">إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <p class="mb-1">{{ $user->name }}</p>
                                    <span
                                        class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded"
                                        style="height: 25px; width: 80%">
                                        مستخدم للنظام
                                    </span>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td align="right" class="d-flex">
                                    @include('dashboard.layouts.includes.partials._edit_btn',['route' => route('users.edit',['user'=>$user])])
                                    @include('dashboard.layouts.includes.partials._delete_btn',['route' => route('users.destroy',['user'=>$user])])
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <!--END: NEW USER DATATABLE-->

            </div>
        </div>

    </div>
    <!-- END:: CONTENT -->
</div>

@endsection
