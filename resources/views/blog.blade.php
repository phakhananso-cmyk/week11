@extends('layout')

@section('title')
    บทความ
@endsection

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert"
                style="border-radius: 12px; background-color: #ecfdf5; color: #065f46;">
                <span class="me-2">🎉</span> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-alert="close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-5">
            <div>
                <h1 class="fw-extrabold tracking-tight mb-1"
                    style="background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800;">
                    รายการบทความทั้งหมด
                </h1>
                <p class="text-muted mb-0">จัดการ แก้ไข และดูข้อมูลบทความในระบบทั้งหมด</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('blog.create') }}" class="btn-modern-primary text-decoration-none">
                    ✨ เขียนบทความใหม่
                </a>
                <span class="badge fs-6 py-2 px-3"
                    style="background: var(--pink-100); color: var(--plum-900); border-radius: 30px; font-weight: 600;">
                    ทั้งหมด {{ $blogs->total() }} รายการ
                </span>
            </div>
        </div>

        @if (count($blogs) > 0)
            <div class="card-modern overflow-hidden border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0"
                            style="border-collapse: separate; border-spacing: 0;">
                            <thead style="background: var(--dark-gradient);">
                                <tr>
                                    <th class="text-white py-3 px-4" style="width: 8%; font-weight: 600;">#</th>
                                    <th class="text-white py-3" style="width: 25%; font-weight: 600;">หัวข้อ (Title)</th>
                                    <th class="text-white py-3" style="width: 40%; font-weight: 600;">เนื้อหา (Content)</th>
                                    <th class="text-white py-3" style="width: 15%; font-weight: 600;">สถานะ (Status)</th>
                                    <th class="text-white py-3" style="width: 12%; font-weight: 600;">วันที่สร้าง</th>
                                    <th class="text-white py-3 px-4 text-center" style="width: 10%; font-weight: 600;">
                                        จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr style="transition: var(--transition);">
                                        <td class="fw-bold text-secondary py-3 px-4">
                                            {{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->iteration }}</td>
                                        <td class="py-3">
                                            <span class="fw-semibold text-dark">{{ $blog->title }}</span>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-muted text-wrap d-inline-block text-truncate"
                                                style="max-width: 400px; font-size: 0.95rem;">
                                                {{ Str::limit($blog->content, 100, '...') }}
                                            </span>
                                        </td>
                                        <td class="py-3">
                                            @if ($blog->status)
                                                <span
                                                    class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2"
                                                    style="font-weight: 500;">
                                                    🟢 เผยแพร่แล้ว
                                                </span>
                                            @else
                                                <span class="badge rounded-pill px-3 py-2"
                                                    style="background: var(--pink-100); color: var(--plum-900); font-weight: 500;">
                                                    🎀 ฉบับร่าง
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <small class="text-muted"
                                                style="font-weight: 500;">{{ $blog->created_at ? \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') : '-' }}</small>
                                        </td>
                                        <td class="py-3 px-4">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('blog.edit', $blog->id) }}"
                                                    class="btn btn-warning btn-sm text-white py-1 px-3 shadow-none"
                                                    style="border-radius: 8px; font-weight: 500;">
                                                    แก้ไข
                                                </a>
                                                <form action="{{ route('blog.delete', $blog->id) }}" method="POST"
                                                    onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบบทความนี้?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-modern-danger btn-sm py-1 px-3 shadow-none">
                                                        ลบ
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $blogs->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="card-modern border-0 text-center py-5 text-muted">
                <div class="py-4">
                    <span class="fs-1 d-block mb-3">📁</span>
                    <h2 class="fs-5 fw-bold text-dark mb-1">ไม่มีบทความ</h2>
                    <p class="text-muted mb-0">ยังไม่มีบทความในระบบ ลองเพิ่มบทความใหม่ดูสิ</p>
                </div>
            </div>
        @endif
    </div>
@endsection
