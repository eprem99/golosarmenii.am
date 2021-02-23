<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;

class DatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GallerySeeder::class);
        $this->call(UserSeeder::class);

        $this->uploadFiles('ads');
        $this->uploadFiles('galleries');
        $this->uploadFiles('news');
        $this->uploadFiles('users');
    }
}
