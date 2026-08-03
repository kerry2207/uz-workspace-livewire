<?php

return [
    'component_namespaces' => [
        'layouts' => resource_path('views/layouts'),
        'pages' => resource_path('views/pages'),
    ],
    'make_command' => [
        'type' => 'sfc',
        'emoji' => true,
    ],
    'component_layout' => 'layouts::app',
    'smart_wire_keys' => true,
    'inject_assets' => true,
    'navigate' => [
        'show_progress_bar' => true,
        'progress_bar_color' => '#213786',
    ],
    'temporary_file_upload' => [
        'disk' => null,
        'rules' => ['required', 'file', 'max:12288'],
        'directory' => null,
        'middleware' => null,
        'preview_mimes' => ['png', 'gif', 'bmp', 'svg', 'wav', 'mp4', 'mov', 'avi', 'wmv', 'mp3', 'm4a', 'jpg', 'jpeg', 'mpga', 'webp', 'wma'],
        'max_upload_time' => 5,
        'cleanup' => true,
    ],
    'legacy_model_binding' => false,
    'render_on_redirect' => false,
    'release_token' => 'a',
];
