<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            ['id' => 1, 'programme_id' => 1, 'title' => 'Accrual Accounting', 'base_code' => 'AC4.01', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 2, 'programme_id' => 1, 'title' => 'Accounting for Taxation', 'base_code' => 'AC4.02', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 3, 'programme_id' => 1, 'title' => 'Accounting Software', 'base_code' => 'AC4.03', 'campus_id' => 1, 'intake' => 'Apr'],
            ['id' => 4, 'programme_id' => 1, 'title' => 'Payroll', 'base_code' => 'AC4.04', 'campus_id' => 1, 'intake' => 'Apr'],

            ['id' => 5, 'programme_id' => 2, 'title' => 'Introduction to Accounting and Taxation', 'base_code' => 'ACCY5101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 6, 'programme_id' => 2, 'title' => 'Introduction to Accounting and Taxation', 'base_code' => 'ACCY5101', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 7, 'programme_id' => 3, 'title' => 'Introduction to Accounting and Taxation', 'base_code' => 'ACCY5101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 8, 'programme_id' => 3, 'title' => 'Introduction to Accounting and Taxation', 'base_code' => 'ACCY5101', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 9, 'programme_id' => 2, 'title' => 'Applied Accounting', 'base_code' => 'ACCY5102', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 10, 'programme_id' => 3, 'title' => 'Applied Accounting', 'base_code' => 'ACCY5102', 'campus_id' => 6, 'intake' => 'Feb'],

            ['id' => 11, 'programme_id' => 2, 'title' => 'Analysis of Financial Information', 'base_code' => 'ACCY5103', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 12, 'programme_id' => 2, 'title' => 'Analysis of Financial Information', 'base_code' => 'ACCY5103', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 13, 'programme_id' => 3, 'title' => 'Analysis of Financial Information', 'base_code' => 'ACCY5103', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 14, 'programme_id' => 3, 'title' => 'Analysis of Financial Information', 'base_code' => 'ACCY5103', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 15, 'programme_id' => 2, 'title' => 'Budgets for Planning & Control', 'base_code' => 'ACCY5104', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 16, 'programme_id' => 3, 'title' => 'Budgets for Planning & Control', 'base_code' => 'ACCY5104', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 17, 'programme_id' => 4, 'title' => 'Commercial Law', 'base_code' => 'ACCY5105', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 18, 'programme_id' => 4, 'title' => 'Commercial Law', 'base_code' => 'ACCY5105', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 19, 'programme_id' => 5, 'title' => 'Commercial Law', 'base_code' => 'ACCY5105', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 20, 'programme_id' => 5, 'title' => 'Commercial Law', 'base_code' => 'ACCY5105', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 21, 'programme_id' => 4, 'title' => 'Economics', 'base_code' => 'ACCY5106', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 22, 'programme_id' => 5, 'title' => 'Economics', 'base_code' => 'ACCY5106', 'campus_id' => 6, 'intake' => 'Feb'],

            ['id' => 23, 'programme_id' => 4, 'title' => 'Intermediate Management Accounting', 'base_code' => 'ACCY6101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 24, 'programme_id' => 5, 'title' => 'Intermediate Management Accounting', 'base_code' => 'ACCY6101', 'campus_id' => 6, 'intake' => 'Feb'],

            ['id' => 25, 'programme_id' => 4, 'title' => 'Intermediate Financial Accounting', 'base_code' => 'ACCY6102', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 26, 'programme_id' => 5, 'title' => 'Intermediate Financial Accounting', 'base_code' => 'ACCY6102', 'campus_id' => 6, 'intake' => 'Feb'],

            ['id' => 27, 'programme_id' => 4, 'title' => 'Taxation in Aotearoa New Zealand', 'base_code' => 'ACCY6103', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 28, 'programme_id' => 5, 'title' => 'Taxation in Aotearoa New Zealand', 'base_code' => 'ACCY6103', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 29, 'programme_id' => 4, 'title' => 'Introductiion to Finance', 'base_code' => 'ACCY6104', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 30, 'programme_id' => 5, 'title' => 'Introduction to Finance', 'base_code' => 'ACCY6104', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 31, 'programme_id' => 6, 'title' => 'Advanced Financial Accounting', 'base_code' => 'ACCY7101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 32, 'programme_id' => 6, 'title' => 'Advanced Financial Accounting', 'base_code' => 'ACCY7101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 33, 'programme_id' => 6, 'title' => 'Advanced Management Accounting', 'base_code' => 'ACCY7102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 34, 'programme_id' => 6, 'title' => 'Advanced Management Accounting', 'base_code' => 'ACCY7102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 35, 'programme_id' => 7, 'title' => 'Auditing Principles', 'base_code' => 'ACCY7103', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 36, 'programme_id' => 7, 'title' => 'Auditing Principles', 'base_code' => 'ACCY7103', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 37, 'programme_id' => 7, 'title' => 'Corporate Finance', 'base_code' => 'ACCY7104', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 38, 'programme_id' => 7, 'title' => 'Corporate Finance', 'base_code' => 'ACCY7104', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 39, 'programme_id' => 8, 'title' => 'Strategic Management Accounting', 'base_code' => 'ACCY8101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 40, 'programme_id' => 8, 'title' => 'Strategic Management Accounting', 'base_code' => 'ACCY8101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 41, 'programme_id' => 8, 'title' => 'Advanced Taxation', 'base_code' => 'ACCY8102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 42, 'programme_id' => 8, 'title' => 'Advanced Taxation', 'base_code' => 'ACCY8102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 43, 'programme_id' => 9, 'title' => 'Financial Reporting Standards', 'base_code' => 'ACCY8103', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 44, 'programme_id' => 9, 'title' => 'Financial Reporting Standards', 'base_code' => 'ACCY8103', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 45, 'programme_id' => 9, 'title' => 'Corporate Governance', 'base_code' => 'ACCY8104', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 46, 'programme_id' => 9, 'title' => 'Corporate Governance', 'base_code' => 'ACCY8104', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 47, 'programme_id' => 10, 'title' => 'Research Methods', 'base_code' => 'ACCY9101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 48, 'programme_id' => 10, 'title' => 'Research Methods', 'base_code' => 'ACCY9101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 49, 'programme_id' => 10, 'title' => 'Capstone Project', 'base_code' => 'ACCY9102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 50, 'programme_id' => 10, 'title' => 'Capstone Project', 'base_code' => 'ACCY9102', 'campus_id' => 6, 'intake' => 'Jul'],
            ['id' => 51, 'programme_id' => 11, 'title' => 'Introduction to Marketing', 'base_code' => 'MKTG7101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 52, 'programme_id' => 11, 'title' => 'Introduction to Marketing', 'base_code' => 'MKTG7101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 53, 'programme_id' => 11, 'title' => 'Consumer Behaviour', 'base_code' => 'MKTG7102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 54, 'programme_id' => 11, 'title' => 'Consumer Behaviour', 'base_code' => 'MKTG7102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 55, 'programme_id' => 12, 'title' => 'Marketing Strategy', 'base_code' => 'MKTG8101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 56, 'programme_id' => 12, 'title' => 'Marketing Strategy', 'base_code' => 'MKTG8101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 57, 'programme_id' => 12, 'title' => 'Digital Marketing', 'base_code' => 'MKTG8102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 58, 'programme_id' => 12, 'title' => 'Digital Marketing', 'base_code' => 'MKTG8102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 59, 'programme_id' => 13, 'title' => 'Business Law', 'base_code' => 'LAW7101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 60, 'programme_id' => 13, 'title' => 'Business Law', 'base_code' => 'LAW7101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 61, 'programme_id' => 13, 'title' => 'Corporate Law', 'base_code' => 'LAW7102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 62, 'programme_id' => 13, 'title' => 'Corporate Law', 'base_code' => 'LAW7102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 63, 'programme_id' => 14, 'title' => 'Organisational Behaviour', 'base_code' => 'MGMT7101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 64, 'programme_id' => 14, 'title' => 'Organisational Behaviour', 'base_code' => 'MGMT7101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 65, 'programme_id' => 14, 'title' => 'Human Resource Management', 'base_code' => 'MGMT7102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 66, 'programme_id' => 14, 'title' => 'Human Resource Management', 'base_code' => 'MGMT7102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 67, 'programme_id' => 15, 'title' => 'Operations Management', 'base_code' => 'MGMT8101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 68, 'programme_id' => 15, 'title' => 'Operations Management', 'base_code' => 'MGMT8101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 69, 'programme_id' => 15, 'title' => 'Project Management', 'base_code' => 'MGMT8102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 70, 'programme_id' => 15, 'title' => 'Project Management', 'base_code' => 'MGMT8102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 71, 'programme_id' => 16, 'title' => 'Information Systems', 'base_code' => 'INFO7101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 72, 'programme_id' => 16, 'title' => 'Information Systems', 'base_code' => 'INFO7101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 73, 'programme_id' => 16, 'title' => 'Database Systems', 'base_code' => 'INFO7102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 74, 'programme_id' => 16, 'title' => 'Database Systems', 'base_code' => 'INFO7102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 75, 'programme_id' => 17, 'title' => 'Networking Fundamentals', 'base_code' => 'INFO8101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 76, 'programme_id' => 17, 'title' => 'Networking Fundamentals', 'base_code' => 'INFO8101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 77, 'programme_id' => 17, 'title' => 'Cybersecurity', 'base_code' => 'INFO8102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 78, 'programme_id' => 17, 'title' => 'Cybersecurity', 'base_code' => 'INFO8102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 79, 'programme_id' => 18, 'title' => 'Software Engineering', 'base_code' => 'INFO9101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 80, 'programme_id' => 18, 'title' => 'Software Engineering', 'base_code' => 'INFO9101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 81, 'programme_id' => 18, 'title' => 'Capstone Project', 'base_code' => 'INFO9102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 82, 'programme_id' => 18, 'title' => 'Capstone Project', 'base_code' => 'INFO9102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 83, 'programme_id' => 19, 'title' => 'Principles of Economics', 'base_code' => 'ECON7101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 84, 'programme_id' => 19, 'title' => 'Principles of Economics', 'base_code' => 'ECON7101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 85, 'programme_id' => 19, 'title' => 'Macroeconomics', 'base_code' => 'ECON7102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 86, 'programme_id' => 19, 'title' => 'Macroeconomics', 'base_code' => 'ECON7102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 87, 'programme_id' => 20, 'title' => 'Microeconomics', 'base_code' => 'ECON8101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 88, 'programme_id' => 20, 'title' => 'Microeconomics', 'base_code' => 'ECON8101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 89, 'programme_id' => 20, 'title' => 'Econometrics', 'base_code' => 'ECON8102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 90, 'programme_id' => 20, 'title' => 'Econometrics', 'base_code' => 'ECON8102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 91, 'programme_id' => 21, 'title' => 'Accounting Principles', 'base_code' => 'ACCY6101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 92, 'programme_id' => 21, 'title' => 'Accounting Principles', 'base_code' => 'ACCY6101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 93, 'programme_id' => 21, 'title' => 'Management Accounting', 'base_code' => 'ACCY6102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 94, 'programme_id' => 21, 'title' => 'Management Accounting', 'base_code' => 'ACCY6102', 'campus_id' => 6, 'intake' => 'Jul'],
            ['id' => 95, 'programme_id' => 22, 'title' => 'Financial Accounting', 'base_code' => 'ACCY6103', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 96, 'programme_id' => 22, 'title' => 'Financial Accounting', 'base_code' => 'ACCY6103', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 97, 'programme_id' => 22, 'title' => 'Taxation', 'base_code' => 'ACCY6104', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 98, 'programme_id' => 22, 'title' => 'Taxation', 'base_code' => 'ACCY6104', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 99, 'programme_id' => 23, 'title' => 'Business Research', 'base_code' => 'BUS7101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 100, 'programme_id' => 23, 'title' => 'Business Research', 'base_code' => 'BUS7101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 101, 'programme_id' => 23, 'title' => 'Business Project', 'base_code' => 'BUS7102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 102, 'programme_id' => 23, 'title' => 'Business Project', 'base_code' => 'BUS7102', 'campus_id' => 6, 'intake' => 'Jul'],

            ['id' => 103, 'programme_id' => 24, 'title' => 'Leadership Skills', 'base_code' => 'MGMT9101', 'campus_id' => 1, 'intake' => 'Feb'],
            ['id' => 104, 'programme_id' => 24, 'title' => 'Leadership Skills', 'base_code' => 'MGMT9101', 'campus_id' => 6, 'intake' => 'Feb'],
            ['id' => 105, 'programme_id' => 24, 'title' => 'Strategic Management', 'base_code' => 'MGMT9102', 'campus_id' => 1, 'intake' => 'Jul'],
            ['id' => 106, 'programme_id' => 24, 'title' => 'Strategic Management', 'base_code' => 'MGMT9102', 'campus_id' => 6, 'intake' => 'Jul'],
        ];


        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
