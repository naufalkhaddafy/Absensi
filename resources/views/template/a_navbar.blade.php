<div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
        <h5 class="text-white h4">Welcome!</h5>
        <div class="btn-group-vertical">
            <a class="nav-link active" aria-current="page" href="{{ url('/admin') }}">Dashboard</a>
            <a class="nav-link active" aria-current="page" href="{{ url('/a_profil') }}">Profile</a>
            <a class="nav-link active" aria-current="page" href="{{ url('/rekapan') }}">Rekapan</a>
            <a class="nav-link active" aria-current="page" href="{{ url('/karyawan') }}">Karyawan</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light">Logout</button>
            </form>
        </div>
    </div>
</div>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="nav-link text-white">
            <h2 class="my-0 text-center"><label id="hours"><?= date('H') ?></label>:<label id="minutes"><?= date('i') ?></label>:<label id="seconds"><?= date('s') ?></label></h2>
        </a>
    </div>
</nav>

<script>
    var hoursLabel = document.getElementById("hours");
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    setInterval(setTime, 1000);

    function setTime() {
        secondsLabel.innerHTML = pad(Math.floor(new Date().getSeconds()));
        minutesLabel.innerHTML = pad(Math.floor(new Date().getMinutes()));
        hoursLabel.innerHTML = pad(Math.floor(new Date().getHours()));
    }

    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }
</script>
