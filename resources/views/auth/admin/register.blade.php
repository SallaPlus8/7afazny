<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>تحفيظ القرآن وتعليم اللغة العربية</title>
    <style>
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
                    <div class="card border-success mb-4">
                        <div class="card-header text-center bg-success text-white">
                            <h4><i class="fas fa-user-circle"></i> اختر نوع الدخول</h4>
                        </div>
                        <div class="card-body text-center">
                            <form id="roleForm" method="POST" action="">
                                @csrf
                                <div class="form-group">
                                    <select id="role" class="form-control" name="role" required onchange="showLoginForm(this.value)">
                                        <option value="" disabled selected>اختر نوع المستخدم</option>
                                        <option value="admin">مدير</option>
                                        <option value="teacher">معلم</option>
                                        <option value="user">مستخدم</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="loginForms" style="display: none;">
                        <!-- نموذج تسجيل الدخول -->
                        <div class="card border-success mb-4">
                            <div class="card-header text-center bg-success text-white">
                                <h4><i class="fas fa-book-open"></i> تسجيل الدخول</h4>
                            </div>
                            <div class="card-body">
                                <form id="loginForm" method="POST" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">البريد الإلكتروني</label>
                                        <input id="email" type="email" class="form-control" name="email" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">كلمة المرور</label>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                            <label class="form-check-label" for="remember">تذكرني</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">تسجيل الدخول</button>
                                </form>
                                <div class="text-center mt-3">
                                    {{-- <a href="{{ route('password.request') }}">نسيت كلمة المرور؟</a> --}}
                                </div>
                            </div>
                        </div>

                        <!-- نموذج التسجيل -->
                        <div class="card border-primary">
                            <div class="card-header text-center bg-primary text-white">
                                <h4><i class="fas fa-user-plus"></i> تسجيل مستخدم جديد</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">الاسم</label>
                                        <input id="name" type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">البريد الإلكتروني</label>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">رقم الهاتف</label>
                                        <input id="phone" type="text" class="form-control" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">الجنس</label>
                                        <select id="gender" class="form-control" name="gender" required>
                                            <option value="male">ذكر</option>
                                            <option value="female">أنثى</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">كلمة المرور</label>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">تسجيل</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showLoginForm(role) {
            const loginForms = document.getElementById('loginForms');
            loginForms.style.display = 'block';

            // يمكنك هنا تغيير action للنموذج وفقًا للدور المحدد
            const loginForm = document.getElementById('loginForm');
            loginForm.action = `/${role}/login`; // تعديل مسار نموذج تسجيل الدخول

            const registerForm = loginForms.querySelector('form:last-of-type');
            registerForm.action = `/${role}/register`; // تعديل مسار نموذج التسجيل
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
