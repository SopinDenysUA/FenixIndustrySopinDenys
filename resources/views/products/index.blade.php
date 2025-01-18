@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4 class="m-0">{{ session('success') }}</h4>
        </div>
    @endif
    <div class="container mt-4">
        <h1 class="mb-4 text-center">@lang('products.products_list')</h1>
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Placeholder">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-truncate" style="max-height: 50px;">{{ $product->description }}</p>
                            <p class="text-muted">@lang('products.price'): ${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 70px; display: inline-block;">
                                <button type="submit" class="btn btn-primary btn-sm">@lang('products.buy')</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">@lang('products.no_prod_available')</p>
            @endforelse
        </div>
    </div>
@endsection
