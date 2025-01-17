@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Список товаров</h1>
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
                            <p class="text-muted">Цена: ${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-primary btn-sm">Купить</button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Нет доступных товаров.</p>
            @endforelse
        </div>
    </div>
@endsection
