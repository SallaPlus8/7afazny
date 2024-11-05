<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>تحفيظ القرآن وتعليم اللغة العربية</title>
    <style>
        /* إعدادات لتوسيط الفورم عموديًا وأفقيًا */
        html, body {
            height: 100%;
            margin: 0;
        }
        .full-height {
            display: flex;
            align-items: center; /* محاذاة عمودية في المركز */
            justify-content: center; /* محاذاة أفقية في المركز */
            height: 100vh;
        }
    </style>
</head>
<body>
    <div id="app" class="full-height">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- اختيار نوع المستخدم -->
                    <div class="card border-success mb-4">
                        <div class="card-header text-center bg-success text-white">
                            <h4><i class="fas fa-user-circle"></i> اختر نوع الدخول</h4>
                        </div>
                        <div class="card-body text-center">
                            <form method="POST" action="{{ route('choose-role') }}">
                                @csrf
                                <div class="form-group">
                                    <select id="role" class="form-control" name="role" required>
                                        <option value="" disabled selected>اختر نوع المستخدم</option>
                                        <option value="admin">مدير</option>
                                        <option value="teacher">معلم</option>
                                        <option value="user">مستخدم</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">تأكيد</button>
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
