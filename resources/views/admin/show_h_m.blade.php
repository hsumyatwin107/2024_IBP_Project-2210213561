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

            <h2 class="font_size">{{ __('messages.all_sections') }}</h2>
            <div class="add_product">
                <a href="{{ url('add_h_m') }}" class="btn btn-primary">{{ __('messages.add_section') }}</a>
                <table class="center">
                    <tr class="tabel_color">
                        <th class="space">{{ __('messages.description') }}</th>
                        <th class="space">{{ __('messages.image') }}</th>
                        <th class="space">{{ __('messages.edit') }}</th>
                        <th class="space">{{ __('messages.delete') }}</th>
                    </tr>

                @foreach($product as $product)
                    <tr>
                        <td>{{$product->description}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{url('edit_h_m',$product->id)}}">{{ __('messages.edit') }}</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('are you sure you want to delete this?')" href="{{url('delete_section',$product->id)}}">{{ __('messages.delete') }}</a>
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
