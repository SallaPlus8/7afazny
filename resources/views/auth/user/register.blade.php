<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>{{ __('user_registration') }}</title>
    <style>
        /* خصائص لجعل الحاوية تأخذ كل ارتفاع الصفحة */
        html, body {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .full-height {
            height: 100vh; /* ارتفاع الصفحة بالكامل */
            display: flex;
            align-items: center; /* محاذاة عمودية في المركز */
            justify-content: center; /* محاذاة أفقية في المركز */
        }
    </style>
</head>
<body>
    <div id="app" class="full-height">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- نموذج تسجيل مستخدم جديد -->
                    <div class="card border-primary shadow-sm">
                        <div class="card-header text-center bg-primary text-white">
                            <h4><i class="fas fa-user-plus"></i> {{ __('user_registration') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.register') }}">
                                @csrf
                                <!-- حقل الاسم -->
                                <div class="form-group">
                                    <label for="name">{{ __('name') }}</label>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="{{ __('enter_full_name') }}" required>
                                </div>
                                
                                <!-- حقل البريد الإلكتروني -->
                                <div class="form-group">
                                    <label for="email">{{ __('email') }}</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="{{ __('enter_email') }}" required>
                                </div>
                                
                                <!-- حقل رقم الهاتف -->
                                <div class="form-group">
                                    <label for="phone">{{ __('phone') }}</label>
                                    <input id="phone" type="text" class="form-control" name="phone" placeholder="{{ __('enter_phone_number') }}" required>
                                </div>
                                
                                <!-- حقل الجنس -->
                                <div class="form-group">
                                    <label for="gender">{{ __('gender') }}</label>
                                    <select id="gender" class="form-control" name="gender" required>
                                        <option value="" disabled selected>{{ __('select_gender') }}</option>
                                        <option value="male">{{ __('male') }}</option>
                                        <option value="female">{{ __('female') }}</option>
                                    </select>
                                </div>
                                
                                <!-- حقل كلمة المرور -->
                                <div class="form-group">
                                    <label for="password">{{ __('password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ __('enter_password') }}" required>
                                </div>
                                
                                <!-- حقل تأكيد كلمة المرور -->
                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('confirm_password') }}</label>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('reenter_password') }}" required>
                                </div>
                                
                                <!-- زر التسجيل -->
                                <button type="submit" class="btn btn-primary btn-block">{{ __('register') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- مكتبات JavaScript الخاصة بـ Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
