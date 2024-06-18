<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link href="animate.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <title>About Us - [Online Restaurant Name]</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header, footer {
            background: #DC381F;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        h1, h2 {
            color: #333;
        }
        p {
            line-height: 1.6;
        }
        .content {
            padding: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
        }
        input, textarea, select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        .radio-group {
            display: flex;
            justify-content: space-between;
            max-width: 300px;
            margin-bottom: 20px;
        }
        button {
            display: flex;
            padding: 10px;
            background-color: #FFA500;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            align-self: center;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Golden Kitchen</h1>
        <h1><a href="home.php"> home page</a></h1>
    </header>
    
    <div class="container">
       
        <div class="row ">
            <div class="col-6 md-3">
            <h1>Contact Us</h1>
        <form action="process/process_contact.php" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" placeholder="Full Name" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Email" name="email" required>

            <label for="email">Phone:</label>
            <input type="phone" id="phone" placeholder="Phone Number" name="phone" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

          

            <button type="submit">Send Message</button>
        </form>

           
            </div>

            <div class="col-6 md-3">
            <h2>Visit Us</h2>
            <p>Explore our platform and discover a world of flavors. We invite you to join our community of
                 food lovers and vendors, and experience the convenience and joy of online dining.</p>
            <p><strong>Location:</strong><br>
             Sapele Road By Ekae Quarters<br>
            Edo State, Benin City.</p>

            <p><strong>Hours:</strong><br>
            24hrs
                </p>

            <p><strong>Contact Us:</strong><br>
            Phone: +2348036803312<br>
            Email: goldenkitchen@gmail.com</p>

                  
            
            </div>
            
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Golden Kitchen. All rights reserved.</p>
    </footer>
</body>
</html>