<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'county_create',
            ],
            [
                'id'    => 18,
                'title' => 'county_edit',
            ],
            [
                'id'    => 19,
                'title' => 'county_show',
            ],
            [
                'id'    => 20,
                'title' => 'county_delete',
            ],
            [
                'id'    => 21,
                'title' => 'county_access',
            ],
            [
                'id'    => 22,
                'title' => 'setting_access',
            ],
            [
                'id'    => 23,
                'title' => 'sub_county_create',
            ],
            [
                'id'    => 24,
                'title' => 'sub_county_edit',
            ],
            [
                'id'    => 25,
                'title' => 'sub_county_show',
            ],
            [
                'id'    => 26,
                'title' => 'sub_county_delete',
            ],
            [
                'id'    => 27,
                'title' => 'sub_county_access',
            ],
            [
                'id'    => 28,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 29,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 30,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 31,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 32,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 33,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 34,
                'title' => 'application_create',
            ],
            [
                'id'    => 35,
                'title' => 'application_edit',
            ],
            [
                'id'    => 36,
                'title' => 'application_show',
            ],
            [
                'id'    => 37,
                'title' => 'application_delete',
            ],
            [
                'id'    => 38,
                'title' => 'application_access',
            ],
            [
                'id'    => 39,
                'title' => 'ward_create',
            ],
            [
                'id'    => 40,
                'title' => 'ward_edit',
            ],
            [
                'id'    => 41,
                'title' => 'ward_show',
            ],
            [
                'id'    => 42,
                'title' => 'ward_delete',
            ],
            [
                'id'    => 43,
                'title' => 'ward_access',
            ],
            [
                'id'    => 44,
                'title' => 'institution_create',
            ],
            [
                'id'    => 45,
                'title' => 'institution_edit',
            ],
            [
                'id'    => 46,
                'title' => 'institution_show',
            ],
            [
                'id'    => 47,
                'title' => 'institution_delete',
            ],
            [
                'id'    => 48,
                'title' => 'institution_access',
            ],
            [
                'id'    => 49,
                'title' => 'financial_year_create',
            ],
            [
                'id'    => 50,
                'title' => 'financial_year_edit',
            ],
            [
                'id'    => 51,
                'title' => 'financial_year_show',
            ],
            [
                'id'    => 52,
                'title' => 'financial_year_delete',
            ],
            [
                'id'    => 53,
                'title' => 'financial_year_access',
            ],
            [
                'id'    => 54,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 55,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 56,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 57,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 58,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 59,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 60,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 61,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 62,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 63,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 64,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 65,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 66,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 67,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 68,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 69,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 70,
                'title' => 'system_setting_create',
            ],
            [
                'id'    => 71,
                'title' => 'system_setting_edit',
            ],
            [
                'id'    => 72,
                'title' => 'system_setting_show',
            ],
            [
                'id'    => 73,
                'title' => 'system_setting_delete',
            ],
            [
                'id'    => 74,
                'title' => 'system_setting_access',
            ],
            [
                'id'    => 75,
                'title' => 'award_upload_create',
            ],
            [
                'id'    => 76,
                'title' => 'award_upload_edit',
            ],
            [
                'id'    => 77,
                'title' => 'award_upload_show',
            ],
            [
                'id'    => 78,
                'title' => 'award_upload_delete',
            ],
            [
                'id'    => 79,
                'title' => 'award_upload_access',
            ],
            [
                'id'    => 80,
                'title' => 'course_create',
            ],
            [
                'id'    => 81,
                'title' => 'course_edit',
            ],
            [
                'id'    => 82,
                'title' => 'course_show',
            ],
            [
                'id'    => 83,
                'title' => 'course_delete',
            ],
            [
                'id'    => 84,
                'title' => 'course_access',
            ],
            [
                'id'    => 85,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
