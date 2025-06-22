<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - VegeFood</title>
    <style>
        /* Custom CSS for VegeFood Success Page */
        :root {
            --primary-green: #4CAF50;
            --secondary-green: #81C784;
            --light-bg: #F1F8E9;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--light-bg);
            margin: 0;
            padding: 20px;
        }

        .success-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .success-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .success-icon {
            color: var(--primary-green);
            font-size: 72px;
            margin-bottom: 20px;
        }

        .order-details {
            display: grid;
            grid-gap: 30px;
            margin: 30px 0;
        }

        .detail-card {
            background: #F8F9FA;
            border-radius: 10px;
            padding: 20px;
            border-left: 4px solid var(--secondary-green);
        }

        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-item {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .continue-btn {
            background: var(--primary-green);
            color: white;
            padding: 16px 40px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin: 30px auto 0;
        }

        .continue-btn:hover {
            background: #45a049;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .success-container {
                padding: 20px;
                margin: 20px;
            }
        }
    </style>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="success-container">
        <!-- Success Header -->
        <div class="success-header">
            <i class="fas fa-check-circle success-icon"></i>
            <h1>Order Confirmed! 🎉</h1>
            <p>Thank you for choosing VegeFood! Your sustainable meal is on its way</p>
        </div>

        <!-- Order Summary -->
 

        <!-- Shipping Details -->


   
        <a href="{{ url('/dashboard') }}"</a><button class="continue-btn" >Continue Shopping →</button></a>
    </div>
</body>
</html>