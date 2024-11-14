@extends('layouts.main')

@section('content')
    <div class="wrapper">
        <section class="content-header">
            <div class="container-fluid">

            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('img/bonia_logo.png') }}" alt=""
                                        style="width: 180px; height: auto;">
                                </div>
                                <div class="col-8">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="bg-secondary">Date</th>
                                                <th class="bg-secondary">Receipt No</th>
                                                <th class="bg-secondary">Cashier</th>
                                                <th class="bg-secondary">Branch</th>
                                                <th class="bg-secondary">Allstock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
                                                <td>{{ $invoiceNumber }}</td>
                                                <td>{{ Auth::user()->id }}</td>
                                                <td>{{ Auth::user()->cashier->branch->name }}</td>
                                                <td><span
                                                        class="text-info">{{ \Carbon\Carbon::now()->format('d-m-Y') }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="bg-dark">No</th>
                                        <th class="bg-dark">Code</th>
                                        <th class="bg-dark">Name</th>
                                        <th class="bg-dark">Price</th>
                                        <th class="bg-dark">Qty</th>
                                        <th class="bg-dark">Sub Total</th>
                                        <th class="bg-dark">Disc %</th>
                                        <th class="bg-dark">Disc $</th>
                                        <th class="bg-dark">Cash Voucher %</th>
                                        <th class="bg-dark">Nett</th>
                                        <th class="bg-dark">Promoter</th>
                                        <th class="bg-dark">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                        <tr class="item-row" data-code="{{ $item['code'] }}" data-name="{{ $item['name'] }}"
                                            data-price="{{ number_format($item['price'], 0, ',', '.') }}"
                                            data-qty="{{ $item['qty'] }}"
                                            data-subtotal="{{ number_format($item['subtotal'], 0, ',', '.') }}">
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['code'] }}</td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ number_format($item['price'], 0, ',', '.') }}</td>
                                            <td>
                                                <div class="input-group" style="max-width: 120px;">
                                                    <button type="button" class="btn btn-outline-secondary minus-btn"
                                                        data-id="{{ $item['id'] }}">-</button>
                                                    <input type="text" class="form-control qty-input text-center"
                                                        value="{{ $item['qty'] }}" readonly style="max-width: 50px;">
                                                    <button type="button" class="btn btn-outline-secondary plus-btn"
                                                        data-id="{{ $item['id'] }}">+</button>
                                                </div>
                                            </td>
                                            <td>{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
                                                <button class="btn btn-warning view-btn" data-id="{{ $item['id'] }}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-6">

                                </div>
                                <div class="col-6">
                                    @if ($products->isEmpty())
                                        <label for="product_code">Search Produk</label>
                                        <div class="alert alert-warning">
                                            Tidak ada produk yang tersedia.
                                        </div>
                                    @else
                                        <form action="{{ route('transaction.add') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="product_code">Add Item<br><span
                                                        class="text-secondary font-weight-normal">Enter item code or
                                                        select
                                                        from dropdown</span></label>
                                                <input type="text" id="product_search" class="form-control"
                                                    placeholder="Enter item code" autocomplete="off">
                                                <select name="product_code" id="product_code" class="form-control mt-2">
                                                    <option value="" selected disabled>Select Item</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->code }}">{{ $product->name }}
                                                            -
                                                            {{ $product->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="mt-5">
                            <div class="row">
                                <div class="col-6">
                                    <p>Member Name: <span></span>
                                    </p>
                                    <p>Member No / IC No: <span></span></p>
                                    <p>Type: <span></span></p>
                                </div>
                                <div class="col-6">
                                    <p>Sub Total: <span id="total_amount">Rp,
                                            {{ number_format($total, 0, ',', '.') }}</span>
                                    </p>
                                    <p>Discount %: <span id="voucher_discount">0</span></p>
                                    <p>Discount $: <span id="voucher_discount">0</span></p>
                                    <p>Nett: <span id="final_total">Rp,
                                            {{ number_format($total, 0, ',', '.') }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="mt-5">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <!-- Button to open the first modal -->
                                    <button id="openModalBtn1" class="btn btn-info btn-uniform"><i
                                            class="fa fa-plus"></i></button>
                                    <span class="font-weight-bold btn-label">QTY</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-receipt"></i></a>
                                    <span class="font-weight-bold btn-label">Void Item</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i class="fa-solid fa-x"></i></a>
                                    <span class="font-weight-bold btn-label">Error Bill</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-percent"></i></a>
                                    <span class="font-weight-bold btn-label">Discount</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-tag"></i></a>
                                    <span class="font-weight-bold btn-label">Manual <br>price</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-dollar-sign"></i></a>
                                    <span class="font-weight-bold btn-label">Sub <br>total</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="{{ route('payment.index') }}" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-money-bill"></i></a>
                                    <span class="font-weight-bold btn-label">Payment</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-user"></i></a>
                                    <span class="font-weight-bold btn-label">Change <br>cashier</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-cart-shopping"></i></a>
                                    <span class="font-weight-bold btn-label">Suspend <br>/ Recall</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-list"></i></a>
                                    <span class="font-weight-bold btn-label">Menu</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-right-from-bracket"></i></a>
                                    <span class="font-weight-bold btn-label">Exit</span>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-star"></i></a>
                                    <span class="font-weight-bold btn-label">Special <br>function</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-star"></i></a>
                                    <span class="font-weight-bold btn-label">Daily <br>sales</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-user-group"></i></a>
                                    <span class="font-weight-bold btn-label">Member</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-clock"></i></a>
                                    <span class="font-weight-bold btn-label">In/Out</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-ticket"></i></a>
                                    <span class="font-weight-bold btn-label">Voucher</span>
                                </div>
                                <div class="col-1 d-flex flex-column justify-content-center align-items-center">
                                    <a href="" class="btn btn-info btn-uniform"><i
                                            class="fa-solid fa-user"></i></a>
                                    <span class="font-weight-bold btn-label">Promoter</span>
                                </div>
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
            <span class="close-btn" data-modal="myModal1">&times;</span>
            <h2>Modal 1 Title</h2>
            <p>This is the first modal.</p>
            <button data-modal="myModal1" class="btn modal-close-btn">Close</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Get all open modal buttons
        const openModalButtons = document.querySelectorAll('[id^="openModalBtn"]');

        // Loop through each button and add an event listener to open the corresponding modal
        openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Get the modal ID from the button's ID (e.g., "openModalBtn1" -> "myModal1")
                const modalId = 'myModal' + button.id.replace('openModalBtn', '');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'block';
                }
                console.log(`Opened modal with ID: ${modalId}`);
            });
        });

        // Get all close buttons (both 'x' button and the close button inside modal)
        const closeButtons = document.querySelectorAll('.close-btn, .modal-close-btn');

        // Add event listeners to close buttons
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Get modal ID from data attribute and hide it
                const modalId = button.getAttribute('data-modal');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'none';
                }
                console.log(`Closed modal with ID: ${modalId}`);
            });
        });

        // Close modal when clicking outside of modal content
        window.addEventListener('click', (event) => {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
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
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to filter the select options based on search input
            $('#product_search').on('input', function() {
                var searchValue = $(this).val().toLowerCase().trim();
                var matchFound = false;

                // Iterate over each option to check for matches
                $('#product_code option').each(function() {
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
                    $('#product_code').val(''); // Reset to the default option
                }
            });

            // Update the search input field when an option is selected from the dropdown
            $('#product_code').on('change', function() {
                var selectedText = $('#product_code option:selected').text();

                // Set the search input to the product code from the selected option
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
                        $('#product_code').show();
                        $('#product_code option').each(function() {
                            var text = $(this).text().toLowerCase();
                            $(this).toggle(text.includes(searchValue));
                        });
                    } else {
                        $('#product_code').hide();
                    }
                });

                // Update the input field when an item is selected from the dropdown
                $('#product_code').on('change', function() {
                    var selectedText = $('#product_code option:selected').text();
                    $('#product_search').val(selectedText);
                    $('#product_code').hide();
                });

                // Apply voucher
                $('#apply_voucher').on('click', function() {
                    var voucherCode = $('#voucher_code').val();
                    var totalAmount = parseFloat($('#total_amount').text().replace(/,/g, ''));

                    if (voucherCode === '') {
                        alert('Masukkan kode voucher terlebih dahulu.');
                        return;
                    }

                    // Kirim permintaan AJAX untuk memeriksa voucher
                    $.ajax({
                        url: '/apply-voucher',
                        method: 'POST',
                        data: {
                            voucher_code: voucherCode,
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
