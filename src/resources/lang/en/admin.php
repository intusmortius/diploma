<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'tag' => [
        'title' => 'Tags',

        'actions' => [
            'index' => 'Tags',
            'create' => 'New Tag',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'slag' => 'Slag',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            'two_factor_secret' => 'Two factor secret',
            'two_factor_recovery_codes' => 'Two factor recovery codes',
            'worker_specialization' => 'Worker specialization',
            'worker_group' => 'Worker group',
            'worker_cathedra' => 'Worker cathedra',
            'worker_faculty' => 'Worker faculty',
            'customer_work_place' => 'Customer work place',
            'about' => 'About',
            
        ],
    ],

    'vacancy' => [
        'title' => 'Vacancies',

        'actions' => [
            'index' => 'Vacancies',
            'create' => 'New Vacancy',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'author_id' => 'Author',
            'name' => 'Name',
            'description' => 'Description',
            'about_worker' => 'About worker',
            'responsibilities' => 'Responsibilities',
            'requirements' => 'Requirements',
            'personal_skills' => 'Personal skills',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            'two_factor_secret' => 'Two factor secret',
            'two_factor_recovery_codes' => 'Two factor recovery codes',
            'worker_specialization' => 'Worker specialization',
            'worker_group' => 'Worker group',
            'worker_cathedra' => 'Worker cathedra',
            'worker_faculty' => 'Worker faculty',
            'customer_work_place' => 'Customer work place',
            'about' => 'About',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];