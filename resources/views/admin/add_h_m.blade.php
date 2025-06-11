<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style type="text/css">
        .add_product {
            text-align: center;
            padding-top: 40px;
        }
        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color {
            color: black;
            padding-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 200px;
        }
        .div_design {
            padding-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container-scroller">

    @include('admin.slider')
    @include('admin.header')

    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="add_product">
                <h1 class="font_size">Add About</h1>

                <form action="{{ url('/add_h_m') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="div_design">
                        <label>Description</label>
                        <input class="text_color" type="text" name="description" placeholder="Please enter a description" required>
                    </div>

                    <div class="div_design">
                        <label>Section's Image</label>
                        <input class="text_color" type="file" name="image" required>
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Add Section" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.js')
</body>
</html>
