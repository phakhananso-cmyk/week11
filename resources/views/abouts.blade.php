@extends('layout')

@section('title')
เกี่ยวกับเรา
@endsection

@section('content')
    <div class="container">
        <div class="mb-5 text-center text-sm-start">
            <h1 class="fw-extrabold tracking-tight mb-2" style="background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800;">
                เกี่ยวกับเรา555
            </h1>
            <p class="text-muted mb-0">ข้อมูลเกี่ยวกับผู้พัฒนาและจุดประสงค์ของระบบนี้</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card-modern border-0 text-center p-4">
                    <div class="mb-3 position-relative d-inline-block">
                        <div class="rounded-circle border border-4 border-white shadow-sm d-flex align-items-center justify-content-center fw-bold text-white fs-2" style="width: 120px; height: 120px; background: var(--primary-gradient);">P</div>
                        <span class="position-absolute bottom-0 end-0 badge rounded-pill bg-success px-2 py-1" style="font-size: 0.75rem; border: 2px solid white;">Online</span>
                    </div>
                    <h4 class="fw-bold text-dark mb-1">{{ $name }}</h4>
                    <p class="text-muted small mb-3">System Developer / Full-stack Developer</p>
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-1">PHP</span>
                        <span class="badge rounded-pill bg-info-subtle text-info border border-info-subtle px-3 py-1">Laravel</span>
                        <span class="badge rounded-pill bg-secondary-subtle text-secondary border border-secondary-subtle px-3 py-1">Vue.js</span>
                    </div>
                    <hr class="my-3" style="border-color: #f1f5f9;">
                    <div class="text-start">
                        <small class="text-muted d-block mb-1">วันที่อัปเดตระบบล่าสุด:</small>
                        <span class="fw-semibold text-dark">{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card-modern border-0 p-4 p-md-5">
                    <h3 class="fw-bold text-dark mb-3">เป้าหมาย & วิสัยทัศน์</h3>
                    <p class="text-muted mb-4" style="line-height: 1.8;">
                        ระบบนี้ถูกพัฒนาขึ้นด้วย Laravel Framework เพื่อเป็นต้นแบบของระบบจัดการบทความ (Content Management System) และระบบรายชื่อสมาชิก (Member Directory) โดยเน้นความเรียบง่าย ประสิทธิภาพในการประมวลผล และการจัดวางส่วนต่อประสานกับผู้ใช้งาน (User Interface) ให้มีความร่วมสมัย
                    </p>
                    <h5 class="fw-bold text-dark mb-3">เทคโนโลยีหลักที่ใช้พัฒนาระบบ</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3" style="background-color: #f8fafc; border-color: #e2e8f0;">
                                <h6 class="fw-bold mb-1 text-dark">Backend Platform</h6>
                                <p class="text-muted small mb-0">Laravel Framework 11.x, Eloquent ORM, Query Builder</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3" style="background-color: #f8fafc; border-color: #e2e8f0;">
                                <h6 class="fw-bold mb-1 text-dark">Frontend Ecosystem</h6>
                                <p class="text-muted small mb-0">Bootstrap 5.3, Blade Templates Engine, Custom CSS3</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">ติดต่อผู้พัฒนา</h5>
                    <p class="text-muted mb-0">หากต้องการสอบถามเพิ่มเติมหรือแนะนำคำติชมสำหรับระบบ สามารถส่งข้อความติดต่อได้ที่อีเมล <a href="mailto:phakhanan@example.com" class="text-decoration-none fw-bold" style="color: #4f46e5;">phakhanan@example.com</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection