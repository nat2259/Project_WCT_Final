<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VegeFood - Sign Up</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/signup.css">
</head>
<body class="vegefood-signup">
   <div class="form-container">
        <a href="{{ url('/home') }}" class="back-arrow">&#8592;</a>
        <h2>Registration</h2>
        
        <form id="registrationForm"  method="POST">
            @csrf

             <div class="form-group">
                <label for="fname">First Name<span class="error">*</span></label>
                <input type="text" id="Name" name="Name" placeholder="Enter your name..." required>
            </div>

            <div class="form-group">
                <label for="lname">Last Name<span class="error">*</span></label>
                <input type="text" id="Name" name="Name" placeholder="Enter your name..." required>
            </div>
        
            <div class="form-group">
                <label for="email">Email Address<span class="error">*</span></label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>
        
            <div class="form-group">
                <label for="password">Password<span class="error">*</span></label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>
        
            <div class="form-group">
                <label for="confirmPassword">Confirm Password<span class="error">*</span></label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter your password" required>
                <span id="passwordError" class="error"></span>
            </div>
        
            <button type="submit" id="submitBtn" disabled>Register</button>
            <div class="footerword">
                <span>Already have an account? </span>
                <a href="{{ url('/login') }}"><strong>Login</strong></a>
            </div>
        </form>
        

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Validation Script -->
    <script src="./js/signup.js"></script>
</body>
</html>