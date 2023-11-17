<x-app-layout>
    <section class="p-3">
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1">
                <div
                    style="padding: 40px; border-radius: 30px; background: #ffffff; box-shadow:  12px 12px 44px #d5d5d5, 22px 22px 44px #ffffff;">
                    <h5>Data Manajemen Mobil</h5>
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ route('admin.vehicle.create') }}" class="btn btn-primary mb-4">Tambah Mobil</a>
                    @endif

                    <table class="table align-middle mb-0 bg-white" id="datatablesSimple">
                        <thead class="bg-light">
                            <tr>
                                <th>Mobil</th>
                                <th>Nomor Plat</th>
                                <th>Status</th>
                                <th>Tarif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vehicles as $vehicle)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $vehicle->image_url }}" alt=""
                                                style="width: 85px; height: 55px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $vehicle->name }}</p>
                                                <p class="text-muted mb-0">{{ $vehicle->model }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $vehicle->plat_number }}</p>
                                    </td>
                                    <td>
                                        @if ($vehicle->status == true)
                                            <span class="badge badge-warning rounded-pill d-inline">Tidak
                                                Tersedia</span>
                                        @else
                                            <span class="badge badge-success rounded-pill d-inline">Tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">Rp.{{ $vehicle->charge }}</p>
                                    </td>
                                    <td>
                                        @if (Auth::user()->hasRole('admin'))
                                            <form method="post"
                                                action="{{ route('admin.vehicle.delete', $vehicle->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-link btn-rounded btn-sm fw-bold"
                                                    data-mdb-ripple-color="dark">
                                                    Hapus
                                                </button>
                                            </form>
                                        @else
                                            @if ($vehicle->status == true)
                                                <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold"
                                                    data-mdb-ripple-color="dark" disabled>
                                                    Sewa
                                                </button>
                                            @else
                                                <a href="{{ route('book.vehicle', $vehicle->id) }}" class="btn btn-link btn-rounded btn-sm fw-bold"
                                                    data-mdb-ripple-color="dark">
                                                    Sewa
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan='6' style="text-align: center; font-weight: bold;">
                                        Tidak Ada Mobil
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
