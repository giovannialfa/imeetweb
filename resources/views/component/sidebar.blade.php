<!-- Sidebar
<div class="col-md-2" id="sidebar-wrapper" style="background-color: #F8F9FA;">
    <div class="sidebar-heading mb-5">LOGO </div>
    <div class="list-group">
        <a href="http://127.0.0.1:8000/dashboard"><button class="button btn mt-5"><i class="fa fa-home"></i> Beranda</button></a>
        <a href="http://127.0.0.1:8000/riwayat"><button class="button btn mt-5"><i class="fa fa-history"></i> Riwayat</button></a>
        <a href="{{ route('chat') }}"><button class="button btn mt-5"><i class="fa fa-comment"></i> Chat</button></a>
    </div>
    <div class="list-group">
        <button class="button btnexit" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-close ">
                <span> Log out</span></i>
            <a href="{{ route('logout') }}">
            </a>
        </button>
    </div>
</div>
/#sidebar-wrapper -->
<div class="d-flex flex-column white-bg pl-4 pr-4 sidebar-row "  style="height: calc(100vh - 80px);">
    <div class="d-flex flex-column" style="min-height: 100%;">
        <div class="row pl-2 pr-2 pb-3 mt-3">
            <div class="header-part white-bg pb-5 pl-4 pr-5 pt-2">
                <img src="{{ asset('asset/icon/ic_logo.png') }}" onclick="homePage()" style="cursor: pointer;" alt="" height="25rem">
            </div>
        </div>
            <div class="row pl-2 pr-2 pt-3 pb-3 mt-3" onclick="homePage()" style="cursor: pointer;" id="sidebar_menu">
                <div class="col-md-3">
                    <x-feathericon-database class="sidebar-icon" />
                </div>
                <div class="col-md-5 sidebar-text">
                    Beranda
                </div>
            </div>
        <div class="row pl-2 pr-2 pt-3 pb-3 mt-3" onclick="guestPage()" style="cursor: pointer;" id="sidebar_menu">
            <div class="col-md-3">
                <x-feathericon-archive class="sidebar-icon" />
            </div>
            <div class="col-md-5 sidebar-text">
                Riwayat
            </div>
        </div>
            <div class="row pl-2 pr-2 pt-3 pb-3 mt-3" onclick="chatPage();" style="cursor: pointer;" id="sidebar_menu">
                <div class="col-md-3">
                    <x-feathericon-message-square class="sidebar-icon" />
                </div>
                <div class="col-md-5 sidebar-text">
                    Chat
                </div>
            </div>
        <div class="row pl-2 pr-2 pt-3 pb-3 mt-3" onclick="adminPage();" style="cursor: pointer;" id="sidebar_menu">
            <div class="col-md-3">
                <x-feathericon-users class="sidebar-icon" />
            </div>
            <div class="col-md-5 sidebar-text">
                Admin
            </div>
        </div>
        <div class="row pl-2 pr-2 pt-3 pb-3 mb-2 mt-auto" onclick="logoutPage();" style="cursor: pointer;">
            <div class="col-md-3">
                <x-feathericon-log-out class="sidebar-icon-logout" />
            </div>
            <div class="col-md-5 sidebar-text-logout">
                Keluar
            </div>
        </div>
    </div>
</div>
<script>
    function logoutPage() {
        window.location.href = "{{ route('logout') }}";
    }

    function adminPage() {
        window.location.href = "{{ route('admin.index') }}";
    }

    function guestPage() {
        window.location.href = "{{ route('guest') }}";
    }

    function homePage() {
        window.location.href = "{{ route('home') }}"
    }
    
    function chatPage() {
        window.location.href = "{{ route ('chat') }}"
    }
</script>