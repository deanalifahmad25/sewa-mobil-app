<x-app-layout>
    <section class="p-3">
        <header>
            <h3>Overview</h3>
        </header>
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1 d-flex justify-content-between">
                <div class="col-xl-4 col-12 card balance">
                    <h2>{{ $booking->vehicle->name }} {{ $booking->vehicle->model }}</h2>
                    <div>
                        <p class="m-0 fw-bold">Mobil</p>
                    </div>
                </div>
                <div class="col-xl-4 col-12 card balance">
                    <h2>{{ date('d F Y', strtotime($booking->start_date)) }}</h2>
                    <div>
                        <p class="m-0 fw-bold">Tanggal Mulai</p>
                    </div>
                </div>
                <div class="col-xl-4 col-12 card balance">
                    <h2>{{ date('d F Y', strtotime($booking->end_date)) }}</h2>
                    <div>
                        <p class="m-0 fw-bold">Tanggal Selesai</p>
                    </div>
                </div>
            </div>

            <div class="row px-1 d-flex justify-content-between">
                <div class="col-xl-4 col-12 card balance">
                    <h2>Rp.{{ $booking->vehicle->charge }}</h2>
                    <div>
                        <p class="m-0 fw-bold">Harga Sewa Per Hari</p>
                    </div>
                </div>
                <div class="col-xl-4 col-12 card balance">
                    <h2>{{ $daysRented }} Hari</h2>
                    <div>
                        <p class="m-0 fw-bold">Lama Sewa</p>
                    </div>
                </div>
                <div class="col-xl-4 col-12 card balance">
                    <h2>Rp.{{ $totalCost }}</h2>
                    <div>
                        <p class="m-0 fw-bold">Total Harga Sewa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
