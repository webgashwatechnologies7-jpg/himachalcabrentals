@push('styles')
    <style>
        .bg-image {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .form-group label {
            font-weight: 700 !important;
        }
    </style>
@endpush
<div class="modal fade" id="holiday-plan" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="holiday-plan-heading">Holiday Planner</h5>
                <button type="button" class="btn-close" onclick="closeHolidayPlanner()"></button>
            </div>
            <div class="modal-body bg-image" style="background: url('{{asset('images/shape4.png')}}')">
                <form action="javascript:void(0)" id="submit_plan_form" method="post">
                    <div class="row">
                        <x-honeypot/>
                        <div class="col-md-3 col-sm-3">
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
                        <div class="col-md-3 col-sm-3">
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
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group mb-2">
                                <label>Start Date</label>
                                <div class="d-flex align-items-baseline">
                                    <button style="padding: 13px; width: 38px;" class="btn-fix"><i
                                            class="fa fa-calendar"></i>
                                    </button>
                                    <input id="t_start_date" type="text" name="start_date"
                                           class="form-control" style="border-radius: 0;"
                                           placeholder="Start Date"
                                           required
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group mb-2">
                                <label>End Date</label>
                                <div class="d-flex align-items-baseline">
                                    <button style="padding: 13px; width: 38px;" class="btn-fix"><i
                                            class="fa fa-calendar"></i>
                                    </button>
                                    <input id="t_end_date" type="text" name="end_date"
                                           class="form-control" style="border-radius: 0;"
                                           placeholder="End Date"
                                           required
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
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
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group mb-2">
                                <label>Pick Up Location</label>
                                <div class="d-flex align-items-baseline">
                                    <input type="text" name="pick_up" class="form-control"
                                           style="border-radius: 0;" placeholder="Pick Up" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group mb-2">
                                <label>Drop Location</label>
                                <div class="d-flex align-items-baseline">
                                    <input type="text" name="drop" class="form-control"
                                           style="border-radius: 0;" placeholder="Drop" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label>Additional Requirements</label>
                                <div class="input-box">
                                                    <textarea class="form-control" name="description"
                                                              placeholder="Additional Requirements"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="nir-btn white mt-2" id="plan-submit-btn">Submit Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        let bottomNav = document.getElementById("bottomNav");
        let holidayPlanModal = document.getElementById('holiday-plan');
        const holidayModal = new bootstrap.Modal(holidayPlanModal, {
            backdrop: 'static',
        });

        function openHolidayPlanner() {
            holidayModal.show();
            bottomNav.style.visibility = "hidden";
            $('#responsive-menu').slicknav('close');
        }

        function closeHolidayPlanner() {
            holidayModal.hide();
            bottomNav.style.visibility = "visible";
        }

        $(function () {
            $("#t_start_date").datepicker({
                uiLibrary: 'bootstrap5',
                autoclose: true,
                startDate: new Date()
            }).on('changeDate', function (e) {
                $(this).focus();
            });
            $("#t_end_date").datepicker({
                uiLibrary: 'bootstrap5',
                autoclose: true,
                startDate: new Date()
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
                    $('#plan-submit-btn').html('Sending..');
                    $('#plan-submit-btn').attr('disabled', 'disabled');
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
                                    $('#plan-submit-btn').attr('disabled', false);
                                    $('#plan-submit-btn').html('Submit Details');
                                    document.getElementById("submit_plan_form").reset();
                                    closeHolidayPlanner();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something went wrong. Please try again later',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    $('#plan-submit-btn').attr('disabled', false);
                                    $('#plan-submit-btn').html('Submit Details');
                                    document.getElementById("submit_plan_form").reset();
                                });
                            }
                        }
                    });
                }
            })
        }
    </script>
@endpush


