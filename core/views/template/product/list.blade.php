@extends('template.layouts.frontend')
@section('content')

<section class="product py-120">
    <div class="container">
        <div class="search-filter flex-between flex-align">
            <div>
                <h3 class="m-0">{{ $page_title }}</h3>
            </div>
            <div class="search-form">

                <form method="GET" class="autoSubmit">
                <div class="gap-3 d-flex">
                    <div class="search-box flex-align gap-2">
                        <span>Search Product</span>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form--control" placeholder="Search product" value="{{ request()->search }}">
                            <button type="submit" class="input-group-text search-box__button"><i class="far fa-search"></i></button>
                        </div>
                    </div>
                    <div class="shorts flex-align gap-2">
                        <span>Sort By</span>
                        <select class="select form--control orderBy" name="order_by" onchange="this.form.submit()">
                            <option value="created_at" @if(request()->order_by == 'created_at') selected @endif>Date Published</option>
                            <option value="updated_at" @if(request()->order_by == 'updated_at') selected @endif>Date Updated</option>
                            <option value="rating" @if(request()->order_by == 'rating') selected @endif>Rating</option>
                            <option value="price" @if(request()->order_by == 'price') selected @endif>Price</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row gy-4 justify-content-center">

        @forelse($products as $product)
        <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
            <div class="product-card d-flex flex-wrap">
                <div class="product-card__thumb">
                    <a href="{{ route('product.details', $product->slug) }}" class="link"> <img src="{{ asset('assets/images/products/'.$product->image) }}" alt="" class="fit-image" onerror="this.src='{{ getImage(imagePath()['image']['default'], '600x400') }}'"></a>
                </div>
                <div class="product-card__content d-flex flex-wrap align-content-between">
                    <div class="product-card__inner w-100">
                        <h6 class="product-card__title"> <a href="{{ route('product.details', $product->slug) }}" class="link border-effect">{{ $product->name }}</a></h6>
                        <div class="product-card__rating flex-between"> 
                            <ul class="rating-list">{!! getStar($product->rating) !!}</ul>
                            <a href="{{ @$product->attributes['Demo URL'] ?? '#' }}" target="_blank" class="btn btn--gray btn--sm outline">Live Preview</a>
                        </div>
                    </div>
                    <div class="product-card__meta flex-between w-100">
                        <div class="product-card__actions">
                            <a href="{{ route('product.category', $product->category->slug) }}" class="flex-align gap-2"><span class="category-icon flex-center" data-color="#{{ $product->category->color_class ?? 'F9322C' }}"><i class="{{ $product->category->icon_class ?? 'fab fa-laravel' }}"></i></span><span class="item-category-name">{{ $product->category->short_name ?? $product->category->name }}</span></a>
                        </div>
                        <h6 class="product-card__price">
                            @if($product->is_free)
                                <span class="text-success">Free</span>
                            @else
                                ${{ getAmount($product->regular_price) }}
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center mt-5">
            <h4 class="text-muted">{{ __($emptyMessage) }}</h4>
        </div>
        @endforelse

    </div>
    
    @if($products->hasPages())
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
            {{ paginateLinks($products) }}
        </div>
    </div>
    @endif
</div>
</section>

@endsection
