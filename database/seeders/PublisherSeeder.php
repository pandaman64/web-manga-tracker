<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::query()->insert([
            ["display_name" => "少年ジャンプ+", "feed_url" => "https://shonenjumpplus.com/atom", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["display_name" => "となりのヤングジャンプ", "feed_url" => "https://tonarinoyj.jp/atom", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["display_name" => "コミックDAYS", "feed_url" => "https://comic-days.com/atom", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
        ]);
    }
}
