@extends('admin.layouts.admin-app')

@section('link')
    <link href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" rel="stylesheet"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endsection
@section('admin-main')
    <div class="flex h-full w-full flex-col items-center justify-center py-10">
        <div class="max-w-full">
            <form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="name">Name</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="name" name="name" type="text" required>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="image">Display Image</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="image" name="image" type="file">
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="address">Address</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="address" name="address" type="text" required>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="city">City</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="city" name="city" type="text" required>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="type">Type</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="type" name="type" type="text" placeholder="ex:Warung Tegal" required>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="phone_number">Phone Number</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="phone_number" name="phone_number" type="text" required>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="social_media">Social Media</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="social_media" name="social_media" type="text">
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="price_start">Price Start</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="price_start" name="price_start" type="number" placeholder="20000" required>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="open_hours">Open Hours</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="open_hours" name="open_hours" type="text" placeholder="senin-jumat (07:00 - 16:00)"
                               required>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="non_tunai">Pembayaran Non Tunai</label>
                        <input class="rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="non_tunai" name="non_tunai" type="checkbox">
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="restaurant_images">Restaurant
                            Images</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="restaurant_images" name="restaurant_images[]" type="file" multiple>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-brown-400" for="restaurant_menus">Restaurant
                            Menus</label>
                        <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="restaurant_menu" name="restaurant_menus[]" type="file" multiple>
                    </div>
                    <div>
                        <h1 class="mb-4">Pindah kan titik dengan cara drag and drop</h1>
                        <input class="mb-4 w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="latitude" name="latitude" type="text" required readonly>
                        <input class="mb-4 w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none focus:ring-brown-400"
                               id="longitude" name="longitude" type="text" required readonly>
                    </div>
                    <div id="map" style="height: 400px;"></div>
                </div>
                <button class="mt-6 rounded-md bg-orange px-4 py-2 text-sm font-medium text-my-white transition-all hover:-translate-y-1"
                        type="submit">Create Restaurant</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let map = L.map('map').setView([-6.935083, 107.766838], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let marker = L.marker([-6.935083, 107.766838], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function(e) {
            let latlng = e.target.getLatLng();
            document.getElementById('latitude').value = latlng.lat.toFixed(6);
            document.getElementById('longitude').value = latlng.lng.toFixed(6);
        });
    </script>
@endsection
