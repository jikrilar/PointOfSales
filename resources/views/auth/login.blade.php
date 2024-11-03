<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="login-container">
        <div class="row">
            <div class="col-6">
                <div class="font-weight-bold" id="realtime-clock"></div>
            </div>
            <div class="col-6">
                <p class="font-weight-bold">Version: 1.00</p>
            </div>
        </div>
        <img src="{{ asset('img/bonia_logo.png') }}" alt="" style="width: 150px; height: auto;">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" placeholder="Enter your nik" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="branch_code">Branch code</label>
                <input type="text" id="branch_code" disabled>
            </div>
            <div class="form-group">
                <label for="branch_name">Branch name</label>
                <input type="text" id="branch_name" disabled>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

    <!-- Script untuk mengatur waktu dan mendapatkan data branch -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function updateClock() {
            const now = new Date();
            const date = now.toLocaleDateString('en-GB', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            const time = now.toLocaleTimeString('en-GB', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            const dateTime = `${date} ${time}`;
            document.getElementById('realtime-clock').innerText = dateTime;
        }

        setInterval(updateClock, 1000);
        updateClock();

        // Fungsi untuk mendapatkan informasi branch berdasarkan NIK
        $('#nik').on('input', function() {
            let nik = $(this).val();

            // Hanya lakukan AJAX jika NIK memiliki nilai
            if (nik) {
                $.ajax({
                    url: '/get-branch-info/' + nik,
                    type: 'GET',
                    success: function(response) {
                        if (response.branch_code && response.branch_name) {
                            $('#branch_code').val(response.branch_code);
                            $('#branch_name').val(response.branch_name);
                        } else {
                            $('#branch_code').val('');
                            $('#branch_name').val('');
                        }
                    },
                    error: function() {
                        console.log('Gagal mendapatkan data branch');
                    }
                });
            } else {
                $('#branch_code').val('');
                $('#branch_name').val('');
            }
        });
    </script>
</body>

</html>
