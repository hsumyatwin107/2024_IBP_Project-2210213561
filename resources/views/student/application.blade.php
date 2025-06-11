<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        table, th, td {
            border: 1px solid navajowhite;
        }

        .order_dis {
            text-align: center;
            font-size: 18px;
            padding-bottom: 30px;
        }

        .table_des {
            border: 2px solid white;
            margin: auto;
            width: 100%;
            text-align: center;
        }

        .th_des {
            background: #0c5460;
            color: white;
            font-size: 20px;
        }

        .text_color {
            color: black;
        }
    </style>
    @include('student.css')
</head>
<body>
<div class="container-scroller">
    @include('student.slider')
    @include('student.header')

    <div class="main-panel">
        <div class="content-wrapper">
            <h5 style="text-align: center; padding: 5% 0; font-size: 40px;">My Scholarship Applications</h5>

            <div class="order_dis">
                @if ($applications->isEmpty())
                    <p>You have not applied to any scholarships yet.</p>
                @else
                    <table class="table_des">
                        <thead>
                            <tr class="th_des">
                                <th>Scholarship Name</th>
                                <th>Status</th>
                                <th>Applied At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->scholarship->name }}</td>
                                    <td>{{ ucfirst($application->status) }}</td>
                                    <td>{{ $application->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    @include('student.js')
</div>
</body>
</html>
