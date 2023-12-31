<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Sign Up</title>
</head>
<body class="bg-gray-200">
    <div class="w-full h-screen flex justify-center items-center my-5">
        <div class="px-9 lg:w-[40%] dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto p-4">
                <div class="bg-white dark:bg-gray-700 shadow-lg shadow-gray-300 rounded-lg p-6">
                    <span class="flex justify-center font-bold text-2xl mb-4">Sign Up</span>
                    <form name="sign-up" action="Controller/signupController.php" method="post"
                    onsubmit="return signupValidation()">
                        <div class="mb-4">
                            <label for="nama" class="mb-1 ml-1">Full Name</label>
                            <input type="text" id="nama" placeholder="Haikal Mufid" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="username" class="mb-1 ml-1">Username</label>
                            <input type="text" id="username" placeholder="Username" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="mb-1 ml-1">Email</label>
                            <input type="email" id="email" placeholder="Email Address" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="mb-1 ml-1">Password</label>
                            <input type="password" id="password" placeholder="************" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="confirm-password" class="mb-1 ml-1">Confirm Password</label>
                            <input type="password" id="confirm-password" placeholder="************" class="border border-gray-300 p-2 rounded w-full" required>
                        </div>
                        <div id="error-msg" class="text-red-500 mb-4" style="display: none;"></div>
                        <div class="flex flex-row justify-between items-center">
                            <button type="submit" id="button_register" class="min-w-[30%] px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                Register
                            </button>
                            <a href="login.php" class="text-gray-500 text-sm">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
function signupValidation() {
    $("#username").removeClass("error-field");
    $("#email").removeClass("error-field");
    $("#password").removeClass("error-field");
    $("#confirm-password").removeClass("error-field");
    $("#error-msg").html("").hide();

    var valid = true;
    var UserName = $("#username").val();
    var email = $("#email").val();
    var Password = $('#password').val();
    var ConfirmPassword = $('#confirm-password').val();
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    if (UserName.trim() == "") {
        $("#error-msg").html("Username is required.").show();
        $("#username").addClass("error-field");
        valid = false;
    }
    if (email.trim() == "") {
        $("#error-msg").html("Email is required.").show();
        $("#email").addClass("error-field");
        valid = false;
    } else if (!emailRegex.test(email)) {
        $("#error-msg").html("Invalid email address.").show();
        $("#email").addClass("error-field");
        valid = false;
    }
    if (Password.trim() == "") {
        $("#error-msg").html("Password is required.").show();
        $("#password").addClass("error-field");
        valid = false;
    }
    if (ConfirmPassword.trim() == "") {
        $("#error-msg").html("Confirm Password is required.").show();
        $("#confirm-password").addClass("error-field");
        valid = false;
    }
    if (Password != ConfirmPassword) {
        $("#error-msg").html("Passwords do not match.").show();
        valid = false;
    }

    if (valid) {
        $.ajax({
            type: "POST",
            url: "Controller/signupController.php",
            data: {
                nama: $("#nama").val(),
                username: UserName,
                email: email,
                password: Password,
                confirm_password: ConfirmPassword
            },
            success: function(response) {
                if (response === "success") {
                    alert("Registration successful!");
                    window.location.href = "login.php";
                } else {
                    $("#error-msg").html(response).show();
                }
            }
        });
    }

    return false;
}
</script>
</body>
</html>
