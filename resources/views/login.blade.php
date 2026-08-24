<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ | Phakhanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Thai', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(16px);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.5);
            max-width: 450px;
            width: 100%;
            padding: 2.5rem;
            transition: all 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-color: rgba(99, 102, 241, 0.25);
        }

        .form-control {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f8fafc;
            border-radius: 12px;
            padding: 0.8rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(15, 23, 42, 0.8);
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.25);
            color: #ffffff;
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            border: none;
            color: #ffffff;
            border-radius: 12px;
            padding: 0.8rem;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.35);
        }

        .btn-primary-modern:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
            opacity: 0.95;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-4">
        <h2 class="fw-extrabold mb-1" style="background: linear-gradient(135deg, #818cf8 0%, #c084fc 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800; letter-spacing: 0.5px;">
            เข้าสู่ระบบ
        </h2>
        <p class="text-muted small">ยินดีต้อนรับกลับมา! กรุณากรอกข้อมูลของคุณ</p>
    </div>
    
    @if(request()->has('error'))
        <div class="alert alert-danger text-center border-0 py-2 px-3 mb-4" role="alert" style="border-radius: 10px; background-color: rgba(239, 68, 68, 0.15); color: #f87171;">
            {{ request()->query('error') }}
        </div>
    @endif

    <form action="{{ url('/login-process') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="username" class="form-label text-slate-300" style="color: #cbd5e1; font-weight: 500; font-size: 0.9rem;">ชื่อผู้ใช้ หรือ อีเมล</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username@example.com" required autocomplete="username">
        </div>

        <div class="mb-4">
            <label for="password" class="form-label text-slate-300" style="color: #cbd5e1; font-weight: 500; font-size: 0.9rem;">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required autocomplete="current-password">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" style="background-color: rgba(15, 23, 42, 0.6); border-color: rgba(255, 255, 255, 0.2);">
                <label class="form-check-label small" for="remember" style="color: #94a3b8;">จดจำฉันไว้</label>
            </div>
            <a href="#" class="text-decoration-none small" style="color: #818cf8; font-weight: 500;">ลืมรหัสผ่าน?</a>
        </div>

        <div class="d-grid">
            <button type="submit" name="login_btn" class="btn-primary-modern">เข้าสู่ระบบ</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <p class="mb-0 small" style="color: #94a3b8;">ยังไม่มีบัญชีผู้ใช้? <a href="#" class="text-decoration-none" style="color: #818cf8; font-weight: 600;">สมัครสมาชิก</a></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>