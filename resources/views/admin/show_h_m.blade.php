<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css">

        .center{
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        table,th,td {
            border: 1px solid navajowhite;
        }
        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size{
            width: 110px;
            height: 100px;
        }
        .tabel_color{
            background: #0c5460;
        }
        .space{
            padding: 30px;
        }

    </style>

    <!-- Required meta tags -->
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.slider')
    <!-- partial -->
    @include('admin.header')
    <!-- partial -->


    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <h2 class="font_size">All Sections</h2>

            <table class="center">
                <tr class="tabel_color">
                    <th class="space">Doctor's name</th>
                    <th class="space">Description</th>
                    <th class="space">Appointment Price</th>
                    <th class="space">Section</th>
                    <th class="space">Image</th>
                    <th class="space">Edit</th>
                    <th class="space">Delete</th>
                </tr>

                @foreach($product as $product)
                    <tr>
                        <td>{{$product->doctor_name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->Price}}$</td>
                        <td>{{$product->category}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{url('edit_h_m',$product->id)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('are you sure you want to delete this?')" href="{{url('delete_section',$product->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
</div>
</body>
</html>
