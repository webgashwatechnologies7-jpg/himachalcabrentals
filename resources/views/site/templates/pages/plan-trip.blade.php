<x-site-layout>
    @push('styles')
        <style>
            .btn-fix {
                width: 40px;
            }

            .btn-fix i {
                max-width: 20px;
            }

            .plan-trip-form {
                border: 1px solid #f1f1f1;
                padding: 10px;
            }

            .is-invalid {
                font-size: 12px;
                color: #ea0909;
                font-weight: normal !important;
            }

            .f-title {
                color: #dc3545 !important;
            }
            .form-group label{
                font-size: 12px;
                font-weight: 600;
            }
            .input-container {
                position: relative;
                width: 100%;
            }

            .input-container .icon {
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: #999;
                font-size: 0.8rem;
                color: #F56960;
            }

            .input-container input {
                padding-left: 30px;
            }
            .input-container select {
                padding-left: 25px;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$title"/>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <h3 class="pb-2 my-4 text-center theme">Tour Plan & Requirements</h3>
                <div class="col-lg-8 mb-4 ms-auto me-auto">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="customer-information mb-4">

                                <form class="plan-trip-form" action="javascript:void(0)" id="submit_plan_form"
                                      method="post">
                                    <x-honeypot/>
                                    <div class="row">
                                        <h5 class="py-2 f-title">1. Travel Inputs</h5>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Where to Go?</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-geo-alt-fill"></i>
                                                    <input type="text" name="location" class="form-control"
                                                           style="border-radius: 0;" placeholder="Destination" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Select a Cab</label>
                                                <div class="input-container">
                                                    <i class="icon bx bx-car"></i>
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
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Pick Up Location</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-geo-alt-fill"></i>
                                                    <input type="text" name="pick_up" class="form-control"
                                                           style="border-radius: 0;" placeholder="Pick Up" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Drop Location</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-geo-alt-fill"></i>
                                                    <input type="text" name="drop" class="form-control"
                                                           style="border-radius: 0;" placeholder="Drop" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <label>Start Date</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-calendar"></i>
                                                    <input id="t_start_date" type="text" name="start_date"
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
                                                <div class="input-container">
                                                    <i class="icon bi bi-calendar"></i>
                                                    <input id="t_end_date" type="text" name="end_date"
                                                           class="form-control" style="border-radius: 0;"
                                                           placeholder="End Date"
                                                           required
                                                           autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <label>Adults</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-person-circle"></i>
                                                    <input type="text" name="adults"
                                                           class="form-control" style="border-radius: 0;"
                                                           placeholder="Adults"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mb-2">
                                                <label>Kids</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-person-plus"></i>
                                                    <input type="text" name="kids" class="form-control"
                                                           style="border-radius: 0;"
                                                           placeholder="Kids"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Travel Description</label>
                                                <div class="input-box">
                                                    <textarea class="form-control" name="description"
                                                              placeholder="Travel Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <h5 class="py-2 f-title">2. Personal Information</h5>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Name</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-person-fill"></i>
                                                    <input type="text" name="name" class="form-control"
                                                           style="border-radius: 0;"
                                                           placeholder="Name"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Email</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-envelope-fill"></i>
                                                    <input type="email" name="email" class="form-control"
                                                           style="border-radius: 0;"
                                                           placeholder="Email"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Phone</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-phone-fill"></i>
                                                    <input type="text" name="phone" class="form-control"
                                                           style="border-radius: 0;"
                                                           placeholder="Phone"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label>Your City</label>
                                                <div class="input-container">
                                                    <i class="icon bi bi-markdown-fill"></i>
                                                    <input type="text" name="city" class="form-control"
                                                           style="border-radius: 0;"
                                                           placeholder="Your City"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-5">
                                            <button type="submit" class="btn btn-dark float-lg-end w-100"
                                                    id="submit-plan">
                                                SUBMIT YOUR PLAN <i
                                                    class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="col-lg-4 mb-2">--}}
                {{--                    <x-site.page-sidebar/>--}}
                {{--                </div>--}}
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $(document).ready(function () {

                $(function () {
                    $("#t_start_date").datepicker({
                        uiLibrary: 'bootstrap5',
                        autoclose: true,
                        startDate: new Date(),
                        format: 'dd-mm-yyyy'
                    }).on('changeDate', function (e) {
                        $(this).focus();
                    });

                    $("#t_end_date").datepicker({
                        uiLibrary: 'bootstrap5',
                        autoclose: true,
                        startDate: new Date(),
                        format: 'dd-mm-yyyy'
                    }).on('changeDate', function (e) {
                        $(this).focus();
                    });
                });

                if ($("#submit_plan_form").length > 0) {
                    $("#submit_plan_form").validate({
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
                            $('#submit-plan').html('Sending..');
                            $('#submit-plan').attr('disabled', 'disabled');
                            $.ajax({
                                url: '{{route('site.submit-plan')}}',
                                type: "POST",
                                data: $('#submit_plan_form').serialize(),
                                success: function (response) {
                                    if (response.status == true) {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: 'Your request was submitted successfully!',
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            $('#submit-plan').attr('disabled', false);
                                            $('#submit-plan').html('SUBMIT YOUR PLAN' + ' ' + '<i class="fa fa-arrow-right"></i>');
                                            document.getElementById("submit_plan_form").reset();
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Something went wrong. Please try again later',
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            $('#submit-plan').attr('disabled', false);
                                            $('#submit-plan').html('SUBMIT YOUR PLAN' + ' ' + '<i class="fa fa-arrow-right"></i>');
                                            document.getElementById("submit_plan_form").reset();
                                        });
                                    }
                                }
                            });
                        }
                    })
                }
            })
        </script>
    @endpush
</x-site-layout>
