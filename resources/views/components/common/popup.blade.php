<div class="modal fade" id="popup-form" tabindex="-1" aria-labelledby="popup-form-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popup-form-label">Calculate your Kashmir tour package cost, fill & get
                    30%off</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex gap-2">
                <div class="col-6 d-none d-md-flex flex-column">
                    <div class="border p-4 text-center mb-2">
                        <h5 class="theme">24X7 CUSTOMER SUPPORT</h5>
                        <span class="fa fa-headphones" style="color: #000; font-size: 5rem;"></span>
                        <p class="lead fw-bold"><a class="theme"
                                                   href="tel:{{setting('contact.contact_phone')}}">+91-{{setting('contact.contact_phone')}}</a>
                        </p>
                        <p>Call Us !</p>
                        <p>Our Team Will Help You.</p>
                    </div>
                    <div class="border p-4 text-center mb-2">
                        <h5 class="theme">Huge Discount</h5>
                        <span class="fa fa-gift" style="color: #000; font-size: 5rem;"></span>
                        <p class="lead fw-bold">
                            Upto 30%
                        </p>
                        <p>Call Us now..!!</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <form id="pop-query-form" action="javascript:void(0)" method="post" class="border p-3">
                        <div class="row">
                            <x-honeypot/>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group mb-2">
                                    <label class="f">Name</label>
                                    <div class="d-flex align-items-baseline">
                                        <input type="text" name="name" class="form-control"
                                               style="border-radius: 0;"
                                               placeholder="Name"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group mb-2">
                                    <label>Phone</label>
                                    <div class="d-flex align-items-baseline">
                                        <input type="tel" name="phone" class="form-control"
                                               style="border-radius: 0;"
                                               placeholder="Phone"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Email</label>
                                    <div class="d-flex align-items-baseline">
                                        <input type="email" name="email" class="form-control"
                                               style="border-radius: 0;" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Where to Go?</label>
                                    <div class="d-flex align-items-baseline">
                                        <input type="text" name="location" class="form-control"
                                               style="border-radius: 0;" placeholder="Destination" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group mb-2">
                                    <label>Start Date</label>
                                    <div class="d-flex align-items-baseline">
                                        <button style="padding: 13px; width: 38px;" class="btn-fix"><i
                                                class="fa fa-calendar"></i>
                                        </button>
                                        <input id="pop_start_date" type="text" name="start_date"
                                               class="form-control" style="border-radius: 0;"
                                               placeholder="Start Date"
                                               required
                                               autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group mb-2">
                                    <label>End Date</label>
                                    <div class="d-flex align-items-baseline">
                                        <button style="padding: 13px; width: 38px;" class="btn-fix"><i
                                                class="fa fa-calendar"></i>
                                        </button>
                                        <input id="pop_end_date" type="text" name="end_date"
                                               class="form-control" style="border-radius: 0;"
                                               placeholder="End Date"
                                               required
                                               autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Select a Cab</label>
                                    <div class="d-flex align-items-baseline">
                                        <select name="cab_id" class="form-select form-control"
                                                style="border-radius: 0;" required>
                                            <option value="">-- Select a Cab--</option>
                                            @foreach(get_cabs_list() as $cab)
                                                <option value="{{$cab->id}}">{{$cab->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group mb-2">
                                    <label>Pick Up Location</label>
                                    <div class="d-flex align-items-baseline">
                                        <input type="text" name="pick_up" class="form-control"
                                               style="border-radius: 0;" placeholder="Pick Up" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group mb-2">
                                    <label>Drop Location</label>
                                    <div class="d-flex align-items-baseline">
                                        <input type="text" name="drop" class="form-control"
                                               style="border-radius: 0;" placeholder="Drop" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark white w-100" id="pop-submit-btn">Submit Details
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        // Function to show the modal
        let bottomNavPop = document.getElementById("bottomNav");
        let popupModalElement = document.getElementById('popup-form');
        let popupModal = new bootstrap.Modal(popupModalElement, {backdrop: 'static'});

        function showModal() {
            popupModal.show();
            bottomNavPop.style.visibility = "hidden";
        }

        // Function to hide the modal
        function hideModal() {
            popupModal.hide();
            bottomNavPop.style.visibility = "visible";
        }

        // Check if the user has submitted the form by checking a cookie
        function hasUserSubmittedForm() {
            return document.cookie.indexOf('formSubmitted=true') !== -1;
        }

        function shouldShowModal() {
            let lastPopupTimestamp = localStorage.getItem('lastPopupTimestamp');
            if (!lastPopupTimestamp) {
                return true; // Show the pop-up if it hasn't been displayed before
            }
            let currentTime = new Date().getTime();
            return currentTime - lastPopupTimestamp >= 1 * 60 * 1000;
        }

        // Open the modal initially if the user hasn't submitted the form
        if (!hasUserSubmittedForm() && shouldShowModal()) {
            showModal();
            localStorage.setItem('lastPopupTimestamp', new Date().getTime());
        }
        // Set interval to open the modal every 2 minutes if the user hasn't submitted the form
        setInterval(function () {
            if (!hasUserSubmittedForm()) {
                showModal();
                localStorage.setItem('lastPopupTimestamp', new Date().getTime());
            }
        }, 1 * 60 * 1000);
    </script>
    <script type="text/javascript">
        $(function () {
            $("#pop_start_date").datepicker({
                uiLibrary: 'bootstrap5',
                autoclose: true,
                startDate: new Date()
            }).on('changeDate', function (e) {
                $(this).focus();
            });
            $("#pop_end_date").datepicker({
                uiLibrary: 'bootstrap5',
                autoclose: true,
                startDate: new Date()
            }).on('changeDate', function (e) {
                $(this).focus();
            });
        });

        if ($("#pop-query-form").length > 0) {
            $("#pop-query-form").validate({
                errorClass: 'is-invalid',
                errorPlacement: function (label, element) {
                    label.insertAfter(element.parent());
                },
                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },

                    phone: {
                        required: true,
                        minlength: 10,
                    },
                    email: {
                        required: true,
                        maxlength: 50,
                        email: true,
                    },
                },
                messages: {

                    name: {
                        required: "Please enter name",
                        maxlength: "Your last name maxlength should be 50 characters long."
                    },
                    phone: {
                        required: "Please enter contact number",
                        minlength: "The contact number should be 10 digits",
                        digits: "Please enter only numbers",
                        maxlength: "The contact number should be 12 digits",
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter valid email",
                        maxlength: "The email name should less than or equal to 50 characters",
                    },

                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#pop-submit-btn').html('Sending..');
                    $('#pop-submit-btn').attr('disabled', 'disabled');
                    $.ajax({
                        url: '{{route('site.submit-plan')}}',
                        type: "POST",
                        data: $('#pop-query-form').serialize(),
                        success: function (response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your request was submitted successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    $('#pop-submit-btn').attr('disabled', false);
                                    $('#pop-submit-btn').html('Submit Details');
                                    document.cookie = 'formSubmitted=true; expires=Thu, 01 Jan 2099 00:00:00 UTC; path=/';
                                    document.getElementById("pop-query-form").reset();
                                    hideModal();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something went wrong. Please try again later',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    $('#pop-submit-btn').attr('disabled', false);
                                    $('#pop-submit-btn').html('Submit Details');
                                    document.getElementById("pop-query-form").reset();
                                });
                            }
                        }
                    });
                }
            })
        }
    </script>
@endpush
