<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Seed Data Kategori (5 Kategori)
        $kategori1 = ProductCategory::create([
            'name' => 'Atasan Pria',
            'slug' => 'atasan-pria',
        ]);

        $kategori2 = ProductCategory::create([
            'name' => 'Bawahan Wanita',
            'slug' => 'bawahan-wanita',
        ]);

        $kategori3 = ProductCategory::create([
            'name' => 'Alas Kaki',
            'slug' => 'alas-kaki',
        ]);

        $kategori4 = ProductCategory::create([
            'name' => 'Aksesoris',
            'slug' => 'aksesoris',
        ]);

        $kategori5 = ProductCategory::create([
            'name' => 'Pakaian Luar',
            'slug' => 'pakaian-luar',
        ]);


        // 2. Seed Data Produk (10 Produk Terdistribusi)
        
        // Produk Kategori: Atasan Pria
        Product::create([
            'product_category_id' => $kategori1->id,
            'name' => 'Kemeja Flanel Kotak-Kotak Merah',
            'description' => 'Kemeja flanel lengan panjang berbahan katun wol premium. Tekstur lembut, tebal namun tetap adem digunakan untuk aktivitas kasual harian.',
            'image' => 'kemeja-flanel-merah.jpg',
            'price' => 189000.00,
            'stock' => 45,
            'slug' => 'kemeja-flanel-kotak-kotak-merah',
        ]);

        Product::create([
            'product_category_id' => $kategori1->id,
            'name' => 'Kaos Polos Cotton Combed 30s Hitam',
            'description' => 'Kaos polos minimalis lengan pendek menggunakan bahan 100% serat kapas alami (Cotton Combed 30s). Jahitan rantai standar distro, sangat menyerap keringat.',
            'image' => 'kaos-polos-hitam.jpg',
            'price' => 59000.00,
            'stock' => 120,
            'slug' => 'kaos-polos-cotton-combed-30s-hitam',
        ]);

        // Produk Kategori: Bawahan Wanita
        Product::create([
            'product_category_id' => $kategori2->id,
            'name' => 'Rok Plisket Premium Panjang',
            'description' => 'Rok panjang wanita dengan lipatan plisket rapi yang konsisten. Menggunakan bahan serena meral premium yang jatuh, anggun, dan tidak menerawang.',
            'image' => 'rok-plisket-panjang.jpg',
            'price' => 125000.00,
            'stock' => 30,
            'slug' => 'rok-plisket-premium-panjang',
        ]);

        Product::create([
            'product_category_id' => $kategori2->id,
            'name' => 'Celana Kulot Highwaist Linen',
            'description' => 'Celana kulot wanita dengan potongan pinggang tinggi (highwaist). Terbuat dari bahan linen rami asli yang memberikan look aesthetic, ringan, dan adem.',
            'image' => 'kulot-linen-highwaist.jpg',
            'price' => 145000.00,
            'stock' => 40,
            'slug' => 'celana-kulot-highwaist-linen',
        ]);

        // Produk Kategori: Alas Kaki
        Product::create([
            'product_category_id' => $kategori3->id,
            'name' => 'Sepatu Sneakers Kanvas Klasik',
            'description' => 'Sepatu sneakers bertali model low-cut. Menggunakan material upper kanvas 12oz yang kokoh serta sol karet (vulcanized) anti slip untuk kenyamanan melangkah.',
            'image' => 'sneakers-kanvas-klasik.jpg',
            'price' => 299000.00,
            'stock' => 25,
            'slug' => 'sepatu-sneakers-kanvas-klasik',
        ]);

        Product::create([
            'product_category_id' => $kategori3->id,
            'name' => 'Sandal Kulit Slide Pria Casual',
            'description' => 'Sandal selop (slide) kasual pria dengan upper berbahan kulit sintetis berkualitas tinggi. Insole empuk dan ergonomis menyesuaikan kontur kaki Anda.',
            'image' => 'sandal-kulit-slide.jpg',
            'price' => 175000.00,
            'stock' => 35,
            'slug' => 'sandal-kulit-slide-pria-casual',
        ]);

        // Produk Kategori: Aksesoris
        Product::create([
            'product_category_id' => $kategori4->id,
            'name' => 'Topi Baseball Polos Katun Drill',
            'description' => 'Topi konstruksi baseball cap berbahan kain drill kuat. Dilengkapi pengatur kelonggaran berbahan besi di bagian belakang untuk menyesuaikan ukuran kepala.',
            'image' => 'topi-baseball-polos.jpg',
            'price' => 45000.00,
            'stock' => 60,
            'slug' => 'topi-baseball-polos-katun-drill',
        ]);

        Product::create([
            'product_category_id' => $kategori4->id,
            'name' => 'Kacamata Hitam Retro Anti UV400',
            'description' => 'Kacamata hitam dengan desain bingkai retro klasik. Lensa polikarbonat dilengkapi proteksi UV400 untuk melindungi mata Anda dari radiasi sinar matahari.',
            'image' => 'kacamata-retro-uv.jpg',
            'price' => 89000.00,
            'stock' => 15,
            'slug' => 'kacamata-hitam-retro-anti-uv400',
        ]);

        // Produk Kategori: Pakaian Luar
        Product::create([
            'product_category_id' => $kategori5->id,
            'name' => 'Jaket Bomber Taslan Waterproof',
            'description' => 'Jaket bomber dengan lapisan luar bahan taslan yang mampu menahan angin dan percikan air ringan (water-resistant). Bagian dalam dilapisi furing dakron hangat.',
            'image' => 'jaket-bomber-taslan.jpg',
            'price' => 245000.00,
            'stock' => 20,
            'slug' => 'jaket-bomber-taslan-waterproof',
        ]);

        Product::create([
            'product_category_id' => $kategori5->id,
            'name' => 'Kardigan Rajut Wanita Lengan Balon',
            'description' => 'Outerwear rajut wanita dengan detail lengan balon yang trendi. Menggunakan benang rajut akrilik tebal dengan rajutan berpola rapat, lembut di kulit.',
            'image' => 'kardigan-rajut-balon.jpg',
            'price' => 135000.00,
            'stock' => 50,
            'slug' => 'kardigan-rajut-wanita-lengan-balon',
        ]);
    }
}