<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <title>Login Form</title>
    <link rel="stylesheet" href="./css/signin.css" />

</head>

<body>
    

    <form id="loginForm"  method="POST" action="{{ url('/login') }}">
         @csrf
        <h2>Login Form</h2>
        <div class="input-group">
            <input type="text" placeholder="Enter your Email" id="email" name="email" required />
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" id="psw" name="password" required>

           <!-- Show Password Icon -->
        <svg onclick="togglePassword(true)" id="show-password-icon" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        
        <!-- Hide Password Icon -->
        <svg onclick="togglePassword(false)" id="hide-password-icon" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.944-9.544-7a10.05 10.05 0 012.38-3.568M9.88 9.88a3 3 0 014.242 4.243M6.1 6.1l11.8 11.8" />
        </svg>
  

        </div>

        <button type="submit" onclick="submitForm(event)">Submit</button>
        <br />
        <a href="{{ url('/register') }}"> Create an account</a>
    </form>

    <script src="./js/signin.js"></script>
</body>

</html>
