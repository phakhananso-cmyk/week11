<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มรายชื่อใหม่ | Phakhanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            --secondary-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --dark-gradient: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            --body-bg: #f8fafc;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Thai', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-dark);
            min-height: 100vh;
        }

        .main-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card-modern {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .card-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .form-control, .form-select {
            border-radius: 12px;
            padding: 0.8rem 1rem;
            border-color: var(--border-color);
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
            border-color: #6366f1;
        }

        .btn-modern-primary {
            background: var(--primary-gradient);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.35);
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-modern-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
            color: #ffffff;
            opacity: 0.95;
        }

        .btn-modern-secondary {
            background: #ffffff;
            color: var(--text-dark);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-modern-secondary:hover {
            background: #f1f5f9;
            color: var(--text-dark);
            border-color: #cbd5e1;
        }
    </style>
</head>
<body>

<div class="container main-container" style="max-width: 650px;">
    
    <div class="alert border-0 shadow-sm mb-4 d-flex align-items-center" role="alert" style="border-radius: 16px; background-color: #fffbeb; border: 1px solid #fef3c7 !important; color: #b45309;">
        <div class="d-flex align-items-center gap-2">
            <span class="fs-4">⚠️</span>
            <div>
                <strong>หมายเหตุ:</strong> หน้านี้อยู่ระหว่างการพัฒนา (ระบบฟอร์มจำลอง ยังไม่มีการบันทึกข้อมูลลงฐานข้อมูลจริง)
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-5">
        <div>
            <h1 class="fw-extrabold tracking-tight mb-1" style="background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800; font-size: 2rem;">
                เพิ่มสมาชิกใหม่
            </h1>
            <p class="text-muted mb-0">กรอกข้อมูลผู้ใช้งานจำลองในหน้านี้</p>
        </div>
        <a href="{{ route('home') }}" class="btn-modern-secondary d-inline-flex align-items-center gap-2">
            <span>⬅️</span> กลับหน้าหลัก
        </a>
    </div>

    <div class="card-modern p-4 p-md-5 border-0">
        <form action="#" method="GET" onsubmit="alert('จำลองการส่งข้อมูลสำเร็จ (ยังไม่ลง Database)'); return false;">
            
            <div class="mb-4">
                <label class="form-label fw-semibold text-dark mb-2">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" placeholder="เช่น สมชาย ใจดี" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold text-dark mb-2">อีเมล</label>
                <input type="email" class="form-control" placeholder="เช่น somchai@example.com" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold text-dark mb-2">เบอร์โทรศัพท์</label>
                <input type="tel" class="form-control" placeholder="เช่น 081-234-5678" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold text-dark mb-2">สถานะการใช้งาน</label>
                <select class="form-select">
                    <option value="active">🟢 ใช้งานอยู่ (Active)</option>
                    <option value="inactive">🔴 ระงับการใช้งาน (Inactive)</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold text-dark mb-2">อัปโหลดรูปโปรไฟล์</label>
                <input type="file" class="form-control" accept="image/*">
            </div>

            <hr class="my-5" style="border-color: #e2e8f0;">

            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('home') }}" class="btn-modern-secondary">ยกเลิก</a>
                <button type="submit" class="btn-modern-primary">💾 บันทึกข้อมูล (จำลอง)</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>