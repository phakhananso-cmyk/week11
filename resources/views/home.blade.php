<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูล - รายชื่อสมาชิก | Phakhanan</title>

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

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Navbar Styling */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
        }

        .navbar-custom .navbar-brand {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #818cf8 0%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Card & Page Styling Elements */
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

        .search-box {
            border-radius: 10px;
            border-color: var(--border-color);
            padding: 0.6rem 1rem;
            max-width: 300px;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .search-box:focus {
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
            border-color: #6366f1;
        }

        /* Custom buttons styling */
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
            display: inline-flex;
            align-items: center;
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
        }

        .btn-modern-secondary:hover {
            background: #f1f5f9;
            color: var(--text-dark);
            border-color: #cbd5e1;
        }

        /* Table Styling */
        .table-responsive {
            border-radius: 16px;
        }

        .table thead {
            background: #0f172a;
        }

        .table thead th {
            color: #ffffff;
            padding: 1.2rem 1rem;
            font-weight: 600;
            border: none;
        }

        .table tbody td {
            padding: 1.2rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background-color: #fafafa;
        }

        .table img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .table tr:hover img {
            transform: scale(1.05);
        }

        .number-circle {
            width: 32px;
            height: 32px;
            background: rgba(99, 102, 241, 0.1);
            color: #4f46e5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <span class="navbar-text text-white me-4" style="font-weight: 500;">
                    👋 สวัสดี, <span style="color: #818cf8; font-weight: 700;">{{ session('user_logged_in') }}</span>
                </span>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm px-3" style="border-radius: 8px;">
                    ออกจากระบบ
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-5">
            <div>
                <h1 class="fw-extrabold tracking-tight mb-1" style="background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800;">
                    ตารางรายชื่อสมาชิก
                </h1>
                <p class="text-muted mb-0">ระบบจำลองการจัดการข้อมูลผู้ใช้งานและวิเคราะห์สถานะสมาชิก</p>
            </div>
            <a href="{{ route('add') }}" class="btn-modern-primary">
                ➕ เพิ่มรายชื่อใหม่
            </a>
        </div>

        <div class="card-modern border-0 overflow-hidden">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 p-4 border-bottom" style="border-color: #f1f5f9;">
                <h5 class="mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                    <span>👥</span> รายชื่อสมาชิกทั้งหมด
                </h5>
                <input type="text" class="form-control search-box" placeholder="🔍 ค้นหาสมาชิก...">
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 8%;">ลำดับ</th>
                            <th style="width: 10%;">รูปโปรไฟล์</th>
                            <th style="width: 25%;">ชื่อ-นามสกุล</th>
                            <th style="width: 25%;">อีเมล</th>
                            <th style="width: 15%;">เบอร์โทรศัพท์</th>
                            <th style="width: 12%;">สถานะ</th>
                            <th class="text-center" style="width: 10%;">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><div class="number-circle">1</div></td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100" alt="Somchai">
                            </td>
                            <td class="fw-semibold text-dark">สมชาย ใจดี</td>
                            <td class="text-muted">somchai@example.com</td>
                            <td class="text-muted">081-234-5678</td>
                            <td>
                                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2">
                                    🟢 ใช้งานอยู่
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-sm btn-outline-warning" style="border-radius: 8px;">✏️ แก้ไข</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" onclick="return confirm('ยืนยันที่จะลบรายชื่อนี้หรือไม่?')">🗑 ลบ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="number-circle">2</div></td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100" alt="Somying">
                            </td>
                            <td class="fw-semibold text-dark">สมหญิง รักเรียน</td>
                            <td class="text-muted">somying@example.com</td>
                            <td class="text-muted">089-876-5432</td>
                            <td>
                                <span class="badge rounded-pill bg-danger-subtle text-danger border border-danger-subtle px-3 py-2">
                                    🔴 ระงับการใช้งาน
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-sm btn-outline-warning" style="border-radius: 8px;">✏️ แก้ไข</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" onclick="return confirm('ยืนยันที่จะลบรายชื่อนี้หรือไม่?')">🗑 ลบ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="number-circle">3</div></td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100" alt="Napa">
                            </td>
                            <td class="fw-semibold text-dark">นภา สงบใจ</td>
                            <td class="text-muted">napa@example.com</td>
                            <td class="text-muted">082-999-1122</td>
                            <td>
                                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2">
                                    🟢 ใช้งานอยู่
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-sm btn-outline-warning" style="border-radius: 8px;">✏️ แก้ไข</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" onclick="return confirm('ยืนยันที่จะลบรายชื่อนี้หรือไม่?')">🗑 ลบ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="number-circle">4</div></td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100" alt="Wichai">
                            </td>
                            <td class="fw-semibold text-dark">วิชัย กล้าหาญ</td>
                            <td class="text-muted">wichai@example.com</td>
                            <td class="text-muted">085-444-5566</td>
                            <td>
                                <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-3 py-2">
                                    ⏳ รอการตรวจสอบ
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-sm btn-outline-warning" style="border-radius: 8px;">✏️ แก้ไข</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" onclick="return confirm('ยืนยันที่จะลบรายชื่อนี้หรือไม่?')">🗑 ลบ</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="number-circle">5</div></td>
                            <td>
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100" alt="Onanong">
                            </td>
                            <td class="fw-semibold text-dark">อรอนงค์ งดงาม</td>
                            <td class="text-muted">onanong@example.com</td>
                            <td class="text-muted">087-111-2233</td>
                            <td>
                                <span class="badge rounded-pill bg-danger-subtle text-danger border border-danger-subtle px-3 py-2">
                                    🔴 ระงับการใช้งาน
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-sm btn-outline-warning" style="border-radius: 8px;">✏️ แก้ไข</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" onclick="return confirm('ยืนยันที่จะลบรายชื่อนี้หรือไม่?')">🗑 ลบ</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
