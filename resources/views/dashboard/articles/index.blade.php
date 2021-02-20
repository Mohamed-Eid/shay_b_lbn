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
                        <h3 class="kt-portlet__head-title"> قائمة المقالات </h3>
                        <div class="btns-box">
                            <a href="{{ route('articles.create') }}" type="button" class="btn btn-outline-success mx-1 mb-1"> <i class="la la-plus"></i>  اضافة مشروع </a>
                        </div>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START: NEW article DATATABLE-->
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <table class="standard table table-responsive-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th class="text-center" style="width: 130px !important;"> الاسم </th>
                                <th>صورة المقال</th>
                                <th>هيدر المقال</th>
                                <th class="action" style="width: 85px !important;">إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $index => $article)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <p class="mb-1">{{ $article->translate('ar')->name }}</p>
                                    <p class="mb-1">{{ $article->translate('en')->name }}</p>
                                </td>

                                <td class="text-center">
                                    <img alt="Pic"  width="80" src="{{ $article->image_path }}" />
                                </td>

                                <td class="text-center">
                                    <img alt="Pic"  width="80"  src="{{ $article->header_path }}" />
                                </td>

                                <td align="right" class="d-flex">
                                    @include('dashboard.layouts.includes.partials._edit_btn',['route' => route('articles.edit',['article'=>$article])])
                                    @include('dashboard.layouts.includes.partials._delete_btn',['route' => route('articles.destroy',['article'=>$article])])
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <!--END: NEW article DATATABLE-->

            </div>
        </div>

    </div>
    <!-- END:: CONTENT -->
</div>

@endsection
