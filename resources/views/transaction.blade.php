@extends('layouts.main')

@section('content')
    <div class="wrapper p-3">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-7">
                        <div class="mt-3">
                            <img src="{{ asset('img/assets/bonia_logo.avif') }}" alt="">
                            <div class="row mt-5">
                                <div class="col-6">
                                    <form id="itemForm" action="{{ route('transaction.add') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="product_barcode" id="productBarcode"
                                                class="form-control" placeholder="Enter item barcode" autocomplete="off">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-container" style="max-height: 400px; overflow-y: auto;">
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Picture</th>
                                        <th scope="col">Selected Item</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Disc %</th>
                                        <th scope="col">Nett</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                        <tr scope="row" class="item-row" data-barcode="{{ $item['barcode'] }}"
                                            data-name="{{ $item['name'] }}"
                                            data-price="{{ number_format($item['price'], 0, ',', '.') }}"
                                            data-qty="{{ $item['qty'] }}"
                                            data-subtotal="{{ number_format($item['subtotal'], 0, ',', '.') }}">
                                            <td><img src="{{ asset($item['image']) }}" alt="" style="width: 80px">
                                            </td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ number_format($item['price'], 0, ',', '.') }}</td>
                                            <td>
                                                <div class="input-group" style="max-width: 120px;">
                                                    <div style="display: flex; align-items: center;">
                                                        <button type="button" class="btn btn-outline-primary minus-btn"
                                                            data-id="{{ $item['id'] }}"
                                                            style="border-radius: 50%; width: 30px; height: 30px; font-size: 12px; padding: 0;">
                                                            <i class="fa fa-minus"></i>
                                                        </button>

                                                        <input type="text" class="form-control qty-input text-center"
                                                            value="{{ $item['qty'] }}" readonly
                                                            style="max-width: 50px; background-color: transparent; border: none; margin: 0 5px;">

                                                        <button type="button" class="btn btn-outline-primary plus-btn"
                                                            data-id="{{ $item['id'] }}"
                                                            style="border-radius: 50%; width: 30px; height: 30px; font-size: 12px; padding: 0;">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <form action="{{ route('transaction.remove', $item['id']) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row my-3">
                            <button id="openModalBtn2" class="btn btn-info"><i class="fa-solid fa-user"></i>
                                Customer</button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p>Customer:</p>
                                        <p>Number phone:</p>
                                        <p>Email:</p>
                                        <p>Remarks: </p>
                                    </div>
                                    <div class="col-6">
                                        <p>...</p>
                                        <p>...</p>
                                        <p>...</p>
                                        <p>...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h3 class="font-bold">Invoice Summary</h3>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <p class="font-weight-bold">Subtotal</p>
                                </div>
                                <div class="col-6">
                                    <p id="final_total">Rp,
                                        {{ number_format($total, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-6">
                                    <p class="font-weight-bold">Discount %</p>
                                </div>
                                <div class="col-6">
                                    <p id="final_total">Rp,</p>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-6">
                                    <p class="font-weight-bold">Nett</p>
                                </div>
                                <div class="col-6">
                                    <p id="final_total">Rp,
                                        {{ number_format($total, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <h5 class="font-weight-bold">TOTAL</h4>
                                </div>
                                <div class="col-6">
                                    <p id="final_total">Rp,
                                        {{ number_format($total, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        <button id="openModalBtn1" class="btn btn-primary" style="width: 100%"><i
                                class="fa-solid fa-dollar-sign"></i> Payment</button>
                        <div class="row mt-3">
                            <div class="col-4">
                                <button class="btn btn-danger" style="width: 100%"><i class="fa-solid fa-x"></i>
                                    Cancel</button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success" style="width: 100%"><i class="fa-solid fa-print"></i>
                                    Print receipt</button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-danger" style="width: 100%">Retur</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- First Modal Structure -->
    <div id="myModal1" class="modal">
        <div class="modal-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Card ID</th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Bank</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="row my-3">
                <div class="col-2">
                    <p class="font-weight-bold">Total:</p>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="" id="" disabled>
                </div>
            </div>
            <div class="mt-5">
                <div class="row">
                    <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                        <button id="openModalBtn2" class="btn btn-info btn-uniform"><i
                                class="fa-solid fa-dollar-sign"></i></button>
                        <span class="font-weight-bold btn-label">Cash</span>
                    </div>
                    <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                        <button id="openModalBtn3" class="btn btn-info btn-uniform"><i
                                class="fa-solid fa-credit-card"></i></button>
                        <span class="font-weight-bold btn-label">Credit Card</span>
                    </div>
                    <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                        <a href="" class="btn btn-info btn-uniform"><i class="fa-solid fa-ban"></i></a>
                        <span class="font-weight-bold btn-label">No Refund</span>
                    </div>
                    <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                        <a href="" class="btn btn-success btn-uniform"><i class="fa-solid fa-check"></i></a>
                        <span class="font-weight-bold btn-label">Accept</span>
                    </div>
                    <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                        <a href="" class="btn btn-danger btn-uniform"><i
                                class="fa-solid fa-right-from-bracket"></i></a>
                        <span class="font-weight-bold btn-label">Cancel</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal2" class="modal" style="z-index: 1055;">
        <div class="modal-content">
            <h3>Payment method with visa credit card</h3>
            <div class="mt-3">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="card_id" class="form-label">Card ID</label>
                            <input type="text" class="form-control" name="card_id" id="card_id">
                        </div>
                        <div class="form-group mb-3">
                            <label for="expiry_date" class="form-label">Expiry date</label>
                            <input type="text" class="form-control" name="expiry_date" id="expiry_date">
                        </div>
                        <div class="form-group mb-3">
                            <label for="bank" class="form-label">Card ID</label>
                            <select class="form-control" aria-label="Default select example" id="bank">
                                <option selected>Open this select bank menu</option>
                                <option value="bca">BANK CENTRAL ASIA</option>
                                <option value="mandiri">BANK MANDIRI</option>
                                <option value="bni">BANK NEGARA INDONESIA</option>
                                <option value="mega">BANK MEGA</option>
                                <option value="cimb">BANK CIMB</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary btn-uniform"><i class="fa-solid fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Mendapatkan semua tombol pembuka modal
        const openModalButtons = document.querySelectorAll('[id^="openModalBtn"]');

        // Menambahkan event listener untuk membuka modal yang sesuai
        openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Mendapatkan ID modal dari tombol pembuka
                const modalId = 'myModal' + button.id.replace('openModalBtn', '');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'block';
                    document.body.classList.add('modal-open'); // Mencegah scroll di background
                }
                console.log(`Opened modal with ID: ${modalId}`);
            });
        });

        // Mendapatkan semua tombol penutup modal (baik dari tombol 'x' atau tombol close di dalam modal)
        const closeButtons = document.querySelectorAll('.close-btn, .modal-close-btn');

        // Menambahkan event listener ke tombol penutup modal
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Mendapatkan ID modal dari atribut data
                const modalId = button.getAttribute('data-modal');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'none';

                    // Mengecek apakah ada modal lain yang terbuka, jika tidak, hapus kelas `modal-open` dari body
                    const anyModalOpen = document.querySelectorAll('.modal').some(m => m.style.display ===
                        'block');
                    if (!anyModalOpen) {
                        document.body.classList.remove('modal-open');
                    }
                }
                console.log(`Closed modal with ID: ${modalId}`);
            });
        });

        // Menutup modal saat klik di luar konten modal
        window.addEventListener('click', (event) => {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';

                // Mengecek apakah ada modal lain yang terbuka
                const anyModalOpen = document.querySelectorAll('.modal').some(m => m.style.display === 'block');
                if (!anyModalOpen) {
                    document.body.classList.remove('modal-open');
                }
                console.log(`Closed modal by clicking outside.`);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.view-btn', function() {
                alert('Button clicked!');
            });
        });

        $(document).ready(function() {
            $('.view-btn').on('click', function() {
                let productId = $(this).data('id');
                console.log('Button clicked, product ID:',
                    productId); // Log untuk melihat ID produk yang dikirim

                $.ajax({
                    url: `/product/show/${productId}`,
                    type: 'GET',
                    success: function(data) {
                        console.log('Data received:',
                            data); // Log untuk melihat data yang diterima dari server

                        // Update isi card dengan data produk
                        $('#product-name').text(data.name);
                        $('#product-description').text(data.description);
                        $('#product-price').text('Rp ' + parseFloat(data.price).toLocaleString(
                            'id-ID'));
                        $('#product-image').attr('src', data
                            .image); // pastikan path gambar sesuai
                        $('#product-department').text(data.department_id);
                        $('#product-class').text(data.class_id);
                        $('#product-subclass').text(data.subclass_id);
                        $('#product-brand').text(data.brand_id);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log error jika permintaan gagal
                        console.error('Response:', xhr
                            .responseText); // Log respons jika ada pesan error
                    }
                });
            });
        }); <
        /> <
        script >
            $(document).ready(function() {
                // Function to filter the select options based on search input
                $('#product_search').on('input', function() {
                    var searchValue = $(this).val().toLowerCase().trim();
                    var matchFound = false;

                    // Iterate over each option to check for matches
                    $('#product_barcode option').each(function() {
                        var optionText = $(this).text().toLowerCase();

                        // Check if the option text contains the search value
                        if (optionText.includes(searchValue) && searchValue !== '') {
                            $(this).prop('selected', true); // Select matching option
                            matchFound = true;
                            return false; // Exit the loop once a match is found
                        }
                    });

                    // If no match is found or search is empty, reset the selection
                    if (!matchFound || searchValue === '') {
                        $('#product_barcode').val(''); // Reset to the default option
                    }
                });

                // Update the search input field when an option is selected from the dropdown
                $('#product_barcode').on('change', function() {
                    var selectedText = $('#product_barcode option:selected').text();

                    // Set the search input to the product barcode from the selected option
                    if (selectedText.includes(' - ')) {
                        $('#product_search').val(selectedText.split(' - ')[1].trim());
                    } else {
                        $('#product_search').val(selectedText);
                    }
                });
            });
    </script>
    @if (!$products->isEmpty())
        <script>
            $(document).ready(function() {
                // Show dropdown when typing in the search box
                $('#product_search').on('keyup', function() {
                    var searchValue = $(this).val().toLowerCase();
                    if (searchValue) {
                        $('#product_barcode').show();
                        $('#product_barcode option').each(function() {
                            var text = $(this).text().toLowerCase();
                            $(this).toggle(text.includes(searchValue));
                        });
                    } else {
                        $('#product_barcode').hide();
                    }
                });

                // Update the input field when an item is selected from the dropdown
                $('#product_barcode').on('change', function() {
                    var selectedText = $('#product_barcode option:selected').text();
                    $('#product_search').val(selectedText);
                    $('#product_barcode').hide();
                });

                // Apply voucher
                $('#apply_voucher').on('click', function() {
                    var voucherbarcode = $('#voucher_barcode').val();
                    var totalAmount = parseFloat($('#total_amount').text().replace(/,/g, ''));

                    if (voucherbarcode === '') {
                        alert('Masukkan kode voucher terlebih dahulu.');
                        return;
                    }

                    // Kirim permintaan AJAX untuk memeriksa voucher
                    $.ajax({
                        url: '/apply-voucher',
                        method: 'POST',
                        data: {
                            voucher_barcode: voucherbarcode,
                            total: totalAmount,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#voucher_discount').text(response.discount.toLocaleString());
                                $('#final_total').text((totalAmount - response.discount)
                                    .toLocaleString());
                                alert('Voucher berhasil diterapkan!');
                            } else {
                                alert(response.error);
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat memproses voucher.');
                        }
                    });
                });
            });
        </script>
    @endif
@endsection
