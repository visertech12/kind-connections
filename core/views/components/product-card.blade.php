@props([
    'title' => 'ComAI - AI Powered Social Media Auto Comment Response Platform',
    'url' => 'https://UnlockThemes.com/product/comai-ai-powered-social-media-auto-comment-response-platform/318',
    'image' => 'https://cdn.UnlockThemes.com/assets/products/318-comai-1_0_jr7e_cover.webp',
    'rating' => 5,
    'previewUrl' => 'https://script.UnlockThemes.com/comai/',
    'category' => 'Laravel',
    'categoryIcon' => 'fab fa-laravel',
    'price' => '$49'
])

@push('style')
<style>
    .product-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        border: 1px solid #f3f4f6;
    }
    
    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .product-card__thumb {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
        overflow: hidden;
        background-color: #f3f4f6;
    }
    
    .product-card__thumb img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .product-card:hover .product-card__thumb img {
        transform: scale(1.08);
    }
    
    .product-card__content {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    
    .product-card__title {
        font-size: 1.125rem;
        font-weight: 600;
        line-height: 1.5;
        margin: 0 0 16px 0;
    }
    
    .product-card__title a {
        color: #111827;
        text-decoration: none;
        transition: color 0.2s ease;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .product-card__title a:hover {
        color: #4A6CF7;
    }
    
    .product-card__rating {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .product-card-rating-list {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 4px;
    }
    
    .product-card-rating-list__item {
        color: #f59e0b;
        font-size: 12px;
    }
    
    .product-card-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 14px;
        font-size: 0.8125rem;
        font-weight: 500;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }
    
    .product-card-btn--gray-outline {
        background: transparent;
        color: #4b5563;
        border: 1px solid #e5e7eb;
    }
    
    .product-card-btn--gray-outline:hover {
        background: #f9fafb;
        color: #111827;
        border-color: #4b5563;
    }
    
    .product-card__meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }
    
    .product-card-category-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border-radius: 6px;
        background: rgba(249, 50, 44, 0.1);
        color: #F9322C;
        margin-right: 10px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .product-card:hover .product-card-category-icon {
        background: #F9322C;
        color: white;
        transform: rotate(-10deg) scale(1.1);
    }
    
    .product-card-item-category-name {
        font-size: 0.875rem;
        color: #4b5563;
        font-weight: 500;
    }
    
    .product-card-flex-align {
        display: flex;
        align-items: center;
        text-decoration: none;
    }
    
    .product-card__price {
        font-size: 1.25rem;
        font-weight: 700;
        color: #111827;
        margin: 0;
        background: linear-gradient(135deg, #111827 0%, #4b5563 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endpush

<div class="product-card">
    <div class="product-card__thumb">
        <a href="{{ $url }}" class="link">
            <img src="{{ $image }}" alt="{{ $title }}" loading="lazy">
        </a>
    </div>
    <div class="product-card__content">
        <h6 class="product-card__title">
            <a href="{{ $url }}">{{ $title }}</a>
        </h6>
        
        <div class="product-card__rating">
            <ul class="product-card-rating-list">
                @for($i = 0; $i < 5; $i++)
                    <li class="product-card-rating-list__item">
                        <i class="fas fa-star" @if($i >= $rating) style="color: #e5e7eb" @endif></i>
                    </li>
                @endfor
            </ul>
            <a href="{{ $previewUrl }}" target="_blank" class="product-card-btn product-card-btn--gray-outline">Live Preview</a>
        </div>

        <div class="product-card__meta">
            <div class="product-card__actions">
                <a href="#" class="product-card-flex-align">
                    <span class="product-card-category-icon">
                        <i class="{{ $categoryIcon }}"></i>
                    </span>
                    <span class="product-card-item-category-name">{{ $category }}</span>
                </a>
            </div>
            <h6 class="product-card__price">{{ $price }}</h6>
        </div>
    </div>
</div>
