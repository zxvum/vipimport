<?php

namespace Database\Seeders;

use App\Models\SupportStatus;
use App\Models\SupportTheme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupportTheme::create(['name' => 'Общий вопрос']);
        SupportTheme::create(['name' => 'Пополнение баланса']);
        SupportTheme::create(['name' => 'Работоспособность сайта']);
        SupportTheme::create(['name' => 'Заказы/Товары']);
        SupportTheme::create(['name' => 'Другое']);

        SupportStatus::create(['name' => 'Создан', 'hex' => '#ffab00']);
        SupportStatus::create(['name' => 'В процессе', 'hex' => '#696cff']);
        SupportStatus::create(['name' => 'Решен', 'hex' => '#71dd37']);
        SupportStatus::create(['name' => 'Закрыт', 'hex' => '#ff3e1d']);
    }
}
