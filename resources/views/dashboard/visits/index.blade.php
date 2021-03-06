@extends('dashboard.layouts.app')

@section('content')

<!-- START:: CONTENT -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="row">
        <div class="col-12">

            <div class="kt-portlet">

                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label d-flex justify-content-between w-100">
                        <h3 class="kt-portlet__head-title"> قائمة الزيارات </h3>
                    </div>
                </div>

                <!--START: visits DATATABLE-->
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <table class="standard table table-responsive-sm" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th> اسم الحالة </th>
                                <th> رقم الهاتف </th>
                                <th> اسم المستشار </th>
                                <th> رقم هاتف المستشار </th>
                                <th> الوقت </th>
                                <th> حالة الزياره </th>
                                <th> طريقة الدفع </th>
                                <th> وقت إتشاء الطلب </th>
                                <th class="action">إجراء</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visits as $index => $visit)
                                <tr>
                                    <td> {{ $index + 1 }} </td>

                                    <td> {{ $visit->client->name }}  </td>
                                    <td> {{ $visit->client->mobile }}  </td>
                                    <td> 
                                        {{ $visit->consultant->name  }}
                                    </td>
                                    <td> 
                                        {{ $visit->consultant->phone  }}
                                    </td>
                                    <td> 
                                        {{ $visit->available->available_date .' - '. $visit->available->available_time  }}
                                    </td>
                                    <td> 
                                        {{ $visit->status  }}
                                    </td>
                                    <td> 
                                        {{ $visit->payment_method  }}
                                    </td>
                                    <td> {{ $visit->created_at->diffForHumans() }} </td>

                                    <td align="right">
                                        {{-- <a href="{{ route('visits.show',$visit) }}" class="kt-badge kt-badge--outline kt-badge--success"
                                            data-skin="dark" data-toggle="kt-tooltip" title="تفاصيل">
                                            <i class="la la-expand"></i>
                                        </a> --}}

                                        @include('dashboard.layouts.includes.partials._delete_btn',['route' => route('visits.destroy',['visit'=>$visit])])

                                    </td>
                                </tr>
                                <div class="modal fade" id="message-{{ $visit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> ملاحظات </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
            
                                            <div class="modal-body">
                                                <div class="message-content lead text-justify py-3">
                                                    {!! $visit->notes !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <!--END: visits DATATABLE-->

            </div>
        </div>

    </div>
    <!-- END:: CONTENT -->

</div>


@endsection
