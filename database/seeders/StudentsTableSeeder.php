<?php
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'date_of_birth' => '2000-01-01',
                'gender' => 'Male',
                'address' => '123 Main St, Anytown, USA',
                'phone' => '555-1234',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'date_of_birth' => '2001-02-02',
                'gender' => 'Female',
                'address' => '456 Elm St, Anytown, USA',
                'phone' => '555-5678',
            ],
            // Add more student data as needed...
        ];

        foreach ($students as $studentData) {
            $existingStudent = Student::where('email', $studentData['email'])->first();

            if (!$existingStudent) {
                // Student with this email doesn't exist, so create a new one
                Student::create($studentData);
            } else {
                // Student with this email already exists, you can choose to skip or update it
                // For example, you can update the existing student's information
                $existingStudent->update($studentData);
            }
        }
    }
}