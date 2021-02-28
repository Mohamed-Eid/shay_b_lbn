@extends('dashboard.layouts.app')

@section('content')

<!-- START:: CONTENT -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="row">
        <div class="col-12">

            <div class="kt-portlet">

                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label d-flex justify-content-between w-100">
                        <h3 class="kt-portlet__head-title"> الرسائل </h3>
                    </div>
                </div>

                <!--START: CLIENTS DATATABLE-->
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <table class="standard table table-responsive-sm" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th> الاسم  </th>
                                <th> الرسالة </th>
                                <th> التاريخ </th>
                                <th class="action">إجراء</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $index => $message)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{$message->name}}
                                </td>
                                <td>
                                    <a href="javascript:;" type="button" class="kt-link kt-font-bold"
                                        data-toggle="modal" data-target="#message-{{ $message->id }}">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($message->message) , 50); !!}
                                    </a>
                                </td>
                                <td>
                                    {{$message->created_at->format('Y-m-d')}}
                                </td>

                                <td align="right">
                                    @include('dashboard.layouts.includes.partials._delete_btn',['route' => route('messages.destroy',['message'=>$message])])
                                </td>

                            </tr>  
                            @endforeach

                        </tbody>
                    </table>


                    @foreach ($messages as $index => $message)
                    <!-- START:: ADD MESSAGE MODAL -->
                    <div class="modal fade" id="message-{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> الرسالة :: {{ $message->subject }} </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="message-content lead text-justify py-3">
                                        {!! $message->message !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END:: ADD MESSAGE MODAL -->
                    @endforeach
                </div>
                <!--END: CLIENTS DATATABLE-->

            </div>
        </div>

    </div>
    <!-- END:: CONTENT -->

</div>


@endsection
