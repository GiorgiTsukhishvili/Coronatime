<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <style>
        u+#body a {
            color: white;
            text-decoration: none;
        }

        #body {
            background-color: white !important
        }

        .recover {
            margin: 0 auto;
            font-weight: 900;
            font-size: 25px;
            line-height: 30px;
            text-align: center;
            color: #010414 !important
        }

        .button-click {
            margin: 16px auto 0 auto;
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            text-align: center;
            color: #010414 !important;
        }


        .email-button {
            background: #0FBA68;
            border-radius: 8px;
            font-weight: 900;
            font-size: 16px;
            line-height: 19px;
            text-align: center;
            color: white;
            padding: 19px 0;
            margin: 40px auto 0 auto;
            display: block;
            text-decoration: none;
            width: 392px;
            box-sizing: border-box
        }

        .email-photo-div {
            margin: 188px 0 56px 0;
            width: 100%;
            text-align: center
        }

        .email-photo {
            max-width: 600px;
        }

        @media (max-width: 380px) {
            .recover {
                font-size: 20px;
                line-height: 24px;
            }

            .button-click {
                font-size: 16px;
                line-height: 19px;
                margin-top: 8px
            }

            .email-button {
                width: auto;
                margin: 40px 16px;
                padding: 15px 0;
                font-size: 14px;
                line-height: 17px;
            }

            .email-photo-div {
                margin: 16px 0 40px 0;
                width: 100%;
                text-align: center
            }

            .email-photo {
                max-width: 343px;
            }
        }
    </style>

</head>

<body id="body">

    <div class="email-photo-div">
        <img src="{{ $message->embed('imgs/email-photo.png') }}" alt="email" class="email-photo">

    </div>
    <h1 class="recover">{{ __('reset.recover-password') }}</h1>

    <h1 class="button-click">{{ __('reset.click-button') }}</h1>

    <a href="{{ route('new-password', ['token' => $token, 'lang' => app()->getLocale()]) }}"
        class="email-button">{{ __('reset.reset') }}</a>

</body>

</html>
