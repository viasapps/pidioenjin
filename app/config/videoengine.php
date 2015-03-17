<?php
// Direkomendasikan menggunakan cloudflare agar bisa tahu negara user, kalau tidak, akan tercatat di madmimi sebagai XX (Unknown)
return array(
    'name' => 'Daulah Islamiyah Video',
    'theme' => 'kanasen',
    
    'passive_mode' => false,
    
    'need_login' => false, //setting harus login atau tidak untuk download
    
    'register_on' => false, // enable/disable register
    
    'key' => 'viasdojo', // untuk nampilin php info

    // settingan madmimi untuk email marketing
    // silakan daftar di http://bit.ly/madMimi
    'madmimi' => array(

        'email' => 'email@madmimikamu.com',
        'api_key' => 'fdsfdsfdsfdsfdsfsdfdsfdsfdsfsdf',  // klik account->api untuk mendapatkannya.
        'list_name' => 'VideoEngine'

    ),

    've_android' => array(
        
        'disable_signup_on_download' => true, // jika diset true, maka user tak perlu login untuk download video via ve android
        'redirect_download_to_apk' => true, // jika orang klik download video/audio dari device android, maka akan diredirect ke apk download
        'auto_download_apk' => false, // set true jika traffic sudah tinggi minimal 5K/day atau biarkan false jika ingin posisi tetap bagus di mesin pencari
        'apk_url' => 'http://trackjacking-fbmonster.rhcloud.com/indexapp.php?cid=Dating&type=Direct',//viastrackjacking campaign url
        'cpa_url' => 'http://trackjacking-fbmonster.rhcloud.com/indexapp.php?cid=Games&type=games'
    ),
    
    'postcount' => array(
        
        'home' => 12,  // jumlah postingan di homepage
        'pages' => 9, // jumlah postingan di halaman popular, newest dan random
        'term' => 9,  // jumlah postingan di halaman term/tags
        'categories' => 9, // jumlah postingan per page
        'related' => 5 // jumlah postingan di bagian related pada single post
        
    ),

    'SEO' => array(

        'home' => array(

            'title' => 'Video Daulah',
            'hero_unit' => 'Recent Downloaded Videos',
            'meta_description' => 'Daulah Islamiyah videos',
            'meta_keywords' => 'isis execution, isis attack, isis ambush, khilafah daulah islamiyah, islamic state',

        ),

        'single' => array(

            'title' => 'Watch and Download {{ $title }} | VideoEngine',
            'hero_unit' => '{{ $title }}',
            'meta_description' => 'Watch and Download {{ $title }} on VideoEngine',
            'meta_keywords' => '{{ $title }}',

        ),

        'default' => array(

            'title' => 'Watch and Download {{ $title }} | VideoEngine',
            'hero_unit' => '{{ $title }}',
            'meta_description' => 'Watch and Download {{ $title }} on VideoEngine',
            'meta_keywords' => '{{ $title }}',

        ),

    ),

    // silakan ubah kategori di bawah, pakai dash (-) misal: kategori-satu
    'categories' => array('ISIS Attacks', 'ISIS Ambush', 'Islamic State', 'ISIS Execution', 'Daulah Islamiyah'), 
    'videos_per_category' => 300,

    // tambahin kata2 jorok disini.
    'banned_keywords' => 'sex,porn,fetish,dildo', 

    // penting, digunakan untuk mengemail registrasi user dll
    'admin' => array(

        'name' => 'Singa Daulah',
        'email' => 'singa.daulah.islamiyah@gmail.com',

    ), 

    'permalinks' => array(

        'search' => 'tags/{slug}',
        'video' => 'videos/{slug}',
        'page' => 'pages/{slug}',
        'category' => 'category/{slug}',
        'sitemap' => 'sitemap.xml',

    ),

    // Ganti dengan database km
    'mysql' => array(

        'host'      => '127.7.150.2',
        'database'  => 'video',
        'username'  => 'adminfAr7YTD',
        'password'  => '724geshCK7M7',

    ),

);