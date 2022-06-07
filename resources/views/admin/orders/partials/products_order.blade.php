@forelse ($variantsOrder as $variant)
    @php
        $product = $variant->product;
        $actionOrder = ACTION_EDIT;
    @endphp

    @include(BASE_ADMIN_PATH.'.orders.partials.product_item_order',['variant' => $variant, 'product' => $product])

@empty

@endforelse
