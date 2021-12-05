{{-- <div>
    <video autoplay="true" id="video-webcam" style="height: 100px; width: 100px;">
        Browsermu tidak mendukung bro, upgrade donk!
    </video>
</div>
<button onclick="takeSnapshot()">Ambil Gambar</button>
<br></br>
<input type="image" name="foto" id="canvas">
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
        console.log(img.src)
        document.body.appendChild(img);
    }

</script> --}}

{{-- <html>

<head>
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('ifYes').style.display = 'none';
            document.getElementById('ifNo').style.display = 'none';
        }

        function yesnoCheck() {
            if (document.getElementById('yesCheck').checked) {
                document.getElementById('ifYes').style.display = 'block';
                document.getElementById('ifNo').style.display = 'none';
                document.getElementById('redhat1').style.display = 'none';
                document.getElementById('aix1').style.display = 'none';
            } else if (document.getElementById('noCheck').checked) {
                document.getElementById('ifNo').style.display = 'block';
                document.getElementById('ifYes').style.display = 'none';
                document.getElementById('redhat1').style.display = 'none';
                document.getElementById('aix1').style.display = 'none';
            }
        }

        function yesnoCheck1() {
            if (document.getElementById('redhat').checked) {
                document.getElementById('redhat1').style.display = 'block';
                document.getElementById('aix1').style.display = 'none';
            }
            if (document.getElementById('aix').checked) {
                document.getElementById('aix1').style.display = 'block';
                document.getElementById('redhat1').style.display = 'none';
            }
        }

    </script>
</head>

<body>
    Select os :<br>
    windows
    <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck" />Unix
    <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck" />
    <br>
    <div id="ifYes" style="display:none">
        Windows 2008<input type="radio" name="win" value="2008" />
        Windows 2012<input type="radio" name="win" value="2012" />
    </div>
    <div id="ifNo" style="display:none">
        Red Hat<input type="radio" name="unix" onclick="javascript:yesnoCheck1();" value="2008" id="redhat" />
        AIX<input type="radio" name="unix" onclick="javascript:yesnoCheck1();" value="2012" id="aix" />
    </div>
    <div id="redhat1" style="display:none">
        Red Hat 6.0<input type="radio" name="redhat" value="2008" id="redhat6.0" />
        Red Hat 6.1<input type="radio" name="redhat" value="2012" id="redhat6.1" />
    </div>
    <div id="aix1" style="display:none">
        aix 6.0<input type="radio" name="aix" value="2008" id="aix6.0" />
        aix 6.1<input type="radio" name="aix" value="2012" id="aix6.1" / </div>
</body>

</html>*** --}}
{{-- Share
Improve this answer
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
<div class="btn-group btn-toggle" data-toggle="buttons">
    <label class="btn btn-default">
        <input type="radio" name="subscription-period" value="3mths"> 3 months
    </label>
    <label class="btn btn-default">
        <input type="radio" name="subscription-period" value="6mths"> 6 months
    </label>
    <label class="btn btn-default">
        <input type="radio" name="subscription-period" value="12mths"> 12 months
    </label>
</div>
</nav>

<div class="prices" data-period="3mths">A 1</div>
<div class="prices" data-period="6mths">B 1</div>
<div class="prices" data-period="12mths">C 1</div>

<div class="prices" data-period="3mths">A 2</div>
<div class="prices" data-period="6mths">B 2</div>
<div class="prices" data-period="12mths">C 2</div>

<div class="prices" data-period="3mths">A 2</div>
<div class="prices" data-period="6mths">B 2</div>
<div class="prices" data-period="12mths">C 3</div>

<script>
    $(document).ready(function() {
        $(".prices").hide();
        $(".btn-default").click(function() {
            var test = $(this).find("input[name$='subscription-period']").val();
            $(".prices").hide();
            $(".prices[data-period='" + test + "']").show();
        });

    });

</script> --}}

<!-- CSS -->
<style>
    #my_camera {
        width: 320px;
        height: 240px;
        border: 1px solid black;
    }

</style>

<!-- -->
<div id="my_camera"></div>
<input type=button value="Configure" onClick="configure()">
<input type=button value="Take Snapshot" onClick="take_snapshot()">
<input type=button value="Save Snapshot" onClick="saveSnap()">

<div id="results"></div>

<!-- Script -->
<script type="text/javascript" src="webcamjs/webcam.min.js"></script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
    // Configure a few settings and attach camera
    function configure() {
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    }
    // A button for taking snaps


    // preload shutter audio clip
    var shutter = new Audio();
    shutter.autoplay = false;
    shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

    function take_snapshot() {
        // play sound effect
        shutter.play();

        // take snapshot and get image data
        Webcam.snap(function(data_uri) {
            // display results in page
            document.getElementById('results').innerHTML =
                '<img id="imageprev" src="' + data_uri + '"/>';
        });

        Webcam.reset();
    }

    function saveSnap() {
        // Get base64 value from <img id='imageprev'> source
        var base64image = document.getElementById("imageprev").src;

        Webcam.upload(base64image, 'upload.php', function(code, text) {
            console.log('Save successfully');
            //console.log(text);
        });

    }

</script>
