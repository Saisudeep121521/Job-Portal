<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="assets/css/stylecd4e.css?version=4.1" rel="stylesheet" />
    <title>Login</title>
</head>

<body>
    <main class="main">
        <section class="login-register">
            <div class="container" style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
          ">
                <div class="row login-register-cover"
                    style="display: flex; justify-content: center; align-items: center">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="text-center">
                            <p class="font-sm text-brand-2">Welcome back!</p>
                            <h2 class="mt-10 mb-5 text-brand-1">Member Registration</h2>

                        </div>
                        <form class="login-register text-start mt-20" action="signupProcess.php" method="POST">

                            <div class="form-group">
                                <label class="form-label" for="input-1">Full Name*</label>
                                <input class="form-control" id="input-1" type="text" required="" name="fullname"
                                    placeholder="" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-1">Email*</label>
                                <input class="form-control" id="input-1" type="email" required="" name="email"
                                    placeholder="" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-1">Phone Number*</label>
                                <input class="form-control" id="input-1" type="text" required="" name="phonenumber"
                                    placeholder="" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="input-1">Username*</label>
                                <input class="form-control" id="input-1" type="text" required="" name="username"
                                    placeholder="" />
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="input-4">Password *</label>
                                <input class="form-control" id="input-4" type="password" required="" name="password"
                                    placeholder="" />
                            </div>
                            <div class="login_footer form-group d-flex justify-content-between">
                                <label class="cb-container">
                                    <input type="checkbox" /><span class="text-small">Remenber me</span><span
                                        class="checkmark"></span>
                                </label><a class="text-muted" href="page-contact.html">Forgot Password</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-brand-1 hover-up w-100  btn-primary" type="submit" name="login">
                                    Register
                                </button>
                            </div>
                            <div class="text-muted text-center">
                                Already have an Account? <a href="index.php">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        setTimeout(function () {
            document.getElementById("body").style.display = "none";
        }, 5000);
    </script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="./glow.js"></script>
</body>

</html>