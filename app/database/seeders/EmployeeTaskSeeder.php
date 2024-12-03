<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Database\Seeder;

class EmployeeTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 employees
        $employees = Employee::factory(10)->create();

        // create four tasks each employees
        $employees->each(function ($employee) {
            Task::factory(4)->create([
                'employee_id' => $employee->id,
            ]);
        });

        $this->command->info('10 employees and 40 tasks seeded successfully!');
    }
}
