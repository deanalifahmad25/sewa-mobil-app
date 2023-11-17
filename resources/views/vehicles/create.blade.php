<x-app-layout>
    <section class="p-3">
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1">
                
                <div style="padding: 40px; border-radius: 30px; background: #ffffff; box-shadow:  12px 12px 44px #d5d5d5, 22px 22px 44px #ffffff;">
                <h5>Tambah Mobil</h5>
                    <form method="post" action="{{ route('admin.vehicle.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="name" class="form-control" required />
                                    <label class="form-label" for="name">Merk</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" name="model" class="form-control" required />
                                    <label class="form-label" for="model">Model</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="image_url" class="form-control" required />
                            <label class="form-label" for="image_url">URL Foto Mobil</label>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <input type="text" name="plat_number" class="form-control" required />
                            <label class="form-label" for="plat_number">Nomor Plat</label>
                        </div>

                        <div class="form-outline mb-2">
                            <input type="number" name="charge" class="form-control" required />
                            <label class="form-label" for="charge">Tarif Sewa Per Hari</label>
                        </div>

                        <button type="submit" class="btn btn-primary mb-4">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
