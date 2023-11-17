<x-app-layout>
    <section class="p-3">
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1">

                <div
                    style="padding: 40px; border-radius: 30px; background: #ffffff; box-shadow:  12px 12px 44px #d5d5d5, 22px 22px 44px #ffffff;">
                    <h5 class="mb-4">Sewa Mobil</h5>
                    <form method="post" action="{{ route('return.store')}}" class="mt-6 space-y-6">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                        <div class="form-outline mb-4">
                            <input type="text" name="plat_number" class="form-control" required />
                            <label class="form-label" for="plat_number">Nomor Plat</label>
                        </div>

                        <button type="submit" class="btn btn-primary mb-4">Sewa sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });
    </script>
</x-app-layout>
