
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('student.css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('student.slider')
    <!-- partial -->
    @include('student.header')
    <!-- partial -->
    @include('student.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('student.js')
    <!-- End custom js for this page -->
</div>
</body>
</html>
