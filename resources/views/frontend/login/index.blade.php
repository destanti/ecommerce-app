<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/login.css">
    <title>Sign in</title>
</head>

<body>
    <ul class="nav">
        <li onclick="showLogin()">Login</li>
        <li onclick="showSignup()">Sign up</li>
        {{-- <li onclick="showForgotPassword()">Forgot password</li>
        <li onclick="showSubscribe()">Subscribe</li>
        <li onclick="showContactUs()">Contact us</li> --}}
    </ul>
    <div class="wrapper">
        <div class="rec-prism">
            <div class="face face-top">
                <div class="content">
                    <h2>Subscribe</h2>
                    <small>Enter your email so we can send you the latest updates!</small>
                    <form onsubmit="event.preventDefault()">
                        <div class="field-wrapper">
                            <input type="text" name="email" placeholder="email">
                            <label>e-mail</label>
                        </div>
                        <div class="field-wrapper">
                            <input type="submit" onclick="showThankYou()">
                        </div>
                    </form>
                </div>
            </div>
            <div class="face face-front">
                <div class="content">
                    <h2>Sign in</h2>
                    <form method="POST" action="/login/authenticate">
                        @csrf
                        <div class="field-wrapper">
                            <input type="text" name="email" placeholder="email">
                            <label>email</label>
                        </div>
                        <div class="field-wrapper">
                            <input type="password" name="password" placeholder="password" autocomplete="new-password">
                            <label>password</label>
                        </div>
                        <div class="field-wrapper">
                            <input type="submit">
                        </div>
                        <span class="psw" onclick="showForgotPassword()">Forgot Password? </span>
                        <span class="signup" onclick="showSignup()">Not a user? Sign up</span>
                    </form>
                </div>
            </div>
            {{-- <div class="face face-back">
                <div class="content">
                    <h2>Forgot your password?</h2>
                    <small>Enter your email so we can send you a reset link for your password</small>
                    <form onsubmit="event.preventDefault()">
                        <div class="field-wrapper">
                            <input type="text" name="email" placeholder="email">
                            <label>e-mail</label>
                        </div>
                        <div class="field-wrapper">
                            <input type="submit" onclick="showThankYou()">
                        </div>
                    </form>
                </div>
            </div> --}}
            <div class="face face-right">
                <div class="content">
                    <h2>Sign up</h2>
                    <form method="POST" action="/register">
                        @csrf
                        <div class="field-wrapper">
                            <input type="text" name="name" placeholder="name" autocomplete="name">
                            <label>Name</label>
                        </div>
                        <div class="field-wrapper">
                            <input type="text" name="email" placeholder="email">
                            <label>e-mail</label>
                        </div>
                        <div class="field-wrapper">
                            <input type="password" name="password" placeholder="password" autocomplete="new-password">
                            <label>password</label>
                        </div>

                        <div class="field-wrapper">
                            <input type="submit">
                        </div>
                        <span class="singin" onclick="showLogin()">Already a user? Sign in</span>
                    </form>
                </div>
            </div>
            {{-- <div class="face face-left">
                <div class="content">
                    <h2>Contact us</h2>
                    <form onsubmit="event.preventDefault()">
                        <div class="field-wrapper">
                            <input type="text" name="name" placeholder="name">
                            <label>Name</label>
                        </div>
                        <div class="field-wrapper">
                            <input type="text" name="email" placeholder="email">
                            <label>e-mail</label>
                        </div>
                        <div class="field-wrapper">
                            <textarea placeholder="your message"></textarea>
                            <label>your message</label>
                        </div>
                        <div class="field-wrapper">
                            <input type="submit" onclick="showThankYou()">
                        </div>
                    </form>
                </div>
            </div> --}}
            <div class="face face-bottom">
                <div class="content">
                    <div class="thank-you-msg">
                        Thank you!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend') }}/js/login.js"></script>
</body>

</html>
