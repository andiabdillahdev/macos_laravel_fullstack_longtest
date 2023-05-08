@php
$path = explode('/', Request::path());
$role = auth()->user()->role;
@endphp
<div class="aside-menu aside-menu-custom flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">  
            <div class="menu-item">
                <a class="menu-link {{ $path[0] == 'dashboard-admin' ? 'active' : '' }}" href="{{ url('/dashboard-admin') }}">
                    <span class="menu-icon">
                    </span>
                    <span class="menu-title" style="color:#ffffff;">Dashboard</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('books.index') }}">
                    <span class="menu-icon">
                    </span>
                    <span class="menu-title" style="color:#ffffff;">Buku</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link">
                    <span class="menu-icon">
                    </span>
                    <span class="menu-title" style="color:#ffffff;">Anggota</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link">
                    <span class="menu-icon">
                    </span>
                    <span class="menu-title" style="color:#ffffff;">Peminjaman buku</span>
                </a>
            </div>

        </div>

    </div>
</div>

@section('script')
<script>
    $(document).ready(function(){
        // $(".menu-link").mousemove(function(){
        //     $(this).css("background", "#282EAD");
        //     }, function(){
        //     $(this).css("background", "none");
        // });
});
</script>
@endsection

