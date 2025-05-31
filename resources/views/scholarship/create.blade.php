<!DOCTYPE html>
<html lang="en">
<head>
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
        <h1>Add New Scholarship</h1>

        <div class="form-container">
            <form action="{{ route('scholarship.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Scholarship Basic Details -->
                <label for="name">Scholarship Name</label>
                <input type="text" name="name" required>

                <label for="description">Description</label>
                <textarea name="description" rows="4" required></textarea>

                <label for="deadline">Application Deadline</label>
                <input type="date" name="deadline" required>

                <label for="eligibility">Eligibility Criteria</label>
                <textarea name="eligibility" rows="4" required></textarea>

                <label for="education_level">Education Level</label>
                <select name="education_level" required>
                    <option value="">Select level</option>
                    <option value="Undergraduate">Undergraduate</option>
                    <option value="Master">Master</option>
                    <option value="PhD">PhD</option>
                </select>

                <label for="provider">Scholarship Provider</label>
                <input type="text" name="provider" required>

                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" required>

                <br><br>
                <button type="submit">Create Scholarship</button>
            </form>
        </div>
    </div>
</div>

    @include('admin.js')
</div>
</body>
</html>
