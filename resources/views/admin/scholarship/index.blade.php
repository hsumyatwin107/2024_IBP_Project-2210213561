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
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            color: white;
            margin-right: 5px;
        }
        .btn-edit {
            background-color: #3182ce; /* blue */
        }
        .btn-edit:hover {
            background-color: #2b6cb0;
        }
        .btn-delete {
            background-color: #e53e3e; /* red */
        }
        .btn-delete:hover {
            background-color: #9b2c2c;
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
        .add-new {
            margin-bottom: 15px;
            text-align: right;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .add-new a {
            background-color: #38a169;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
        }
        .add-new a:hover {
            background-color: #2f855a;
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
            <h1>{{ __('messages.scholarships') }}</h1>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="add-new">
                <a href="{{ route('scholarship.create') }}">+ {{ __('messages.add_new_scholarship') }}</a>
            </div>

            <div class="mine">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                        <th>{{ __('messages.name') }}</th>
                        <th>{{ __('messages.description') }}</th>
                        <th>{{ __('messages.application_deadline') }}</th>
                        <th>{{ __('messages.eligibility_criteria') }}</th>
                        <th>{{ __('messages.education_level') }}</th>
                        <th>{{ __('messages.scholarship_provider') }}</th>
                        <th>{{ __('messages.contact_email') }}</th>
                        <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($scholarships as $scholarship)
<tr>
    <td>{{ $scholarship->name }}</td>
    <td>{{ Str::limit($scholarship->description, 50) }}</td>
    <td>{{ $scholarship->deadline }}</td>
    <td>{{ $scholarship->eligibility}}</td>
    <td>{{ $scholarship->education_level }}</td>
    <td>{{ $scholarship->provider }}</td>
    <td>{{ $scholarship->contact_email }}</td>
    <td>
        <a href="{{ route('scholarship.edit', $scholarship->id) }}" class="btn btn-edit">{{ __('messages.edit') }}</a>
        <form action="{{ route('scholarship.destroy', $scholarship->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this scholarship?')">{{ __('messages.delete') }}</button>
        </form>
    </td>
</tr>
@endforeach

@if($scholarships->isEmpty())
<tr>
    <td colspan="10" style="text-align:center;">{{ __('messages.no_scholarships') }}</td>
</tr>
@endif

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    @include('admin.js')
</div>
</body>
</html>
