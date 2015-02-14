<!DOCTYPE html>
<html lang="en" class="js js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>{{ Theme::place('title') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ Theme::place('meta_desc') }}">
        <meta name="keywords" content="{{ Theme::place('meta_keywords') }}">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>

        {{ Theme::asset()->styles() }}
        {{ alertcss() }}

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
        </script>
        <![endif]-->
        <!-- Le fav  -->
        <link rel="shortcut icon" href="{{ Theme::asset()->url('img/favicon.ico') }}">
    </head>

    <!-- activate scrollspy -->
    <body id="top" data-spy="scroll" data-target=".navbar" data-offset="50">

        <!-- Nav button -->
        <a id="toggle" class="closed" aria-hidden="true">
            <i class="icon-reorder"></i>
        </a>