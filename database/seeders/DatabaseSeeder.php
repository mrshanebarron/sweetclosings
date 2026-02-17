<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sweetclosings.com',
            'email_verified_at' => now(),
            'password' => bcrypt('sweetclosings'),
        ]);

        // Categories
        $closing = Category::create([
            'name' => 'Closing Day Gifts',
            'slug' => 'closing-day',
            'description' => 'Celebrate the big day. Hand-crafted cookie boxes perfect for new homeowners.',
            'sort_order' => 1,
        ]);

        $referral = Category::create([
            'name' => 'Referral Thank Yous',
            'slug' => 'referral-thanks',
            'description' => 'Show your appreciation to clients who send business your way.',
            'sort_order' => 2,
        ]);

        $seasonal = Category::create([
            'name' => 'Seasonal Collections',
            'slug' => 'seasonal',
            'description' => 'Holiday and seasonal assortments to keep your clients thinking of you.',
            'sort_order' => 3,
        ]);

        $corporate = Category::create([
            'name' => 'Corporate Gifting',
            'slug' => 'corporate',
            'description' => 'Bulk orders for open houses, broker events, and office treats.',
            'sort_order' => 4,
        ]);

        // Products — Closing Day
        Product::create([
            'category_id' => $closing->id,
            'name' => 'The Welcome Home Box',
            'slug' => 'welcome-home-box',
            'short_description' => 'A dozen artisan cookies with a custom "Welcome Home" tag.',
            'description' => "Make closing day unforgettable. Our signature Welcome Home Box features twelve hand-decorated sugar cookies in a house-shaped gift box. Each cookie is individually wrapped and arranged around a personalized card with your branding. Choose from classic vanilla, rich chocolate, or our signature snickerdoodle.\n\nIncludes a branded ribbon with your agency logo (upload during checkout) and a handwritten note to your clients.",
            'price' => 45.00,
            'compare_price' => 55.00,
            'image' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=800&q=80',
            'sku' => 'SC-WH-001',
            'is_featured' => true,
            'serves' => 12,
            'dietary_info' => 'Contains wheat, eggs, dairy',
            'sort_order' => 1,
        ]);

        Product::create([
            'category_id' => $closing->id,
            'name' => 'Keys to Happiness Tin',
            'slug' => 'keys-to-happiness-tin',
            'short_description' => 'Key-shaped cookies in a keepsake tin. The perfect closing gift.',
            'description' => "Our best-seller for real estate professionals. Six oversized key-shaped cookies decorated in your client's favorite colors, presented in a reusable keepsake tin. Each tin includes a custom message card and can be branded with your logo.\n\nThese conversation-starting cookies photograph beautifully — your clients will share them on social media, giving you organic exposure.",
            'price' => 38.00,
            'image' => 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e?w=800&q=80',
            'sku' => 'SC-KH-001',
            'is_featured' => true,
            'serves' => 6,
            'dietary_info' => 'Contains wheat, eggs, dairy',
            'sort_order' => 2,
        ]);

        Product::create([
            'category_id' => $closing->id,
            'name' => 'New Address Cookie Card',
            'slug' => 'new-address-cookie-card',
            'short_description' => 'A giant cookie card with their new address hand-lettered in icing.',
            'description' => "The ultimate personalized closing gift. A 10-inch round cookie card with your client's new address beautifully hand-lettered in royal icing. Packaged in an elegant flat box with tissue paper and a congratulations card.\n\nEach cookie is baked fresh to order and decorated by hand. Allow 3 business days for custom lettering.",
            'price' => 28.00,
            'image' => 'https://images.unsplash.com/photo-1590080875515-8a3a8dc5735e?w=800&q=80',
            'sku' => 'SC-NA-001',
            'serves' => 4,
            'dietary_info' => 'Contains wheat, eggs, dairy, soy',
            'sort_order' => 3,
        ]);

        // Products — Referral Thank Yous
        Product::create([
            'category_id' => $referral->id,
            'name' => 'Sweet Thanks Sampler',
            'slug' => 'sweet-thanks-sampler',
            'short_description' => 'Eight gourmet cookies with a handwritten thank-you note.',
            'description' => "A curated assortment of our eight most popular flavors: chocolate chunk, oatmeal raisin, peanut butter, lemon sugar, white chocolate macadamia, snickerdoodle, double chocolate, and brown butter pecan.\n\nPerfect for saying thank you to past clients who referred new business. Each box includes a handwritten note on premium cardstock.",
            'price' => 32.00,
            'image' => 'https://images.unsplash.com/photo-1548365328-8c6db3220e4c?w=800&q=80',
            'sku' => 'SC-ST-001',
            'is_featured' => true,
            'serves' => 8,
            'dietary_info' => 'Contains wheat, eggs, dairy, tree nuts, peanuts',
            'sort_order' => 1,
        ]);

        Product::create([
            'category_id' => $referral->id,
            'name' => 'Monthly Sweetness Subscription',
            'slug' => 'monthly-sweetness',
            'short_description' => 'Keep top of mind — fresh cookies delivered monthly for 3 months.',
            'description' => "The gift that keeps giving. A curated box of six seasonal cookies delivered to your client's door every month for three months. Each delivery includes a branded card reminding them who made their day sweeter.\n\nPerfect for VIP clients and high-value referral sources. Automated delivery — set it and forget it.",
            'price' => 89.00,
            'compare_price' => 108.00,
            'image' => 'https://images.unsplash.com/photo-1486427944544-d2c246c4df14?w=800&q=80',
            'sku' => 'SC-MS-001',
            'serves' => 6,
            'dietary_info' => 'Contains wheat, eggs, dairy. Varies by month.',
            'sort_order' => 2,
        ]);

        // Products — Seasonal
        Product::create([
            'category_id' => $seasonal->id,
            'name' => 'Spring Market Blooms Box',
            'slug' => 'spring-market-blooms',
            'short_description' => 'Flower-shaped cookies in pastel colors. Perfect for spring closings.',
            'description' => "Celebrate the spring buying season with our stunning floral cookie collection. Ten flower-shaped sugar cookies in pastel pink, lavender, mint, and butter yellow. Each cookie is hand-decorated with intricate petal details.\n\nIdeal for open houses, spring client appreciation events, or as a fresh twist on the closing gift.",
            'price' => 42.00,
            'image' => 'https://images.unsplash.com/photo-1587668178277-295251f900ce?w=800&q=80',
            'sku' => 'SC-SB-001',
            'serves' => 10,
            'dietary_info' => 'Contains wheat, eggs, dairy',
            'sort_order' => 1,
        ]);

        Product::create([
            'category_id' => $seasonal->id,
            'name' => 'Holiday Hearthside Collection',
            'slug' => 'holiday-hearthside',
            'short_description' => 'Festive holiday cookies — gingerbread houses, snowflakes, and stars.',
            'description' => "Warm your clients' hearts during the holidays. A luxurious assortment of twelve decorated cookies: gingerbread houses, snowflakes, stars, and mittens. Packaged in a premium gift box with a satin ribbon.\n\nPerfect for year-end client appreciation or as a memorable holiday closing gift. Order by December 10th for guaranteed holiday delivery.",
            'price' => 52.00,
            'image' => 'https://images.unsplash.com/photo-1481391319762-47dff72954d9?w=800&q=80',
            'sku' => 'SC-HH-001',
            'is_featured' => true,
            'serves' => 12,
            'dietary_info' => 'Contains wheat, eggs, dairy, cinnamon, ginger',
            'sort_order' => 2,
        ]);

        // Products — Corporate
        Product::create([
            'category_id' => $corporate->id,
            'name' => 'Open House Platter (24 cookies)',
            'slug' => 'open-house-platter',
            'short_description' => 'Two dozen assorted cookies on a branded presentation platter.',
            'description' => "Make your open house the talk of the neighborhood. Twenty-four assorted cookies arranged on a disposable branded platter. Mix of chocolate chunk, sugar, oatmeal, and snickerdoodle.\n\nAdd your listing photo to the branded napkins (optional add-on). Feeds 12-24 guests depending on appetite.",
            'price' => 68.00,
            'image' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800&q=80',
            'sku' => 'SC-OH-001',
            'serves' => 24,
            'dietary_info' => 'Contains wheat, eggs, dairy',
            'sort_order' => 1,
        ]);

        Product::create([
            'category_id' => $corporate->id,
            'name' => 'Broker Event Box (48 cookies)',
            'slug' => 'broker-event-box',
            'short_description' => 'Bulk order for broker opens and office events.',
            'description' => "Feed the whole office. Forty-eight individually wrapped cookies in a mix of our four classic flavors. Perfect for broker opens, team meetings, or client appreciation events.\n\nEach cookie is individually wrapped with your branded sticker. Minimum 5 business days lead time for logo cookies.",
            'price' => 120.00,
            'compare_price' => 144.00,
            'image' => 'https://images.unsplash.com/photo-1590080876351-941da357a4e4?w=800&q=80',
            'sku' => 'SC-BE-001',
            'serves' => 48,
            'dietary_info' => 'Contains wheat, eggs, dairy',
            'sort_order' => 2,
        ]);

        Product::create([
            'category_id' => $corporate->id,
            'name' => 'Custom Logo Cookies (1 dozen)',
            'slug' => 'custom-logo-cookies',
            'short_description' => 'Your brokerage logo printed on edible ink cookies.',
            'description' => "Put your brand on a cookie — literally. Twelve round sugar cookies with your brokerage logo printed in edible ink. Crystal-clear reproduction on a smooth royal icing canvas.\n\nUpload your logo during checkout. We'll send a digital proof within 24 hours. Perfect for brand awareness and leaving a lasting impression.",
            'price' => 55.00,
            'image' => 'https://images.unsplash.com/photo-1621236378699-8597faf6a176?w=800&q=80',
            'sku' => 'SC-CL-001',
            'serves' => 12,
            'dietary_info' => 'Contains wheat, eggs, dairy',
            'sort_order' => 3,
        ]);

        // Sample orders for admin demo
        $order = Order::create([
            'order_number' => 'SC-A1B2C3D4',
            'user_id' => 1,
            'status' => 'processing',
            'subtotal' => 83.00,
            'shipping' => 8.95,
            'tax' => 6.64,
            'total' => 98.59,
            'shipping_name' => 'Jennifer Martinez',
            'shipping_address' => '742 Evergreen Terrace',
            'shipping_city' => 'Birmingham',
            'shipping_state' => 'AL',
            'shipping_zip' => '35203',
            'shipping_phone' => '205-555-0142',
            'billing_email' => 'jennifer@martinezrealty.com',
            'notes' => 'Please include extra napkins for the open house.',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => 1,
            'product_name' => 'The Welcome Home Box',
            'price' => 45.00,
            'quantity' => 1,
            'line_total' => 45.00,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => 4,
            'product_name' => 'Sweet Thanks Sampler',
            'price' => 38.00,
            'quantity' => 1,
            'line_total' => 38.00,
        ]);

        $order2 = Order::create([
            'order_number' => 'SC-E5F6G7H8',
            'status' => 'delivered',
            'subtotal' => 120.00,
            'shipping' => 0,
            'tax' => 9.60,
            'total' => 129.60,
            'shipping_name' => 'David Chen',
            'shipping_address' => '1200 Commerce St, Suite 400',
            'shipping_city' => 'Birmingham',
            'shipping_state' => 'AL',
            'shipping_zip' => '35233',
            'billing_email' => 'david@chenmortgage.com',
            'delivered_at' => now()->subDays(3),
        ]);

        OrderItem::create([
            'order_id' => $order2->id,
            'product_id' => 9,
            'product_name' => 'Broker Event Box (48 cookies)',
            'price' => 120.00,
            'quantity' => 1,
            'line_total' => 120.00,
        ]);

        $order3 = Order::create([
            'order_number' => 'SC-I9J0K1L2',
            'status' => 'pending',
            'subtotal' => 55.00,
            'shipping' => 8.95,
            'tax' => 4.40,
            'total' => 68.35,
            'shipping_name' => 'Sarah Williams',
            'shipping_address' => '89 Highland Ave',
            'shipping_city' => 'Hoover',
            'shipping_state' => 'AL',
            'shipping_zip' => '35226',
            'billing_email' => 'sarah@williamshomes.com',
        ]);

        OrderItem::create([
            'order_id' => $order3->id,
            'product_id' => 10,
            'product_name' => 'Custom Logo Cookies (1 dozen)',
            'price' => 55.00,
            'quantity' => 1,
            'line_total' => 55.00,
        ]);
    }
}
