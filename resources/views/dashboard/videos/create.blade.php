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
                        <h3 class="kt-portlet__head-title"> اضافة فيديو جديد </h3>
                    </div>
                </div>
                <!--END:: TITLE-->

                <!--START:: ADD NEW EMPLOYEE FORM-->
                <form class="kt-form p-3" method="POST" action="{{ route('videos.store') }}">
                    <div class="row">
                        @csrf
                        <div class="col-12 d-block">


                            <div class="form-group col-12">
                                <div class="row">
                                    <label class="col-form-label col-12"> القسم </label>
                                    <div class="input-group-prepend col-12">
                                        <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i> </span>
                                        <select id="system-user-status-selector" class="form-control kt-selectpicker" data-size="7" data-live-search="true">
                                            <option value="0"> انترفيو </option>
                                            <option value="1"> مشروع   </option>
                                            <option value="2"> مقال    </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="system-user form-group col-12">
                                <div class="row">
                                    <label class="col-form-label col-12"> المشاريع </label>
                                    <div class="input-group-prepend col-12">
                                        <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i> </span>
                                        <select class="form-control kt-selectpicker" name="project_videoable_id" data-size="7" data-live-search="true">
                                            @foreach (\App\Project::all() as $project)
                                                <option value="{{ $project->id }}"> {{ $project->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="videoable_type" value="" class="videoable_type">

                            
                            <div class="system-article form-group col-12">
                                <div class="row">
                                    <label class="col-form-label col-12"> المقالات </label>
                                    <div class="input-group-prepend col-12">
                                        <span class="input-group-text"> <i class="la la-bookmark" style="font-size: 18px"></i> </span>
                                        <select class="form-control kt-selectpicker" name="article_videoable_id" data-size="7" data-live-search="true">
                                            @foreach (\App\Article::all() as $article)
                                                <option value="{{ $article->id }}"> {{ $article->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="kt-form__group--inline col-12">
                                <label class="col-form-label col-12">إسم الفيديو باللغة العربية</label>
                                <div class="input-group-prepend col-12 my-2">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="ar[name]" class="form-control d-block" placeholder="إسم الفيديو باللغة العربية">
                                </div>
                            </div>
                            <div class="kt-form__group--inline col-12">
                                <label class="col-form-label col-12">إسم الفيديو باللغة الانجليزيه</label>

                                <div class="input-group-prepend col-12 my-2">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="en[name]" class="form-control d-block" placeholder="إسم الفيديو باللغة الانجليزيه">
                                </div>
                            </div>

                            <div class="kt-form__group--inline col-12">
                                <label class="col-form-label col-12">لينك الفيديو</label>

                                <div class="input-group-prepend col-12 my-2">
                                    <span class="input-group-text"> <i class="la la-pencil" style="font-size: 18px"></i>
                                    </span>
                                    <input type="text" name="url" class="form-control d-block" placeholder="لينك الفيديو">
                                </div>
                            </div>

                            <div class="d-md-none kt-margin-b-10"></div>
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
