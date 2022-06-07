<?php
define('BASE_ADMIN_URL', "admin/");
define('BASE_ADMIN_PATH', "admin");
define('APPLICATION_NAME', "Grain");
define('UPLOAD_IMAGES_PATH', "uploads/");
// actions
define('ACTION_CREATE', "ADD");
define('ACTION_EDIT', "EDIT");
define('ACTION_SHOW', "SHOW");
define('ACTION_DELETE', "DELETED");
// type options
define('TYPE_TEXT', "TYPE_TEXT");
define('TYPE_COLOR', "TYPE_COLOR");
// type variants
define('ADD_NEW_VARIATION', "ADD_NEW_VARIATION");
define('GENERATE_VARIATION', "GENERATE_VARIATION");
// type images
define('TYPE_MAIN', "TYPE_MAIN");
define('TYPE_GALERIE', "TYPE_GALERIE");
define('TYPE_VARIANT', "TYPE_VARIANT");

define('PRODUCT_SAMPLE', "PRODUCT_SAMPLE");
define('PRODUCT_VARIANT', "PRODUCT_VARIANT");

// Cart Type
define('SHOPPING_CART', "SHOPPING_CART");
define('SHOPPING_WISHLIST', "SHOPPING_WISHLIST");

//status of order
define('PENDING', "PENDING");
define('CONFIRMED', "CONFIRMED");
define('PROCESSING', "PROCESSING");
define('DELIVERED', "DELIVERED");
define('CANCELED', "CANCELED");
define('REJECTED', "REJECTED");
define('RETURNED', "RETURNED");

define('DEFAULT_PAYMENT_ID', 1);
define('DEFAULT_CITY_ID', 1);

define('ITEMS_PER_PAGE_PRODUCTS', 15);

define('FLOURS_CATEGORY_ID', 5);
define('TYPE_FLOURS', 'FLOURS');
define('TYPE_OTHERS_PRODUCTS', 'OTHERS');

define('RATING_0_5',0.5);
define('RATING_1',1);
define('RATING_1_5',1.5);
define('RATING_2',2);
define('RATING_2_5',2.5);
define('RATING_3',3);
define('RATING_3_5',3.5);
define('RATING_4',4);
define('RATING_4_5',4.5);
define('RATING_5',5);

return [
    "TYPES_ATTRIBUTES" => [
        TYPE_TEXT,
        TYPE_COLOR
    ],
    "TYPES_PRODUCTS" => [
        PRODUCT_SAMPLE,
        PRODUCT_VARIANT
    ],
    "STATUS_ORDER" => [
        PENDING,
        CONFIRMED,
        CANCELED,
        PROCESSING,
        DELIVERED,
        REJECTED,
        RETURNED
    ],
    "ACTIONS_AJAX" => [
        ACTION_EDIT,
        ACTION_SHOW
    ],
    "RATINGS_INFOS" => [
        [
            'icon' => '<svg class="icon icon-star"><use xlink:href="#icon-star"></use></svg>',
            'value' => RATING_5,
            'type'  => ''
        ],
        [
            'icon' => '<svg class="icon icon-star-half"><use xlink:href="#icon-star-half"></use> </svg>',
            'value' => RATING_4_5,
            'type'  => 'is-half'
        ],
        [
            'icon' => '<svg class="icon icon-star"><use xlink:href="#icon-star"></use></svg>',
            'value' => RATING_4,
            'type'  => ''
        ],
        [
            'icon' => '<svg class="icon icon-star-half"><use xlink:href="#icon-star-half"></use> </svg>',
            'value' => RATING_3_5,
            'type'  => 'is-half'
        ],
        [
            'icon' => '<svg class="icon icon-star"><use xlink:href="#icon-star"></use></svg>',
            'value' => RATING_3,
            'type'  => ''
        ],
        [
            'icon' => '<svg class="icon icon-star-half"><use xlink:href="#icon-star-half"></use> </svg>',
            'value' => RATING_2_5,
            'type'  => 'is-half'
        ],
        [
            'icon' => '<svg class="icon icon-star"><use xlink:href="#icon-star"></use></svg>',
            'value' => RATING_2,
            'type'  => ''
        ],
        [
            'icon' => '<svg class="icon icon-star-half"><use xlink:href="#icon-star-half"></use> </svg>',
            'value' => RATING_1_5,
            'type'  => 'is-half'
        ],
        [
            'icon' => '<svg class="icon icon-star"><use xlink:href="#icon-star"></use></svg>',
            'value' => RATING_1,
            'type'  => ''
        ],
        [
            'icon' => '<svg class="icon icon-star-half"><use xlink:href="#icon-star-half"></use> </svg>',
            'value' => RATING_0_5,
            'type'  => 'is-half'
        ]
    ]
];
