<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: #f0f2f5;
            color: #333;
        }
        .mine {
            margin: auto;
            width: 80%;
            text-align: center;
        }
        table, th, td {
            border: 1px solid navajowhite;
            border-collapse: collapse;
            padding: 8px;
        }
        th {
            background-color: #0c5460;
        }
        h1 {
            padding-top: 3%;
            padding-bottom: 3%;
            font-size: 36px;
            font-weight: 600;
            color: #444;
        }
        .btn {
            font-size: 14px;
            padding: 4px 10px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            color: white;
        }
        .btn-accept {
            background-color: #38a169; /* green */
        }
        .btn-accept:hover {
            background-color: #2f855a;
        }
        .btn-deny {
            background-color: #e53e3e; /* red */
        }
        .btn-deny:hover {
            background-color: #9b2c2c;
        }
        .no-action {
            font-style: italic;
            color: gray;
        }
        .alert-success {
            background-color: #c6f6d5;
            color: #22543d;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.slider')
    @include('admin.header')

    <div class="main-panel">
        <div class="content-wrapper">
            <h1>Student Applications</h1>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mine">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Father Name</th>
                            <th>Date of Birth</th>
                            <th>residence_permit_number</th>
                            <th>Scholarship</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                        <tr>
                            <td>{{ $application->user->name }}</td>
                            <td>{{ $application->user->father_name }}</td>
                            <td>{{ $application->user->date_of_birth }}</td>
                            <td>{{ $application->user->residence_permit_number }}</td>
                            <td>{{ $application->scholarship->name }}</td>
                            <td style="text-transform: capitalize;">{{ $application->status }}</td>
                            <td>
                                @if($application->status === 'pending')
                                    <form method="POST" action="{{ route('application.updateStatus', $application->id) }}" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="accepted">
                                        <button type="submit" class="btn btn-accept">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ route('application.updateStatus', $application->id) }}" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="denied">
                                        <button type="submit" class="btn btn-deny">Deny</button>
                                    </form>
                                @else
                                    <span class="no-action">No actions available</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    @include('admin.js')
</div>
</body>
</html>
