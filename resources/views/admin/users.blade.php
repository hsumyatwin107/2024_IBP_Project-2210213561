<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css">

        .order_dis{

            text-align: center;
            font-size: 30px;
            padding-bottom: 30px;
        }
        table,th,td {
            border: 1px solid navajowhite;
        }

        .table_des{
            border: 2px solid white;
            margin: auto;
            width: 100%;
            text-align: center;
        }

        .th_des{

            background: #0c5460;
            font-size: 20px;
        }
        .text_color{
            color: black;
        }

    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
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



            <h1 class="order_dis">{{ __('messages.all_users') }}</h1>

            <table class="table_des">
                <tr class="th_des">
                <th>{{ __('messages.user_name') }}</th>
                <th>{{ __('messages.user_email') }}</th>
                <th>{{ __('messages.user_type') }}</th>
                <th>{{ __('messages.new_user_type') }}</th>
                <th>{{ __('messages.user_update') }}</th>
                <th>{{ __('messages.delete_user') }}</th>
                </tr>

                @foreach($users as $user)
                    <form action="{{url('/updates',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->usertype}}</td>
                            <td>
                                <div class="div_design">
                                    <input class="text_color" type="number" min="0" name="usertype" placeholder="{{ __('messages.enter_user_type') }}" value="">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="submit" value="{{ __('messages.update') }}" class="btn btn-primary">
                                </div>
                            </td>
                            <td>
                                <a href="{{url('delete_user',$user->id)}}" class="btn btn-danger" onclick="return confirm('{{ __('messages.confirmdelete') }}')">{{ __('messages.delete') }}</a>
                            </td>

                            {{--                        <form action="{{url('/updates',$user->id)}}" method="POST" enctype="multipart/form-data">--}}
                            {{--                        @csrf--}}


                        </tr>
                    </form>
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
