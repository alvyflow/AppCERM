<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | Set some default values. It is possible to add all defines that can be set
    | in dompdf_config.inc.php. You can also override the entire config file.
    |
    */
    'show_warnings' => false,   // Throw an Exception on warnings from dompdf

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | Array of options for Dompdf\Options
    |
    */
    'options' => [
        'font_dir' => storage_path('fonts/'), // Directory where font will be stored
        'font_cache' => storage_path('fonts/'), // Directory where font cache will be stored
        'temp_dir' => sys_get_temp_dir(), // Directory for temporary files
        'chroot' => realpath(base_path()), // The chroot directory for the renderer's processes
        'allowed_protocols' => [
            'file://' => ['rules' => []],
            'http://' => ['rules' => []],
            'https://' => ['rules' => []],
        ],
        'log_output_file' => null, // Log output file
        'enable_font_subsetting' => false, // Whether to enable font subsetting or not
        'pdf_backend' => 'CPDF', // The default PDF renderer
        'default_media_type' => 'screen', // Default media type
        'default_paper_size' => 'a4', // Default paper size
        'default_font' => 'serif', // Default font
        'dpi' => 96, // Screen DPI
        'enable_php' => false, // Enable PHP usage
        'enable_javascript' => true, // Enable JavaScript
        'enable_remote' => true, // Enable remote file access
        'font_height_ratio' => 1.1, // A ratio to define font height
        'enable_html5_parser' => true, // Enable HTML5 parsing
    ],
];
