@extends('user.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">{{ __('messages.order') }} <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> {{ __('messages.generate_pdf') }}</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>{{ __('messages.sn') }}</th>
            <th>{{ __('messages.order_no') }}</th>
            <th>{{ __('messages.name') }}</th>
            <th>{{ __('messages.email') }}</th>
            <th>{{ __('messages.quantity') }}</th>
            <th>{{ __('messages.charge') }}</th>
            <th>{{ __('messages.total_amount') }}</th>
            <th>{{ __('messages.status') }}</th>
            <th>{{ __('messages.action') }}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>TND{{$order->shipping->price}}</td>
            <td>TND{{number_format($order->total_amount,2)}}</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">{{$order->status}}</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">{{$order->status}}</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">{{$order->status}}</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="{{ __('messages.delete') }}"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">{{ __('messages.order_information') }}</h4>
              <table class="table">
                    <tr class="">
                        <td>{{ __('messages.order_number') }}</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.order_date') }}</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} {{ __('messages.at') }} {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.quantity') }}</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.order_status') }}</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                      @php
                          $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
                      @endphp
                        <td>{{ __('messages.shipping_charge') }}</td>
                        <td> :TND{{$order->shipping->price}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.total_amount') }}</td>
                        <td> : $ {{number_format($order->total_amount,2)}}</td>
                    </tr>
                    <tr>
                      <td>{{ __('messages.payment_method') }}</td>
                      <td> : @if($order->payment_method=='cod') {{ __('messages.cash_on_delivery') }} @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.payment_status') }}</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">{{ __('messages.shipping_information') }}</h4>
              <table class="table">
                    <tr class="">
                        <td>{{ __('messages.full_name') }}</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.email') }}</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.phone_no') }}</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.address') }}</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.country') }}</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.post_code') }}</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
