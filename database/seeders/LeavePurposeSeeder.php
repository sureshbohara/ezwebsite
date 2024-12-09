<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\LeavePurpose;
class LeavePurposeSeeder extends Seeder
{
    public function run()
    {
        $leavePurposes = ['Vacation', 'Sick Leave', 'Maternity Leave', 'Paternity Leave', 'Study Leave'];

        foreach ($leavePurposes as $purpose) {
            LeavePurpose::create(['name' => $purpose]);
        }
    }
}
