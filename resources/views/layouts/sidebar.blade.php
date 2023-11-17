<!-- Nav Sidebar -->
<nav class="sidebar offcanvas-md offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false">
    <div class="d-flex justify-content-end m-3 d-block d-md-none">
        <button aria-label="Close" data-bs-dismiss="offcanvas" data-bs-target=".sidebar" class="btn p-0 border-0 fs-4">
            <i class="fas fa-close"></i>
        </button>
    </div>
    <div class="d-flex justify-content-center mt-md-2 mb-3">
    </div>
    <div class="pt-2 d-flex flex-column gap-5">
        <div class="menu p-0">
            <p>Utama</p>
            <a href="#" class="item-menu active">
                <i class="icon ic-stats"></i>
                Overview
            </a>
            <a href="#" class="item-menu">
                <i class="icon ic-trans"></i>
                Manajemen Mobil
            </a>
            <a href="#" class="item-menu">
                <i class="icon ic-msg"></i>
                Peminjaman Mobil
            </a>
            <a href="#" class="item-menu">
                <i class="icon ic-stats"></i>
                Pengembalian Mobil
            </a>
            <a href="#" class="item-menu">
                <i class="icon ic-account"></i>
                Account
            </a>
            {{-- <x-side-link :href="route('')" :active="request()->routeIs('')">
                <i class="icon ic-stats"></i>
                {{ __('Dashboard') }}
            </x-side-link> --}}
            {{-- <x-side-link :href="route('')" :active="request()->routeIs('')">
                <i class="icon ic-stats"></i>
                {{ __('Manajemen Mobil') }}
            </x-side-link> --}}
            {{-- <x-side-link :href="route('')" :active="request()->routeIs('')">
                <i class="icon ic-account"></i>
                {{ __('Peminjaman Mobil') }}
            </x-side-link>
            <x-side-link :href="route('')" :active="request()->routeIs('')">
                <i class="icon ic-trans"></i>
                {{ __('Pengembalian Mobil') }}
            </x-side-link> --}}
        </div>
        <div class="menu">
            <p>Lainnya</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-side-link :href="route('logout')"
                    onclick="event.preventDefault();
                this.closest('form').submit();">
                    <i class="icon ic-logout"></i>
                    {{ __('Logout') }}
                </x-side-link>
            </form>
        </div>
    </div>
</nav>