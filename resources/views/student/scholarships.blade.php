@auth
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

        .btn-disabled {
            background-color: grey;
            color: white;
            cursor: not-allowed;
            pointer-events: none;
        }

        .btn-apply {
            background-color: #0c5460;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
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
            <h5 style="text-align: center; padding: 5% 0; font-size: 40px;">{{ __('messages.avaliable scholarship') }}</h5>

            <div class="order_dis">
                @if ($scholarships->isEmpty())
                    <p>{{ __('messages.noscholarships') }}</p>
                @else
                    <table class="table_des">
                        <thead>
                        <tr class="th_des">
                            <th>{{ __('messages.scholarship_name') }}</th>
                            <th>{{ __('messages.description') }}</th>
                            <th>{{ __('messages.eligibility') }}</th>
                            <th>{{ __('messages.deadline') }}</th>
                            <th>{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($scholarships as $scholarship)
                            <tr>
                                <td>{{ $scholarship->name }}</td>
                                <td>{{ $scholarship->description }}</td>
                                <td>{{ $scholarship->eligibility }}</td>
                                <td>{{ $scholarship->deadline }}</td>
                                <td>
                                    @if (in_array($scholarship->id, $appliedScholarshipIds))
                                        <span class="btn-disabled">{{ __('messages.applied') }}</span>
                                    @else
                                        <form action="{{ route('scholarship.apply', $scholarship->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-apply">{{ __('messages.apply') }}</button>
                                        </form>
                                    @endif
                                </td>
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
@endauth
