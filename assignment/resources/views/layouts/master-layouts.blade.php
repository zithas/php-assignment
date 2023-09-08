<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}">
    @include('layouts.head-css')
</head>

@section('body')
    <body data-topbar="dark" data-layout="horizontal">
@show
    
    <div id="layout-wrapper">
        @include('layouts.horizontal')
       
        <div class="main-content">
            <div class="page-content">
                     <div class="container-fuild" style="width:97%; margin-left:20px"> 
                    @yield('content')
                   </div> 
            </div>
            @include('layouts.footer')
        </div>
       
    </div>
    @include('layouts.right-sidebar')
    @include('layouts.vendor-scripts')
</body>

</html>
