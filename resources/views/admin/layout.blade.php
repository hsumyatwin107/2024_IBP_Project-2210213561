<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Scholarship Admin Panel</title>
    @include('admin.css')  {{-- Your CSS file --}}
</head>
<body>
 <div class="container-scroller">
        @include('admin.slider')  {{-- Sidebar --}}
        <div class="main-panel">
            @include('admin.header')  {{-- Header/topbar --}}

            <div class="content-wrapper">
                @yield('content')  {{-- Content from each page --}}
            </div>
        </div>
    </div>

    @include('admin.js')  {{-- Your JS file --}}
</body>
</html>
