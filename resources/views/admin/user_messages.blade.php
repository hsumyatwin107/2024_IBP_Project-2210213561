<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">

        .mine {
            margin: auto;
            width: 50%;
            text-align: center;
        }
        table,th,td {
            border: 1px solid navajowhite;
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
    {{--    @include('admin.body')--}}
    <div class="main-panel">
        <div class="content-wrapper">
            <div >
                <h5 style="padding-left: 40%;padding-top: 5%;padding-bottom: 5%; font-size: 40px">User Messages</h5>
                <div class="mine">
                    <table style="margin: auto">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Action</th>


                        </tr>
                        @foreach($message as $message)
                            <tr>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->phone}}</td>
                                <td>{{$message->user_message}}</td>
                                <td>
                                    <a href="{{url('delete_message',$message->id)}}"  onclick="return confirm('are you sure you want to delete this message?')" class="btn btn-danger">Delete</a>
                                </td>


                            </tr>
                        @endforeach
                    </table>
                </div>
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
