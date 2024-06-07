<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">

    <style type="text/css">

        .add_product{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
        }

    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png"/>
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

            <div class="add_product">
                <h1 class="font_size">Update Section</h1>

                <form action="{{url('/update_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="div_design">
                        <label>Doctor's name</label>
                        <input class="text_color" type="text" name="title" placeholder="please enter a title" required="" value="{{$product->doctor_name}}">
                    </div>

                    <div class="div_design">
                        <label>Description</label>
                        <input class="text_color" type="text" name="description" placeholder="please enter a description" required="" value="{{$product->description}}">
                    </div >

                    <div class="div_design">
                        <label>Appointment's Price</label>
                        <input class="text_color" type="number" name="price" placeholder="please enter a price" required="" value="{{$product->Price}}">
                    </div>

                    <div class="div_design">
                        <label>Category</label>
                        <select class="text_color" name="category">
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>

                            @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="add_product">
                        <label>Current Image</label>
                        <img style="margin: auto" height="100" width="100" src="/product/{{$product->image}}">
                    </div>

                    <div class="add_product">
                        <label>Product Image</label>
                        <input class="text_color" type="file" name="image">
                    </div>

                    <div class="add_product">
                        <input type="submit" value="Update Product" class="btn btn-primary">
                    </div>

                </form>

            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.js')
        <!-- End custom js for this page -->
    </div>
</div>
</body>
</html>

