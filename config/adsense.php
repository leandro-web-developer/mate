<?php
return [
    'client_id' => 'YOUR_CLIENT_ID', //Your Adsense client ID e.g. ca-pub-9508939161510421
    'ads' => [
        'responsive' => [
            'ad_slot' => 1111111111,
            'ad_format' => 'fluid',
            'ad_full_width_responsive' => true,
            'ad_style' => 'display:inline-block'
        ],
        'rectangle' => [
            'ad_slot' => 2222222222,
            'ad_style' => 'display:inline-block;width:300px;height:250px',
            'ad_full_width_responsive' => false,
            'ad_format' => 'auto'
        ]
    ]
];
