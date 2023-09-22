<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Event 1',
            'date' => '2021-09-21',
            'description' => 'Description 1',
            'user_id' => 1,
            'event_type_id' => 1,
            'price' => 10000,
        ]);

        Event::create([
            'title' => 'Event 2',
            'date' => '2021-09-22',
            'description' => 'Description 2',
            'user_id' => 1,
            'event_type_id' => 2,
            'price' => 20000,
        ]);
    }
}