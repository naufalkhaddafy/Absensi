@extends('a_layout.a_template')
@section('title', 'Absensi')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    Silahkan melakukan absensi
                </div>
                <form id="myForm" action=" {{ url('/absensi/insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-header with-border">
                        <div class="box-title">
                            <b>Tanggal</b>
                            <div name="tanggal" id="tanggal"></div>
                            <label for="jam">Jam</label>
                            <div id="jam"></div>
                            <input type="hidden" name="jam" id="jm" required>
                            <b>Jam Kerja</b>
                            <div id="jamkerja"></div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <div class="btn-group btn-group-toggle">
                            <label for="hdr" class="btn btn-success">
                                <input id="hdr" style="display: none" type="radio" onclick="javascript:ShowHideDiv()"
                                    name="options" value="Hadir">
                                Hadir
                            </label>
                            <label for="izn" class="btn btn-warning">
                                <input id="izn" style="display: none" type="radio" onclick="javascript:ShowHideDiv()"
                                    name="options" value="Izin">
                                Izin
                            </label>
                            <label for="skt" class="btn btn-danger">
                                <input id="skt" style="display: none" type="radio" name="options" value="Sakit"> Sakit
                            </label>
                            <label for="dl" class="btn btn-info">
                                <input id="dl" style="display: none" type="radio" onclick="javascript:ShowHideDiv()"
                                    name="options" value="Dinas Luar"> Dinas
                                Luar
                            </label>
                        </div>

                        <div class="invalid-feedback">
                            @error('options')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="text-danger col-md-8">
                        @error('fotorekap')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="box-body" id="hadir" style="display: none">
                        <div id="ketsore" class="form-group col-md-8">
                            <label for="exampleInputEmail1">Pekerjaan yang dilaksanakan</label>
                            <textarea name="ketkerja" class="form-control " id="exampleFormControlTextarea1"
                                rows="2"></textarea>
                        </div>
                        <div class="text-danger col-md-8">
                            @error('ketkerja')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="box-body">

                            <video autoplay="true" id="video-webcam" style="height: 300px; width: 300px; margin-left: 2%;">
                                Browser anda tidak mendukung!
                            </video>
                            <div class="form-group col-md-8">
                                <button type="button" class="btn btn-primary" onclick="takeSnapshot()"><span
                                        class="glyphicon glyphicon-camera"></span> Ambil foto
                                </button>
                                <br></br>
                                <img id="hsl">
                            </div>
                            <input type="hidden" name="fotorekap" id="canvas" />

                        </div>
                    </div>
                    <div class="box-body" id="izin" style="display: none">
                    </div>
                    <div class="box-body" id="sakit" style="display: none">
                    </div>
                    <div class="box-body" id="dinasluar" style="display: none">
                    </div>


                    <div class=" box-body">
                        <label class="form-group col-md-8">Lokasi saat ini:
                            <a>
                                <div id="lt">
                                </div>
                                <input type="hidden" name="lt2" id="lt2" required>
                                <div id="lng">
                                </div>
                                <input type="hidden" name="lng2" id="lng2" required>
                            </a>
                            <div class="text-danger col-md-8">
                                @error('lt2')
                                    {{ $message }}
                                @enderror
                            </div>
                        </label>
                    </div>
                    <div class="box-body" id="mapcanvas" style="width: 300px; height: 300px ; margin-left: 25px;">
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="btnabsensi" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober',
            'November', 'Desember'
        ];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay();
        thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;

        document.getElementById("tanggal").innerHTML = thisDay + "," + day + " " + months[month] + " " + year;

        function showTime() {
            var jamkerja = "";
            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            if (curr_hour < 12) {
                a_p = "AM";
            } else {
                a_p = "PM";
            }
            if (curr_hour >= 8 && curr_hour < 10) {
                jamkerja = "Pagi";
                document.getElementById("ketsore").style.display = "none";
                document.getElementById("btnabsensi").style.display = "block"
            } else if (curr_hour >= 16 && curr_hour < 24) {
                jamkerja = "Sore";
                document.getElementById("ketsore").style.display = "block";
                document.getElementById("btnabsensi").style.display = "block"
            } else {
                jamkerja = "Luar Jam Absensi";
                document.getElementById("ketsore").style.display = "none";
                document.getElementById("btnabsensi").style.display = "none"
            }
            if (curr_hour == 0) {
                curr_hour = 12;
            }
            if (curr_hour > 12) {
                curr_hour = curr_hour - 12;
            }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);
            document.getElementById('jam').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " +
                a_p;
            document.getElementById("jm").value = curr_hour + ":" + curr_minute + ":" + curr_second + " " +
                a_p;
            document.getElementById("jamkerja").innerHTML = jamkerja;
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);

    </script>
    <script type="text/javascript">
        function ShowHideDiv() {
            if (document.getElementById('hdr').checked) {
                document.getElementById('hadir').style.display = 'block';
            } else {
                document.getElementById('hadir').style.display = 'none';
            }

            if (document.getElementById('izn').checked) {
                document.getElementById('izin').style.display = 'block';
            } else {
                document.getElementById('izin').style.display = 'none';
            }

            if (document.getElementById('skt').checked) {
                document.getElementById('sakit').style.display = 'block';
            } else {
                document.getElementById('sakit').style.display = 'none';
            }
            if (document.getElementById('dl').checked) {
                document.getElementById('dinasluar').style.display = 'block';
            } else {
                document.getElementById('dinasluar').style.display = 'none';
            }
        }

    </script>

    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7eq82coD3M4kO7oCuAOsOTduscvGv04o&callback=initMap">
    </script>
    <script type="text/javascript">
        var view = document.getElementById("tampilkan");
        x = navigator.geolocation;
        x.getCurrentPosition(showPosition, showError);

        function showPosition(position) {
            lat = position.coords.latitude;
            lon = position.coords.longitude;
            latlon = new google.maps.LatLng(lat, lon);
            mapcanvas = document.getElementById('mapcanvas');
            var myOptions = {
                center: latlon,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            document.getElementById("lt2").value = position.coords.latitude;
            document.getElementById("lng2").value = position.coords.longitude;
            lat = document.getElementById('lt');
            lat.innerHTML = position.coords.latitude + "," + position.coords.longitude;

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
    <script type="text/javascript">
        // seleksi elemen video
        var video = document.querySelector("#video-webcam");

        // minta izin user
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||
            navigator.msGetUserMedia || navigator.oGetUserMedia;

        // jika user memberikan izin
        if (navigator.getUserMedia) {
            // jalankan fungsi handleVideo, dan videoError jika izin ditolak
            navigator.getUserMedia({
                video: true
            }, handleVideo, videoError);
        }

        // fungsi ini akan dieksekusi jika  izin telah diberikan
        function handleVideo(stream) {
            video.srcObject = stream;
        }

        // fungsi ini akan dieksekusi kalau user menolak izin
        function videoError(e) {
            // do something
            alert("Izinkan menggunakan webcam untuk demo!")
        }

    </script>
    <script>
        function takeSnapshot() {
            // buat elemen img
            var img = document.getElementById('canvas');
            var hsl = document.getElementById('hsl');
            var context;

            // ambil ukuran video
            var width = video.offsetWidth,
                height = video.offsetHeight;

            // buat elemen canvas
            canvas = document.createElement('canvas');
            canvas.width = width;
            canvas.height = height;

            // ambil gambar dari video dan masukan
            // ke dalam canvas
            context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, width, height);

            // render hasil dari canvas ke elemen img
            img.src = canvas.toDataURL('image/png');
            //document.body.appendChild(img);
            hsl.src = canvas.toDataURL('image/png');

            document.getElementById('canvas').value = img.src;

        }

    </script>

@endsection
