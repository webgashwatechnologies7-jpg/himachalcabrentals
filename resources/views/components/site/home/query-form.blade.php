@push('styles')
    <style>
        .bg-theme-cus {
            background-color: #264653 !important;
        }
    </style>
@endpush
<div class="form-main">
    <div class="section-shape top-0" style="background-image: url({{asset('images/shape-pat.png')}});"></div>
    <div class="container">
        <div class="row align-items-center form-content rounded position-relative ms-5 me-5">
            <div class="col-lg-2 p-0">
                <h4 class="form-title form-title1 text-center p-4 py-10 white bg-theme-cus mb-0 rounded-start d-lg-flex align-items-center">
                    <i class="icon-location-pin fs-1 me-1"></i> Find Your Holidays</h4>
            </div>
            <div class="col-lg-10 px-4">
                <form action="javascript:void(0)" id="query_form" method="post">
                    <x-honeypot/>
                    <div class="form-content-in d-lg-flex align-items-center mt-2">
                        <div class="form-group me-2">
                            <div class="d-flex align-items-baseline">
                                <button style="padding: 13px; width: 38px;"><i class="fa fa-user-circle"></i>
                                </button>
                                <input type="text" name="name" placeholder="Name" class="form-control"
                                       style="border-radius: 0;" required>
                            </div>
                        </div>
                        <div class="form-group me-2">
                            <div class="d-flex align-items-baseline">
                                <button style="padding: 13px; width: 38px;"><i class="fa fa-phone"></i>
                                </button>
                                <input type="text" name="phone" placeholder="Phone" class="form-control"
                                       style="border-radius: 0;" required>
                            </div>
                        </div>
                        <div class="form-group me-2">
                            <div class="d-flex align-items-baseline">
                                <button style="padding: 13px; width: 38px;"><i class="fa fa-envelope"></i>
                                </button>
                                <input type="text" name="email" placeholder="Email" class="form-control"
                                       style="border-radius: 0;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-content-in d-lg-flex align-items-center mt-1">
                        <div class="form-group me-2">
                            <div class="d-flex align-items-baseline">
                                <button style="padding: 13px; width: 38px;"><i class="fa fa-users"></i>
                                </button>
                                <input type="number" name="count" placeholder="Travellers" style="border-radius: 0;">
                            </div>
                        </div>
                        <div class="form-group me-2">
                            <div class="d-flex align-items-baseline">
                                <button style="padding: 13px; width: 38px;"><i class="fa fa-calendar"></i>
                                </button>
                                <input type="text" name="start_date" placeholder="Start Date" id="cp_start_date"
                                       style="border-radius: 0;"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group me-2">
                            <div class="d-flex align-items-baseline">
                                <button style="padding: 13px; width: 38px;"><i class="fa fa-calendar"></i>
                                </button>
                                <input type="text" name="end_date" placeholder="End Date" id="cp_end_date"
                                       style="border-radius: 0;"
                                       autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-content-in d-lg-flex align-items-center mt-1">
                        <div class="form-group mb-0 text-center">
                            <button type="submit" class="nir-btn w-100" id="submit-query"><i
                                    class="fa fa-send mr-2"></i> Make An Enquiry
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function () {
            $("#cp_start_date").datepicker({
                uiLibrary: 'bootstrap5',
                autoclose: true,
                startDate: new Date(),
                format: 'dd-mm-yyyy'
            }).on('changeDate', function (e) {
                $(this).focus();
            });

            $("#cp_end_date").datepicker({
                uiLibrary: 'bootstrap5',
                autoclose: true,
                startDate: new Date(),
                format: 'dd-mm-yyyy'
            }).on('changeDate', function (e) {
                $(this).focus();
            });
        });

        if ($("#query_form").length > 0) {
            $("#query_form").validate({
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
                    $('#submit-query').html('Sending..');
                    $('#submit-query').attr('disabled', 'disabled');
                    $.ajax({
                        url: '{{route('site.submit-query')}}',
                        type: "POST",
                        data: $('#query_form').serialize(),
                        success: function (response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your request was submitted successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    $('#submit-query').attr('disabled', false);
                                    $('#submit-query').html('<i class="fa fa-send mr-2"></i>' + ' ' + 'Make An Enquiry');
                                    document.getElementById("query_form").reset();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something went wrong. Please try again later',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    $('#submit-query').attr('disabled', false);
                                    $('#submit-query').html('<i class="fa fa-send mr-2"></i>' + ' ' + 'Make An Enquiry');
                                    document.getElementById("query_form").reset();
                                });
                            }
                        }
                    });
                }
            })
        }
    </script>
@endpush


