<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require_once("./public/css.php") ?>
    <style>
        .header {
            background: #212529;
        }
        .password-ipt {
            position: relative;
        }

        .password-img img {
            height: 20px;
            position: absolute;
            top: 33px !important;
            right: 10px !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <header class="header shadow-sm">
                <div class="d-flex justify-content-between align-items-center navbar navbar-expand-lg navbar-dark bg-dark">
                    <a href="shopping-list.php" class="navbar-brand">
                        <h3 class="px-5">
                            <i class="fas fa-shopping-basket"></i> Shopping Cart
                        </h3>
                    </a>
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="cart.php" class="nav-item active text-decoration-none text-white">
                                <h5 class="px-5 cart">
                                    <i class="fas fa-shopping-cart"></i>Cart
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']);
                                        echo "<span id='cart_count' class='text-warning'>$count</span>";
                                    } else {
                                        echo "<span id='cart_count' class='text-warning'>0</span>";
                                    }
                                    ?>
                                </h5>
                            </a>
                        </div>
                        <ul class="d-flex list-unstyled home-main">
                            <li><a class="logoutButton" href="./log-in.php">??????</a></li>
                            <li><a class="logoutButton" href="./sign-up-member.php">??????</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="row d-flex">
                <div class="sign-up-content col-lg-4 shadow-sm p-5">
                    <form id="form" action="./method/doSignup-member.php" method="post">
                        <h1 class="text-center">????????????</h1>
                        <div class="mb-3">
                            <label for="name">??????*</label>
                            <input id="name" type="text" name="member_name" class="form-control" required placeholder="???????????????">
                            <div id="nameError" class="text-danger mb-2"></div>
                        </div>
                        <div class="mb-3">
                            <label for="gender">??????*</label>
                            <div class="form-check form-check-inline ms-2">
                                <input class="form-check-input" type="radio" name="member_gender" id="gender" value="???">
                                <label class="form-check-label" for="gender">??????</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="member_gender" id="gender" value="???">
                                <label class="form-check-label" for="gender">??????</label>
                            </div>
                            <div id="genderError" class="text-danger mb-2"></div>
                        </div>
                        <div class="mb-3">
                            <label for="account">??????*</label>
                            <input id="account" type="text" name="member_account" class="form-control" placeholder="????????? 3~12 ??????????????????">
                            <div id="accountError" class="text-danger mb-2"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email">email*</label>
                            <input id="email" type="text" name="member_email" class="form-control" required placeholder="???????????????">
                            <div id="emailError" class="text-danger mb-2"></div>
                        </div>
                        <div class="mb-3 password-ipt">
                            <label for="password">??????*</label>
                            <input id="password" type="password" name="member_password" class="form-control" required placeholder="???????????????"><label class="password-img"><img src="./images/eyes-close.png" alt="JS???????????????????????????????????????????????????????????????" id="eyes"></label>
                            <div id="passwordError" class="text-danger"></div>
                        </div>
                        <div class="mb-3 password-ipt">
                            <label for="repassword">????????????*</label>
                            <input id="repassword" type="password" name="repassword" class="form-control" required placeholder="?????????????????????"><label class="password-img"><img src="./images/eyes-close.png" alt="JS???????????????????????????????????????????????????????????????" id="eye"></label>
                            <div id="repasswordError" class="text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="phone">??????*</label>
                            <input id="phone" type="text" name="member_phone" class="form-control" required placeholder="?????????????????????">
                            <div id="phoneError" class="text-danger"></div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" id="submitBtn" type="submit">??????
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let form = document.querySelector("#form"),
            submitBtn = document.querySelector("#submitBtn"),
            name = document.querySelector("#name"),
            account = document.querySelector("#account"),
            password = document.querySelector("#password"),
            repassword = document.querySelector("#repassword"),
            email = document.querySelector("#email"),
            phone = document.querySelector("#phone"),
            nameError = document.querySelector("#nameError"),
            accountError = document.querySelector("#accountError"),
            emailError = document.querySelector("#emailError"),
            passwordError = document.querySelector("#passwordError"),
            repasswordError = document.querySelector("#repasswordError"),
            phoneError = document.querySelector("#phoneError");
        const regEmail = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;


        submitBtn.addEventListener("click", function(e) {
            e.preventDefault();
            let accountExist = true;
            nameError.innerText = accountError.innerText = emailError.innerText = passwordError.innerText = repasswordError.innerText = phoneError.innerText = " ";
            if (name.value === "") {
                nameError.innerText = "??????????????????";
            }
            if (account.value === "") {
                accountError.innerText = "??????????????????";
            }
            if (account.value.length < 3 || account.value.length > 12) {
                accountError.innerText = "??????????????????";
            }
            if (email.value === "") {
                emailError.innerText = "??????????????????";
            }
            if (!regEmail.test(email.value)) {
                emailError.innerText = "????????????";
            }
            if (password.value === "") {
                passwordError.innerText = "??????????????????";
            }
            if (repassword.value === "") {
                repasswordError.innerText = "??????????????????";
            }
            if (phone.value === "") {
                phoneError.innerText = "??????????????????";
            }


            if (accountExist && nameError.innerText === "" && accountError.innerText === "" && emailError.innerText === "" && passwordError.innerText === "" && repasswordError.innerText === "" && phoneError.innerText === "") {

                form.submit();

                if (name.value !== "" && account.value !== "" && email.value !== "" && password.value !== "" && repassword.value !== "" && phone.value !== "" && form.submit) {
                    function signup() {
                        var msg = "?????????????????????";
                        if (alert(msg) == true) {
                            window.location.replace("./log-in.php");
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
                signup();
            }

        })

        var input = document.querySelector('#password')
        var imgs = document.getElementById('eyes');
        var flag = 0;
        imgs.onclick = function() {
            if (flag == 0) {
                input.type = 'password';
                eyes.src = './images/eyes-close.png';
                flag = 1;
            } else {
                input.type = 'text';
                eyes.src = './images/eyes-open.png';
                flag = 0;
            }
        }

        var watch = document.querySelector('#repassword')
        var img = document.getElementById('eye');
        var flag = 0;
        img.onclick = function() {
            if (flag == 0) {
                watch.type = 'password';
                eye.src = './images/eyes-close.png';
                flag = 1;
            } else {
                watch.type = 'text';
                eye.src = './images/eyes-open.png';
                flag = 0;
            }
        }
    </script>
</body>

</html>