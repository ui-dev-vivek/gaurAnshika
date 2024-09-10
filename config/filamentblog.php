<?php



use Firefly\FilamentBlog\Models\User;

return [
    'tables' => [
        'prefix' => 'asg_',
    ],
    'route' => [
        'prefix' => 'blogs',
        'middleware' => ['web'],
        'login' => [
            'name' => 'filamentblog.post.login',
        ],
    ],
    'user' => [
        'model' => User::class,
        'foreign_key' => 'user_id',
        'columns' => [
            'name' => 'name',
            'avatar' => 'profile_photo_path',
        ],
    ],
    'seo' => [
        'meta' => [
            'title' => 'Gaur Anshika Blogs',
            // 'description' => 'This is filament blog seo meta description',
            'keywords' => [],
        ],
    ],

    'recaptcha' => [
        'enabled' => false, // true or false
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret_key' => env('RECAPTCHA_SECRET_KEY'),
    ],
];
