<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <title>Edit Scholarship</title>
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
            <div class="language-switch">
                <a href="{{ url('lang/en') }}">EN</a>
                <a href="{{ url('lang/tr') }}">TR</a>
                <a href="{{ url('lang/ar') }}">AR</a>
            </div>
            <h1>{{ __('messages.edit_scholarship') }}</h1>
<form action="{{ route('scholarship.update', $scholarship->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">{{ __('messages.scholarship_name') }}</label>
    <input type="text" name="name" value="{{ $scholarship->name }}" required>

    <label for="description">{{ __('messages.description') }}</label>
    <textarea name="description" rows="4" required>{{ $scholarship->description }}</textarea>

    <label for="deadline">{{ __('messages.application_deadline') }}</label>
    <input type="date" name="deadline" value="{{ old('deadline') }}" required>
                @error('deadline')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
    <label for="eligibility">{{ __('messages.eligibility_criteria') }}</label>
    <textarea name="eligibility" rows="4" required>{{ $scholarship->eligibility }}</textarea>

    <label for="education_level">{{ __('messages.education_level') }}</label>
    <select name="education_level" required>
        <option value="">{{ __('messages.select_level') }}</option>
        <option value="Undergraduate" {{ $scholarship->education_level == 'Undergraduate' ? 'selected' : '' }}>
            {{ __('messages.undergraduate') }}
        </option>
        <option value="Master" {{ $scholarship->education_level == 'Master' ? 'selected' : '' }}>
            {{ __('messages.master') }}
        </option>
        <option value="PhD" {{ $scholarship->education_level == 'PhD' ? 'selected' : '' }}>
            {{ __('messages.phd') }}
        </option>
    </select>

    <label for="provider">{{ __('messages.scholarship_provider') }}</label>
    <input type="text" name="provider" value="{{ $scholarship->provider }}" required>

    <label for="contact_email">{{ __('messages.contact_email') }}</label>
    <input type="email" name="contact_email" value="{{ $scholarship->contact_email }}" required>

    <button type="submit">{{ __('messages.update_scholarship') }}</button>
</form>

            </div>
        </div>
    </div>

    @include('admin.js')
</div>
</body>
</html>
