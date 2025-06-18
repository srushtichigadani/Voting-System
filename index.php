<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Voting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-18mE4kWBq781YhF1dvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6JIW3" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://www.nbc.com/generetic/images/nbc-background.png');
            background-size: cover;
            background-position: center;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .bg-info {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: left;
       
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .voting-system {
            color: white;
            font-size: 80px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        /* Style for the blue login button */
        .btn-login {
            background-color: #007BFF; /* Blue color */
            color: white; /* White text */
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container">
        <h1 class="text-info text-center p-3 voting-system">Voting System</h1>
        <div class="bg-info">
            <h2 class="text-center">Login</h2>
            <form action="./login.php" method="POST">
                <div class="mb-3">
                    <label for="voterid" class="form-label fw-bold">Voter ID:</label>
                    <input type="text" class="form-control w-50" name="voterid" placeholder="Enter your Voter ID" required="required">
                </div>
                <div class="mb-3">
                    <label for="aadharnumber" class="form-label fw-bold">Aadhar Number:</label>
                    <input type="text" class="form-control w-50" name="aadharnumber" placeholder="Enter your Aadhar Number" required="required">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password:</label>
                    <input type="password" class="form-control w-50" name="password" placeholder="Enter your password" required="required" maxlength="18" minlength="10">
                </div>
                <div class="mb-3">
                    <label for="std" class="form-label fw-bold">Standard:</label>
                    <select name="std" class="form-select w-50">
                        <option value="voter">Voter</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark my-4 btn-login">Login</button> <!-- Apply the btn-login class -->
                <p>Don't have an account? <a href="registration.php" class="text-white">Register here</a></p>
            </form>
        </div>
    </div>
</body>
</html>
