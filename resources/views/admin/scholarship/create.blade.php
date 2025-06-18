<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Create Scholarship</title>
    <style>
        body {
            background-color: #f0f2f5;
            color: #333;
        }

        .form-container {
            margin: auto;
            width: 50%;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            padding-top: 3%;
            padding-bottom: 3%;
            font-size: 32px;
            text-align: center;
            color: #444;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #38a169;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background-color: #2f855a;
        }
    </style>
    
</head>
<body>
<div class="container-scroller">
    
<div class="main-panel">
    <div class="content-wrapper">
    <div class="language-switch">
                <a href="{{ url('lang/en') }}">EN</a>
                <a href="{{ url('lang/tr') }}">TR</a>
                <a href="{{ url('lang/ar') }}">AR</a>
            </div>
        <h1>{{__('messages.add_new_scholarship')}}</h1>

        <div class="form-container">
            <form action="{{ route('scholarship.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Scholarship Basic Details -->
                <label for="name">{{__('messages.scholarship_name')}}</label>
                <input type="text" name="name" required>

                <label for="description">{{__("messages.description")}}</label>
                <textarea name="description" rows="4" required></textarea>

                <label for="deadline">{{__("messages.application_deadline")}}</label>
                <input type="date" name="deadline" value="{{ old('deadline') }}" required>
                @error('deadline')
                    <div style="color: red;">{{ $message }}</div>
                @enderror

                <label for="eligibility">{{__("messages.eligibility_criteria")}}</label>
                <textarea name="eligibility" rows="4" required></textarea>

                <label for="education_level">{{__("messages.education_level")}}</label>
                <select name="education_level" required>
                    <option value="">{{__("messages.select_level")}}</option>
                    <option value="Undergraduate">{{__("messages.undergraduate")}}</option>
                    <option value="Master">{{__("messages.master")}}</option>
                    <option value="PhD">{{__("messages.phd")}}</option>
                </select>

                <label for="provider">{{__("messages.scholarship_provider")}}</label>
                <input type="text" name="provider" required>

                <label for="contact_email">{{__("messages.contact_email")}}</label>
                <input type="email" name="contact_email" required>

                <br><br>
                <button type="submit">{{__("messages.create_scholarship")}}</button>
            </form>
        </div>
    </div>
</div>

    @include('admin.js')
</div>
</body>
</html>
