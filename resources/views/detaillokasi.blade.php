@extends('a_layout.a_template')
@section('title', 'Detail Lokasi Absensi')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">

                <label class="form-group col-md-8"> Lokasi absensi {{ $users->nama }} tanggal {{ $users->created_at }}
                    Jam {{ $users->jam }} :
                    <div id="lokasi"></div>
                    <input type="hidden" id="lat" value="{{ $users->lat }}">
                    </input>
                    <input type="hidden" id="lon" value="{{ $users->lng }}">
                    </input>
                </label>
                <a>
                    <div id="lt">
                    </div>
                    <input type="hidden" name="lokasi" id="myText" required>
                </a>
                <div class="form-group col-md-8">
                    <img style="height: 300px;width: 300px;margin: 12px;"
                        src="{{ url('uploads\feeds/' . $users->foto) }}">
                </div>
                <div id="mapcanvas" class="container-sm"
                    style="width: 300px; height: 300px ; margin: 25px; padding-bottom: 50px;">
                </div>
                <div>
                    <a href="{{ url('/rekapan') }}" style="padding:7px; margin-left: 30px;margin-bottom: 20px;"
                        class="btn btn-sm btn-primary">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
        <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7eq82coD3M4kO7oCuAOsOTduscvGv04o&callback=initMap">
        </script>
        <script type="text/javascript">
            var view = document.getElementById("tampilkan");
            x = navigator.geolocation;
            x.getCurrentPosition(showPosition, showError);

            function showPosition(position) {

                lat = document.getElementById('lat').value;
                lon = document.getElementById('lon').value;
                document.getElementById('lokasi').innerHTML = lat + "," + lon;
                latlon = new google.maps.LatLng(lat, lon);
                console.log(latlon)
                var myOptions = {
                    center: latlon,
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
                var marker = new google.maps.Marker({
                    position: latlon,
                    map: map,
                    title: "You are here!"
                });
            }

            function showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
                        break;
                    case error.POSITION_UNAVAILABLE:
                        view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
                        break;
                    case error.TIMEOUT:
                        view.innerHTML = "Requestnya timeout bro"
                        break;
                    case error.UNKNOWN_ERROR:
                        view.innerHTML = "An unknown error occurred."
                        break;
                }
            }

        </script>


    @endsection
