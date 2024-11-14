<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Point Of Sales PT Apex Mitra Malindo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Absensi PT Apex Mitra Malindo">
    <meta name="author" content="Jikril Aryanda">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}

    <style>
        .table-container {
            max-height: 400px;
            /* Set the maximum height of the scrollable area */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }

        .table thead th {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 1;
            /* Keeps the header above the scrollable content */
        }

        .btn-uniform {
            width: 50px;
            /* Atur lebar sesuai kebutuhan */
            height: 40px;
            /* Atur tinggi sesuai kebutuhan */
        }

        .btn-label {
            min-height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Default sidebar width */
        .main-sidebar {
            width: 250px;
            transition: width 0.3s;
        }

        /* Hide sidebar */
        .main-sidebar.collapsed {
            width: 0;
            overflow: hidden;
        }

        /* Adjust main content width */
        .content-wrapper {
            transition: margin-left 0.3s;
            margin-left: 250px;
        }

        /* When sidebar is collapsed */
        .content-wrapper.collapsed {
            margin-left: 0;
        }

        /* The Modal (background) */
        .modal {
            position: fixed;
            z-index: 1000;
            /* High z-index to ensure it’s on top */
            width: 125vw;
            height: 125vh;
            background-color: rgba(0, 0, 0, 0.5);
            /* Black with opacity */
        }

        /* Modal Content Box */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 1000px;
            z-index: 1000;
            /* Higher than the overlay */
            animation: fadeIn 0.3s;
            /* Animation effect */
        }

        /* Close Button (x) */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: #aaa;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: #000;
        }

        /* Animation for fade-in effect */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"
    style="transform: scale(0.8);
    transform-origin: top left;
    width: 122.22%; overflow: hidden">

    @yield('content')

    <!-- REQUIRED SCRIPTS -->
    <!-- Script untuk mengatur waktu dan mendapatkan data branch -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productCode').on('input', function() {
                let productCode = $(this).val();

                if (productCode) {
                    $.ajax({
                        url: '/check-product-code',
                        type: 'GET',
                        data: {
                            product_code: productCode
                        }, // Ensure key matches server-side expectation
                        success: function(response) {
                            if (response.exists) {
                                // Automatically submit the form if the product code is valid
                                $('#itemForm').submit();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        // Get modal elements
        const modal = document.getElementById('myModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.querySelector('.close-btn');
        const modalCloseBtn = document.getElementById('modalCloseBtn');

        // Open modal when button is clicked
        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'block';
        });

        // Close modal when "x" is clicked
        closeModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Close modal when "Close" button inside modal is clicked
        modalCloseBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Close modal if clicking outside of modal content
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
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
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.main-sidebar');
            const contentWrapper = document.querySelector('.content-wrapper');

            // Toggle sidebar visibility
            sidebar.classList.toggle('hide-sidebar');

            sidebar.classList.toggle('collapsed');

            // Adjust content wrapper width based on sidebar visibility
            if (sidebar.classList.contains('hide-sidebar')) {
                contentWrapper.style.marginLeft = '0'; // Full width when sidebar is hidden
                contentWrapper.style.width = '100%';
            } else {
                contentWrapper.style.marginLeft = '250px'; // Sesuaikan dengan lebar sidebar asli
                contentWrapper.style.width = 'calc(100% - 250px)';
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Event listener untuk tombol plus
            $('.plus-btn').on('click', function() {
                var id = $(this).data('id');
                updateQuantity(id, 1); // Tambah qty dengan 1
            });

            // Event listener untuk tombol minus
            $('.minus-btn').on('click', function() {
                var id = $(this).data('id');
                updateQuantity(id, -1); // Kurangi qty dengan 1
            });

            // Fungsi untuk memperbarui jumlah barang
            function updateQuantity(id, amount) {
                $.ajax({
                    url: "{{ route('transaction.updateQuantity') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        amount: amount
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Refresh halaman setelah update berhasil
                        } else {
                            alert(response.message || 'Gagal memperbarui jumlah barang');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memperbarui jumlah barang');
                    }
                });
            }
        });
    </script>
</body>

</html>
