<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>تحفيظ القرآن وتعليم اللغة العربية</title>
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
                            <h4><i class="fas fa-book-open"></i> تسجيل الدخول</h4> <!-- استخدم أيقونة الكتاب -->
                        </div>

                        <div class="card-body">
                            <!-- يمكن تخصيص هذه الفقرة لتحديد نوع المستخدم (مثال: admin, teacher, user) -->
                            <p class="text-center font-weight-bold text-secondary">تسجيل الدخول كـ: admin</p>
                            
                            <form method="POST" action="/* استبدل هذا بمسار تسجيل الدخول المناسب */">
                                @csrf
                                <div class="form-group">
                                    <label for="email">البريد الإلكتروني</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="example@domain.com" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="••••••••" required>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">تذكرني</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-block">تسجيل الدخول</button>
                            </form>
                            
                            <!-- وصلة استعادة كلمة المرور -->
                            <div class="text-center mt-3">
                                <a href="" class="text-muted">نسيت كلمة المرور؟</a>
                            </div>
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
