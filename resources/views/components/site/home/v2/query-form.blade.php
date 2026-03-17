@push('styles')
    <style>
        .newslatter-wrapper .achievement-counter-side .achievement-box-style-one {
            min-height: auto;
        }
    </style>
@endpush
<div class="newslatter-wrapper mt-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="newslatter-side text-center text-lg-start mx-4 mx-md-auto mx-lg-0">
                    <h2>Quick Query</h2>
                    <form action="javascript:void(0)" id="query_form" method="post">
                        <x-honeypot/>
                        <div class="newslatter-form-input">
                            <input type="text" name="name" placeholder="Name" required>
                            <button type="button" class="newslatter-submit"><i class="bx bx-user"></i></button>
                        </div>
                        <div class="newslatter-form-input">
                            <input type="text" name="email" placeholder="Email" required>
                            <button type="button" class="newslatter-submit"><i class="bx bx-envelope"></i></button>
                        </div>
                        <div class="newslatter-form-input">
                            <input type="text" name="phone" placeholder="Phone" required>
                            <button type="button" class="newslatter-submit"><i class="bx bx-phone"></i></button>
                        </div>
                        <div class="newslatter-form-input">
                            <input type="text" name="count" placeholder="Travellers">
                            <button type="button" class="newslatter-submit"><i class="bx bx-user-plus"></i></button>
                        </div>
                        <div class="newslatter-form-input">
                            <input type="text" name="start_date" placeholder="Start Date" class="input-date-picker"
                                   autocomplete="off">
                            <button type="button" class="newslatter-submit"><i class="bx bx-calendar"></i></button>
                        </div>
                        <div class="newslatter-form-input">
                            <input type="text" name="end_date" placeholder="End Date" class="input-date-picker"
                                   autocomplete="off">
                            <button type="button" class="newslatter-submit"><i class="bx bx-calendar"></i></button>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-dark w-100 p-3" id="submit-query">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <x-site.home.feature :section="null"/>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
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
                                    $('#submit-query').html('SUBMIT');
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
                                    $('#submit-query').html('SUBMIT' + '<i class="fa fa-arrow-right ms-2"></i>');
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


