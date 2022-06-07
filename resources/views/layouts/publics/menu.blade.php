<ul class="main-menu">
    <li class="menu-link">
        <a href="{{ route('index') }}" class="link-title">
            <span class="sp-link-title">{{__('Home')}}</span>
        </a>
    </li>
    <li class="menu-link">
        <a href="{{ route('about') }}" class="link-title">
            <span class="sp-link-title">{{__('Découvrir notre marque')}}</span>
        </a>
    </li>
    <li class="menu-link">
        <a href="{{ route('mill') }}" class="link-title">
            <span class="sp-link-title">{{__('Moulin')}}</span>
        </a>
    </li>
    <li class="menu-link">
        <a href="{{ route('floursPosts') }}" class="link-title">
            <span class="sp-link-title">{{__('Farinez-nous')}}</span>
        </a>
    </li>
    <li class="menu-link">
        <a href="{{ route('searchProduct',['type'=>TYPE_FLOURS ]) }}" class="link-title">
            <span class="sp-link-title">{{__('Sélectionner vos Farines')}}</span>
        </a>
    </li>
    <li class="menu-link">
        <a href="{{ route('searchProduct', ['type'=>TYPE_OTHERS_PRODUCTS ]) }}" class="link-title">
            <span class="sp-link-title">{{__('Découvrir nos autres Produits')}}</span>
        </a>
    </li>
    <li class="menu-link">
        <a href="{{ route('contact') }}" class="link-title">
            <span class="sp-link-title">'{{__('Contactez nous')}}</span>
        </a>
    </li>

    @if (1 == 2)
    @foreach( $categories as $category )
        <li class="menu-link">
            <a href="{{ route('category.products',$category->slug) }}" class="link-title">
                <span class="sp-link-title">{{ $category->name}}</span>
            </a>
        </li>
    @endforeach
    @endif
</ul>
