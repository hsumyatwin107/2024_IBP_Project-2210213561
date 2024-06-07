<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')

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
                <h1 class="font_size">Add Hospital Section</h1>

                <form action="{{url('/add_h_m')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="div_design">
                        <label>Doctor's Name</label>
                        <input class="text_color" type="text" name="name" placeholder="please enter a name" required="">
                    </div>

                    <div class="div_design">
                        <label>Section's Description</label>
                        <input class="text_color" type="text" name="description" placeholder="please enter a description" required="">
                    </div >

                    <div class="div_design">
                        <label>Appointment's Price</label>
                        <input class="text_color" type="number" name="price" placeholder="please enter a price" required="">
                    </div>

                    <div class="div_design">
                        <label>Section's Category</label>
                        <select class="text_color" name="category">
                            <option value="" selected="">add a category here</option>
                            @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="add_product">
                        <label>Section's Image</label>
                        <input class="text_color" type="file" name="image" required="">
                    </div>

                    <div class="add_product">
                        <input type="submit" value="add section" class="btn btn-primary">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.js')
<!-- End custom js for this page -->
</body>
</html>
