<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f0f2f5;
            color: #333;
        }
        .mine {
            margin: auto;
            width: 60%;
            padding-top: 2%;
            text-align: left;
        }
        h1 {
            font-size: 36px;
            font-weight: 600;
            color: #444;
            padding-bottom: 2%;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            resize: vertical;
        }
        button {
            margin-top: 20px;
            background-color: #3182ce;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #2c5282;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="mine">
                <h1>Edit Scholarship</h1>
                <form action="{{ route('scholarship.update', $scholarship->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="name">Scholarship Name</label>
                    <input type="text" name="name" value="{{ $scholarship->name }}" required>

                    <label for="description">Description</label>
                    <textarea name="description" rows="4" required>{{ $scholarship->description }}</textarea>

                    <label for="deadline">Application Deadline</label>
                    <input type="date" name="deadline" value="{{ $scholarship->deadline }}" required>

                    <label for="eligibility">Eligibility Criteria</label>
                    <textarea name="eligibility" rows="4" required>{{ $scholarship->eligibility }}</textarea>

                    <label for="education_level">Education Level</label>
                    <select name="education_level" required>
                        <option value="">Select level</option>
                        <option value="Undergraduate" {{ $scholarship->education_level == 'Undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                        <option value="Master" {{ $scholarship->education_level == 'Master' ? 'selected' : '' }}>Master</option>
                        <option value="PhD" {{ $scholarship->education_level == 'PhD' ? 'selected' : '' }}>PhD</option>
                    </select>

                    <label for="provider">Scholarship Provider</label>
                    <input type="text" name="provider" value="{{ $scholarship->provider }}" required>

                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ $scholarship->contact_email }}" required>

                    <button type="submit">Update Scholarship</button>
                </form>
            </div>
        </div>
    </div>

    @include('admin.js')
</div>
</body>
</html>
