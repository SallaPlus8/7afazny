<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>{{ __('Quran Memorization and Arabic Teaching') }}</title>
    <style>
        /* خصائص لجعل الحاوية تأخذ كل ارتفاع الصفحة */
        html, body {
            height: 100%;
        }
        .full-height {
            height: 100vh; /* ارتفاع الصفحة بالكامل */
        }
        .align-middle {
            display: flex;
            align-items: center; /* محاذاة عمودية في المركز */
            justify-content: center; /* محاذاة أفقية في المركز */
        }
    </style>
</head>
<body>
    <div id="app" class="full-height align-middle">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-success">
                        <div class="card-header text-center bg-success text-white">
                            <h4><i class="fas fa-book-open"></i> {{ __('Login') }}</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('user.login') }}">
                                @csrf
                                <p>{{ __('user') }}</p>

                                <!-- عرض رسائل الخطأ العامة -->
                             

                                <!-- حقل البريد الإلكتروني -->
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus placeholder="{{ __('Enter your email') }}">
                                    <!-- عرض رسالة خطأ لحقل البريد الإلكتروني -->
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- حقل كلمة المرور -->
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('Enter your password') }}">
                                    <!-- عرض رسالة خطأ لحقل كلمة المرور -->
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- خيار تذكرني -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                                    </div>
                                </div>

                                <!-- زر تسجيل الدخول -->
                                <button type="submit" class="btn btn-success btn-block">{{ __('Login') }}</button>
                            </form>

                            <div class="text-center mt-3">
                                <p>{{ __('Don\'t have an account?') }}</p>
                                <a href="{{ route('user.register') }}" class="btn btn-primary btn-block">{{ __('Create a new account') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
