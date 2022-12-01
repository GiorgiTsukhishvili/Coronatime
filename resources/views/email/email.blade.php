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

        .confirmation {
            margin: 0 auto;
            font-weight: 900;
            font-size: 25px;
            line-height: 30px;
            text-align: center;
            color: #010414
        }

        .button-click {
            margin: 16px auto 0 auto;
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            text-align: center;
            color: #010414;
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

            margin-top: 188px;
            margin-bottom: 56px;
            width: 100%;
            text-align: center
        }

        .email-photo {
            max-width: 600px;
        }

        @media (max-width: 380px) {
            .confirmation {
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
                margin-top: 16px;
                margin-bottom: 40px;
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

    <h1 class="confirmation">{{ __('email.confirmation') }}</h1>

    <h1 class="button-click">{{ __('email.click-button') }}</h1>

    <a href="{{ route('verify-account', ['token' => $token, 'lang' => app()->getLocale()]) }}"
        class="email-button">{{ __('email.verify-email') }}</a>

</body>

</html>
