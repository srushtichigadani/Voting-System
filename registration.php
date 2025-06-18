<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-18mE4kWBq781YhF1dvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6JIW3" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://images.deccanherald.com/deccanherald/import/sites/dh/files/articleimages/2023/05/09/representative-image-credit-istock-photo-25-1217006-1683623532.jpg?w=1200&h=675&auto=format%2Ccompress&fit=max&enlarge=true');
            background-size: cover;
            background-position: center;
            color: black;
            display: flex;
            align-items: center;
            justify-content: right;
            height: 100vh;
            margin: 10;
        }

        .bg-info {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            margin-right: 60px;
            color: black; /* Set text color to white */
        }

        .bg-info button {
            background-color: blue !important; 
       color:white;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        h1 {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-info p-3">Voting System</h1>
        <div class="row justify-content-end">
            <div class="col-md-6 bg-info py-4">
                <h2 class="text-center">Register Account</h2>
                <form action="./register.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter your username" required="required" name="username" id="username">
                        <div class="error-message" id="username-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="mobile">Mobile Number:</label>
                        <input type="text" class="form-control" placeholder="Enter your mobile number" required="required" name="mobile" id="mobile">
                        <div class="error-message" id="mobile-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter your password" required="required" name="password" id="password">
                        <div class="error-message" id="password-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" class="form-control" placeholder="Confirm password" required="required" name="cpassword" id="cpassword">
                        <div class="error-message" id="cpassword-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" placeholder="Enter your age" required="required" name="age" id="age">
                        <div class="error-message" id="age-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="voterid">Voter ID:</label>
                        <input type="text" class="form-control" placeholder="Enter your Voter ID" required="required" name="voterid" id="voterid">
                        <div class="error-message" id="voterid-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="aadhar">Aadhar Number:</label>
                        <input type="text" class="form-control" placeholder="Enter your Aadhar Number" required="required" name="aadhar" id="aadhar">
                        <div class="error-message" id="aadhar-error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="photo">Profile Photo (JPG only):</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                        <div class="error-message" id="photo-error"></div>
                    </div>
                    <div class="mb-3">
                       <label for="standard">Standard:</label>
                        <select name="std" class="form-select">
                            <option value="group">Group</option>
                            <option value="voter">Voter</option>
                        </select>
                    </div>
                    
                    <!-- Updated button with btn-primary class for a blue button -->
                    <button type="submit" class="btn btn-primary my-4">Register</button>

                    <p class="text-center">Already have an account? <a href="login.php" class="text-dark"> Login here</a></p>
                </form>
            </div>
        </div>
    </div>
      
    <script>
        function validateForm() {
            // Clear previous error messages
            clearErrorMessages();

            // Check if all required fields are filled
            const requiredFields = document.querySelectorAll('[required]');
            for (const field of requiredFields) {
                if (!field.value.trim()) {
                    displayError(field.id, "Fill all the required details.");
                    return false;
                }
            }

            // Username Validation
            const username = document.getElementById('username').value;
            if (!/^[a-zA-Z]+$/.test(username)) {
                displayError('username', "Username should include only letters");
                return false;
            }

            // Mobile Number Validation
            const mobileNumber = document.getElementById('mobile').value;
            if (!/^\d{10}$/.test(mobileNumber)) {
                displayError('mobile', "Please enter a valid 10-digit mobile number");
                return false;
            }

            // Password Validation
            const password = document.getElementById('password').value;
            if (!/^.{10}$/.test(password)) {
                displayError('password', "Password must be 10 characters long");
                return false;
            }

            // Confirm Password Validation
            const confirmPassword = document.getElementById('cpassword').value;
            if (confirmPassword !== password) {
                displayError('cpassword', "Passwords do not match");
                return false;
            }

            // Age Validation
            const age = document.getElementById('age').value;
            if (!/^\d+$/.test(age) || parseInt(age) < 18) {
                displayError('age', "Please enter a valid age (must be 18 or older)");
                return false;
            }

            // Voter ID Validation
            const voterID = document.getElementById('voterid').value;
            if (!/^[a-zA-Z]{3}\d{7}$/.test(voterID)) {
                displayError('voterid', "Invalid Voter ID. Please enter a valid Voter ID (e.g., ABC1234567).");
                return false;
            }

            // Aadhar Number Validation
            const aadharNumber = document.getElementById('aadhar').value;
            if (!/^\d{12}$/.test(aadharNumber)) {
                displayError('aadhar', "Please enter a valid 12-digit Aadhar Number");
                return false;
            }

            // Photo File Type Validation
            const photoInput = document.getElementById('photo');
            const allowedFileTypes = ['image/jpeg', 'image/jpg'];
            if (photoInput.files.length > 0) {
                const fileType = photoInput.files[0].type;
                if (!allowedFileTypes.includes(fileType)) {
                    displayError('photo', "Invalid file type. Please upload a JPG image.");
                    return false;
                }
            } else {
                displayError('photo', "Please upload a photo.");
                return false;
            }

            return true;
        }

        function displayError(fieldId, message) {
            // Display error as a popup
            alert(message);

            // Optionally, you can also display error message next to the field
            const errorElement = document.getElementById(`${fieldId}-error`);
            if (errorElement) {
                errorElement.innerText = message;
            }
        }

        function clearErrorMessages() {
            document.querySelectorAll('.error-message').forEach(function (element) {
                element.innerText = "";
            });
        }
    </script>
</body>
</html>
