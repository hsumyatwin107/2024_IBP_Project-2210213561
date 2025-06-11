<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">

        table,th,td {
            border: 1px solid navajowhite;
           
        }
        .order_dis{

            text-align: center;
            font-size: 15px;
            padding-bottom: 20px;
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
                <div class="order_dis">
                <table class="table_des">
        <tr class="th_des">
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Message</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>
    <tbody>
        @foreach($message as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->user_message }}</td>
            <td>
                <form method="POST" action="{{ url('sendReply/' . $item->id) }}">
                    @csrf
                    <input type="text" name="reply" placeholder="Enter reply" value="{{ $item->reply }}" />
                    <button type="submit" class="btn btn-primary btn-sm">Send</button>
                </form>
            </td>
            <td>
                <a href="{{ url('delete_message', $item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
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
