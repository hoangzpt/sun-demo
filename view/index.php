<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    ?>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
<!--            <div class="col-md-8 col-lg-7 col-xl-6">-->
<!--                <img src="draw2.svg" class="img-fluid" alt="Phone image">-->
<!--            </div>-->
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form action="?action=login" method="post">
                    <!-- Email input -->
                    <?php if(isset($_COOKIE['user'])){?>
                        <div class="form-outline mb-4">
                            <input type="text" name ="username" value="<?php echo $_COOKIE['user'];?>" id="form1Example13" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" value="<?php echo $_COOKIE['pass'];?>"  id="form1Example23" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example23">Password</label>
                        </div>
                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="1" checked id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>
                    <?php
                    }else{ ?>
                        <div class="form-outline mb-4">
                            <input type="text" name ="username" id="form1Example13" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password"  id="form1Example23" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example23">Password</label>
                        </div>
                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="1" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>


                    <?php }?>



                    <div class="form-outline mb-4">
                        <span style="color: red;">
                            <?php
                                if(isset($_SESSION['message'])){
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                            ?>
                        </span>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

<!--                    <div class="divider d-flex align-items-center my-4">-->
<!--                        <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>-->
<!--                    </div>-->

                    <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="?action=register"
                       role="button">
                        <i class="fab fa-facebook-f me-2"></i>Register
                    </a>
<!--                    <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!"-->
<!--                       role="button">-->
<!--                        <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>-->

                </form>
            </div>
        </div>
    </div>
</section>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</html>