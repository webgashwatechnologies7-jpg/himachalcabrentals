<x-site-layout>
    @push('styles')
        <style>
            .form-group label{
                font-size: 13px;
                color: #716e6e;
            }
            .is-invalid{
                color: red !important;
            }
            .bg-theme{
                color: #dc3545 !important;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$title"/>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 ms-auto me-auto">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="customer-information mb-4">
                                <h3 class="border-b py-2 my-2 text-center">Booking Information</h3>
                                <form class="mb-2" action="javascript:void(0)" id="submit_cab_form" method="post">
                                    <x-honeypot/>
                                    <div style="display: none;" id="cab-book-info">
                                        <div
                                            class="bg-success mb-4 d-flex align-items-center p-3 justify-content-center text-white">
                                            <i class="bx bx-check-circle fs-1 p-1"></i>
                                            <div class="customer-info ps-2">
                                                <small id="cab-info-text"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border my-2 px-2 pb-2">
                                        <h5 class="p-3 bg-theme">1. Travel Details</h5>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Destination</label>
                                                <input type="text" name="location" class="form-control"
                                                       placeholder="Destination" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Trip Type</label>
                                                <div class="input-box">
                                                    <select class="form-select form-control" name="type">
                                                        <option value="ONE_WAY">One Way</option>
                                                        <option value="ROUND_TRIP">Round Trip</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <label>Travel Date</label>
                                                <div class="input-box">
                                                    <input id="c_start_date" type="text" name="start_date"
                                                           class="form-control" placeholder="Travel Date"
                                                           required
                                                           autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <label>Return Date</label>
                                                <div class="input-box">
                                                    <input id="c_end_date" type="text" name="end_date"
                                                           placeholder="Return Date"
                                                           class="form-control"
                                                           autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Pick Up Location</label>
                                                <input type="text" name="pick_up" class="form-control"
                                                       placeholder="Pick Up" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Drop Location</label>
                                                <input type="text" name="drop" class="form-control" placeholder="Drop"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <label>Adults</label>
                                                <div class="input-box">
                                                    <input id="date-range" type="text" name="adults"
                                                           class="form-control" placeholder="Adults" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <label>Kids</label>
                                                <div class="input-box">
                                                    <input id="date-range" type="text" name="kids" placeholder="Kids"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border my-2 px-2">
                                        <h5 class="p-3 bg-theme">2. Personal Details</h5>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Name</label>
                                                <input class="form-control" type="text" placeholder="Name" name="name"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Phone</label>
                                                <input class="form-control" type="text" placeholder="Phone No."
                                                       name="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Email</label>
                                                <input class="form-control" type="email" placeholder="Email Address"
                                                       name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Additional Requirements</label>
                                                <textarea class="form-control"
                                                          placeholder="Additional Requirements"
                                                          name="description" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="cab_id" id="cab_id_f">
                                        <div class="col-md-12 col-sm-12 my-2">
                                            <button class="btn btn-dark float-lg-end w-100 p-2" id="submit-cab">SEND
                                                QUERY <i
                                                    class="bx bx-right-arrow-circle"></i></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $(document).ready(function () {
                let infoText = $("#cab-info-text");
                let cab = localStorage.getItem("BOOK_CAB");
                if (cab != null) {
                    let cabObject = JSON.parse(cab);
                    let infoText = `You have selected <b>${cabObject.title} (${cabObject.seats} seater)</b>.`
                    $("#cab-info-text").html(infoText);
                    $("#cab-book-info").show();
                    $("#cab_id_f").val(cabObject.id);
                    return;
                } else {
                    window.location.href = '{{url('/')}}';
                }
            });
        </script>
        <script>
            $(document).ready(function () {
                $(function () {
                    $("#c_start_date").datepicker({
                        uiLibrary: 'bootstrap5',
                        autoclose: true,
                        startDate: new Date(),
                        format: 'dd-mm-yyyy'
                    }).on('changeDate', function (e) {
                        $(this).focus();
                    });

                    $("#c_end_date").datepicker({
                        uiLibrary: 'bootstrap5',
                        autoclose: true,
                        startDate: new Date(),
                        format: 'dd-mm-yyyy'
                    }).on('changeDate', function (e) {
                        $(this).focus();
                    });
                });

                if ($("#submit_cab_form").length > 0) {
                    $("#submit_cab_form").validate({
                        errorClass: 'is-invalid',
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
                            $('#submit-cab').html('Sending..');
                            $('#submit-cab').attr('disabled', 'disabled');
                            $.ajax({
                                url: '{{route('site.submit-cab')}}',
                                type: "POST",
                                data: $('#submit_cab_form').serialize(),
                                success: function (response) {
                                    if (response.status == true) {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: 'Your request was submitted successfully!',
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            $('#submit-cab').attr('disabled', false);
                                            $('#submit-cab').html('SEND QUERY' + ' ' + '<i class="bx bx-right-arrow-circle"></i>');
                                            document.getElementById("submit_cab_form").reset();
                                            window.location.href = '{{url('/')}}';
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Something went wrong. Please try again later',
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            $('#submit-cab').attr('disabled', false);
                                            $('#submit-cab').html('SEND QUERY' + ' ' + '<i class="bx bx-right-arrow-circle"></i>');
                                            document.getElementById("submit_cab_form").reset();
                                        });
                                    }
                                }
                            });
                        }
                    })
                }
            });
        </script>
    @endpush
</x-site-layout>


