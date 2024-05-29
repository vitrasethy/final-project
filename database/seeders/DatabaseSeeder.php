<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'iPhone 15',
                'price' => 799,
                'photo' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/iphone-15-storage-select-202309-6-1inch-black?wid=5120&hei=2880&fmt=webp&qlt=70&.v=R2l3NVFXaFQ5YlNudWlaUC8zZGNic3JzREtGdURCckdCS1pSL0k4eU9YTGZKQXB5Q29VS1NZbGZTQWVvQWtRSjBoUVhuTWlrY2hIK090ZGZZbk9HeE1xUVVnSHY5eU9CcGxDMkFhalkvT0J5RzdnYndhRTBFd2JJUFBqcG4rTXRmbW94YnYxc1YvNXZ4emJGL0IxNFp3PT0=&traceId=1'
            ],
            [
                'name' => 'iPhone 15 Plus',
                'price' => 899,
                'photo' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/iphone-15-finish-select-202309-6-7inch-black?wid=5120&hei=2880&fmt=webp&qlt=70&.v=cHJOTXEwTU92OEtKVDV2cVB1R2FTSjlERndlRTljaUdZeHJGM3dlLzR2L2xJT1MvUkQrVjRwaXNCNlgyUGhDdU9MekhWSGZtV1pvV240QzNuTk80VXhseHVZcEw1SmhqcElaQkJMTm9FMytQNHRHSXNvL0hGVGlzeWppV0UxM3U=&traceId=1'
            ],
            [
                'name' => 'iPhone 15 Pro',
                'price' => 999,
                'photo' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-naturaltitanium?wid=5120&hei=2880&fmt=webp&qlt=70&.v=VW44dkRidm5wazhwcGxtL0cyaEJ2VTkrNXBUdUJSK1k4NE5seUtJaW80ZEk5aWVjRmFBS2tnWEF6QzlCMm5HL0pOZTBYalh5Vk90cEc1K2wwRzFGejRMeXJHUnUva2huMjl4akFHOXNwVjA0YXFmK3VWSWZuRE9oVEFyUFR0T2hBa0RRdWFDUTBBczVnS0JqV3BGbkxRPT0=&traceId=1'
            ],
            [
                'name' => 'iPhone 15 Pro Max',
                'price' => 1199,
                'photo' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-7inch-naturaltitanium?wid=5120&hei=2880&fmt=webp&qlt=70&.v=VW44dkRidm5wazhwcGxtL0cyaEJ2VTkrNXBUdUJSK1k4NE5seUtJaW80Y0IyMmhwNm1HTHhnVk5VN0dRb3FBNEpOZTBYalh5Vk90cEc1K2wwRzFGejRMeXJHUnUva2huMjl4akFHOXNwVjA0YXFmK3VWSWZuRE9oVEFyUFR0T2g3aHFOc0RlQlduNzZ3d2xCVDdFUXZ3PT0=&traceId=1'
            ],
            [
                'name' => 'iPhone 14',
                'price' => 699,
                'photo' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/iphone-14-finish-select-202209-6-1inch-product-red?wid=5120&hei=2880&fmt=webp&qlt=70&.v=bjlYUjk1NXN2Uy9CTWFMaXBneUF0bEthL1VsNXgveGUwQ1JqNzA0ZHAra29qbHo3SmYvbWNSaVZoOHd1YUswbjFHN0J1cFhnbVRLZGNTN2JhbjJDZkdKTG1lVWJJT2RXQWE0Mm9rU1V0V0FCWldFRTM0dmVJazFwWS9XVlErb0RDS0FNK243WmpsLzcxZWRUY2pQMFVBPT0=&traceId=1'
            ]
        ]);
    }
}
