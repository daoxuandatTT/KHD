<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <title>Login Blog</title>
    <style type="text/css">

        /* sign in FORM */
        #logreg-forms {
            width: 412px;
            margin: 10vh auto;
            background-color: #f3f3f3;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        }

        #logreg-forms form {
            width: 100%;
            max-width: 410px;
            padding: 15px;
            margin: auto;
        }

        #logreg-forms .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        #logreg-forms .form-control:focus {
            z-index: 2;
        }

        #logreg-forms .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        #logreg-forms .form-signin input[type="password"] {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        #logreg-forms .social-login {
            width: 390px;
            margin: 0 auto;
            margin-bottom: 14px;
        }

        #logreg-forms .social-btn {
            font-weight: 100;
            color: white;
            width: 190px;
            font-size: 0.9rem;
        }

        #logreg-forms a {
            display: block;
            padding-top: 10px;
            color: lightseagreen;
        }

        #logreg-form .lines {
            width: 200px;
            border: 1px solid red;
        }


        #logreg-forms button[type="submit"] {
            margin-top: 10px;
        }

        #logreg-forms .facebook-btn {
            background-color: #3C589C;
        }

        #logreg-forms .google-btn {
            background-color: #DF4B3B;
        }

        #logreg-forms .form-reset, #logreg-forms .form-signup {
            display: none;
        }

        #logreg-forms .form-signup .social-btn {
            width: 210px;
        }

        #logreg-forms .form-signup input {
            margin-bottom: 2px;
        }

        .form-signup .social-login {
            width: 210px !important;
            margin: 0 auto;
        }

        /* Mobile */

        @media screen and (max-width: 500px) {
            #logreg-forms {
                width: 300px;
            }

            #logreg-forms .social-login {
                width: 200px;
                margin: 0 auto;
                margin-bottom: 10px;
            }

            #logreg-forms .social-btn {
                font-size: 1.3rem;
                font-weight: 100;
                color: white;
                width: 200px;
                height: 56px;

            }

            #logreg-forms .social-btn:nth-child(1) {
                margin-bottom: 5px;
            }

            #logreg-forms .social-btn span {
                display: none;
            }

            #logreg-forms .facebook-btn:after {
                content: 'Facebook';
            }

            #logreg-forms .google-btn:after {
                content: 'Google+';
            }
            .social-login{
             display: inline-block;
            }

        }
    </style>
</head>
<body>
<div id="logreg-forms">
    <form class="form-signin" method="post" action="{{route('register')}}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng kí </h1>
        <div class="social-login">
            <a  href="{{url('/login/facebook')}}" style="float: left"><button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span></button>
            </a>
            <a  class="social" href="{{url('/login/google')}}" style="float: right"> <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span>            </button>
            </a>
        </div>
        <p style="text-align:center"> OR </p>
        <label>Tên người dùng:</label>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="User name"
               value="{{ old('name') }}" required="">
        @error('name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <br>
        <label>Email đăng kí: </label>
        <input type="email" class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}"
               name="email" placeholder="Email" required="">
        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <br>
        <label>Mật khẩu: </label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="">
        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <br>
        <label>Nhap lai Mật khẩu: </label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"
               required="">
        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Đăng kí</button>
        <hr>

    </form>
</div>
<p style="text-align:center">
    <a href="http://bit.ly/2RjWFMfunction toggleResetPswd(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}

function toggleSignUp(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle(); // display:block or none
    $('#logreg-forms .form-signup').toggle(); // display:block or none
}

$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
    $('#logreg-forms #btn-signup').click(toggleSignUp);
    $('#logreg-forms #cancel_signup').click(toggleSignUp);
})g" target="_blank" style="color:black"></a>
</p>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="/script.js"></script>
<script>
    function toggleResetPswd(e) {
        e.preventDefault();
        $('#logreg-forms .form-signin').toggle() // display:block or none
        $('#logreg-forms .form-reset').toggle() // display:block or none
    }

    function toggleSignUp(e) {
        e.preventDefault();
        $('#logreg-forms .form-signin').toggle(); // display:block or none
        $('#logreg-forms .form-signup').toggle(); // display:block or none
    }

    $(() => {
        // Login Register Form
        $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
        $('#logreg-forms #cancel_reset').click(toggleResetPswd);
        $('#logreg-forms #btn-signup').click(toggleSignUp);
        $('#logreg-forms #cancel_signup').click(toggleSignUp);
    })
</script>
</body>
</html>
