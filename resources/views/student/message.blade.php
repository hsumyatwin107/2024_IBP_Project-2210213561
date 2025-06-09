@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .main-panel {
            padding: 40px;
        }

        .contact-box {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto 40px auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }

        .contact-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 28px;
        }

        .contact-box input,
        .contact-box textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #ffffff;
            font-size: 14px;
        }

        .contact-box input::placeholder,
        .contact-box textarea::placeholder {
            color: #bbbbbb;
        }

        .contact-box textarea {
            height: 100px;
            resize: vertical;
        }

        .contact-box input[type="submit"] {
            width: 100%;
            background-color: #0c5460;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-box input[type="submit"]:hover {
            background-color: #09454f;
        }

        .reply-section h2 {
            text-align: center;
            font-size: 28px;
            margin: 40px 0 20px 0;
        }

        .table_des {
            border: 2px solid white;
            margin: auto;
            width: 90%;
            text-align: center;
            border-collapse: collapse;
        }

        .table_des th,
        .table_des td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
        }

        .th_des {
            background-color: #0c5460;
            color: white;
            font-size: 18px;
        }

        .table_des td {
            color: #dddddd;
            font-size: 15px;
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
            <div class="contact-box">
                <h2>Contact Us</h2>
                <form action="{{ url('user_message') }}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="number" name="phone" placeholder="Your Phone Number" required>
                    <textarea name="message" placeholder="Write your message here..." required></textarea>
                    <input type="submit" value="Send Message">
                </form>
            </div>

            @if(isset($messages) && $messages->count() > 0)
                <div class="reply-section">
                    <h2>Admin Replies</h2>
                    <table class="table_des">
                        <thead>
                        <tr class="th_des">
                            <th>Your Message</th>
                            <th>Admin Reply</th>
                            <th>Replied At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $msg)
                            <tr>
                                <td>{{ $msg->message }}</td>
                                <td>{{ $msg->reply ?? 'No reply yet.' }}</td>
                                <td>{{ $msg->updated_at->format('d M Y H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    @include('student.js')
</div>
</body>
</html>
@endauth
