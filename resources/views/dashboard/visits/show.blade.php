@extends('dashboard.layouts.app')

@section('content')


<!-- START:: CONTENT -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="row">
        <div class="col-12">

        <div class="kt-portlet">

            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label d-flex justify-content-between w-100">
                    <h3 class="kt-portlet__head-title">#{{ $order->id }}  تفاصيل الطلب </h3>
                </div>
            </div>

        <!--START: REQUEST DETAILS TABLE -->
        <div class="kt-portlet__body kt-portlet__body--fit mb-4 px-4">

            <table class="table mt-5">
                <thead class="thead-dark text-center">
                    <tr>
                        <th> تفاصيل الطلب  </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr class="border-bottom">
                    <td>

                        <div class="row">
                            <div class="col-4">
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2"> العميل : </span>
                                    <a href="{{ route('clients.show',$order->client_id) }}" class="kt-link kt-link--state kt-link--info"> {{ $order->client->name ?? $order->client->mobile }} </a>
                                </p>
            
                                <p> 
                                    @if ($order->drivers)
                                    @foreach ($order->drivers as $driver)
                                    <span class="kt-font-warning kt-font-bolder mx-2"> اسم السائق : </span>
                                    <a href="DriverProfile.php" class="kt-link kt-link--state kt-link--info"> 
                                        {{ $driver->name }} - 
                                        <span class="custome-badge kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded p-2" style="width: auto; height: auto;">
                                            نوع الطلب :  {{ $driver->pivot->type }}  
                                        </span>
                                    </a>
                                    <br>
                                    @endforeach
                                    @endif
                                </p>
            
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2">  تاريخ التوصيل : </span>
                                    {{ $order->receipt_date }}
                                </p>
            
                                <p>
                                    <span class="kt-font-warning kt-font-bolder mx-2">  وقت التوصيل : </span>
                                    {{ $order->receipt_time }}
                                </p>
            
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2">   رقم هاتف المستلم : </span>
                                    {{ $order->address->phone }}
                                </p>
            
                                <span class="custome-badge kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded p-2" style="width: auto; height: auto;">
                                    {{ get_status_text($order->status) }}
                                </span>
                            </div>

                            <div class="col-4">
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2"> المدينه : </span>
                                    {{ $address->city->name }}
                                </p>
            
            
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2">  المنطقه: </span>
                                    {{ $address->area->name }}
                                </p>
            
                                <p>
                                    <span class="kt-font-warning kt-font-bolder mx-2">  الاسم : </span>
                                    {{ $address->name}}
                                </p>
            
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2">   الشارع : </span>
                                    {{ $address->street }}
                                </p>
            
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2">   البنايه : </span>
                                    {{ $address->build }}
                                </p>
            
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2">   الطابق : </span>
                                    {{ $address->floor }}
                                </p>
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2">   رقم الشقه : </span>
                                    {{ $address->apartment_number }}
                                </p>
                                <p> 
                                    <span class="kt-font-warning kt-font-bolder mx-2">   إرشادات إضافيه : </span>
                                    {{ $address->notes }}
                                </p>
            

                            </div>

                            <div class="col-4">
                                <form class="kt-form pb-0 p-3" action="{{ route('orders.update',$order) }}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                    @if ($order->status == 4 && count($order->drivers) < 2)
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="row">
                                              <label class="col-form-label col-12">  إختيار سائق لتسليم الطلب للعميل </label>
                                              <div class="input-group-prepend col-12">
                                                <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                                <select class="form-control kt-selectpicker" name="driver_id" data-size="7" data-live-search="true">
                                                  <option> إختيار سائق </option>
                                                  @foreach ($drivers as $driver)
                                                  <option value="{{ $driver->id }}"> {{$driver->name}} </option>
                                                  @endforeach        
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 px-4">
                                        <div class="input-group">
                                                <button type="submit" class="btn btn-success"
                                                    style="background-color:#17b978; border:none; width:100%;">حفظ</button>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($order->status == 0 && count($order->drivers) < 1)
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="row">
                                              <label class="col-form-label col-12">  إختيار سائق لإستلام الطلب من العميل </label>
                                              <div class="input-group-prepend col-12">
                                                <span class="input-group-text"> <i class="la la-user" style="font-size: 18px"></i> </span>
                                                <select class="form-control kt-selectpicker" name="driver_id" data-size="7" data-live-search="true">
                                                  <option> إختيار سائق </option>
                                                  @foreach ($drivers as $driver)
                                                  <option value="{{ $driver->id }}"> {{$driver->name}} </option>
                                                  @endforeach        
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 px-4">
                                        <div class="input-group">
                                                <button type="submit" class="btn btn-success"
                                                    style="background-color:#17b978; border:none; width:100%;">حفظ</button>
                                        </div>
                                    </div>
                                    @endif
                                </form> 
                            </div>
                        </div>


                    </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!--END: REQUEST DETAILS TABLE -->

        <div class="col-12">
            <iframe src="https://maps.google.com/maps?q={{ $address->lat }},{{ $address->lng }}&amp;hl=ar&z=14&amp;output=embed" style="border:0; width: 100%; height: 450px;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        </div>  
    </div>

    </div>
    <!-- END:: CONTENT -->

</div>



@endsection
