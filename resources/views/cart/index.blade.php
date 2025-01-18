@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        @if($cart->isEmpty())
            <p>@lang('cart.cart_empty')</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>@lang('cart.product')</th>
                    <th>@lang('cart.quantity')</th>
                    <th>@lang('cart.price')</th>
                    <th>@lang('cart.actions')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', ['product_id' => $item->product_id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 70px; display: inline-block;">
                                <button type="submit" class="btn btn-sm btn-primary">@lang('cart.update')</button>
                            </form>
                        </td>
                        <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', ['product_id' => $item->product_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">@lang('cart.remove')</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
