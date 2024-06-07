<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css">

        .center_b{

            text-align: center;
            padding-top: 40px;
        }
        table,th,td {
            border: 1px solid navajowhite;
        }
        .table_color{
            background: #0c5460;
            font-size: 30px;
        }


        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }

        .color_input{

            color: black;
        }

        .table_center{

            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>

            @endif

            <div class="center_b">

                <h2 class="h2_font">Category</h2>

                <form action="{{url('/add_category')}}" method="post">
                    @csrf

                    <input class="color_input" type="text" name="category" placeholder="please write your category name">

                    <input type="submit" name="submit" value="add category" class="btn btn-primary">

                </form>

                <table class="table_center">
                    <tr class="table_color">
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>

                    @foreach($data as $data)
                        <tr>
                            <td>{{$data->category_name}}</td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('are you sure to delete this?')" href="{{url('delete_category',$data->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>

        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
</div>
</body>
</html>
