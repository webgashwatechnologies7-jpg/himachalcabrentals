<section class="call-to-action pb-0 bg-lgrey border-t">
    <div class="container">
        <div class="section-title text-center w-75 mx-auto mb-5 px-5">
            <h2 class="mb-2">Do You Have Any <span class="theme">Questions?</span></h2>
            <p class="mb-0">As opposed to using 'Content here, content here', making it look like readable English.
                Many desktop publishing packages and web page editors now use Lorem Ipsum</p>
        </div>
        <div class="reservation-main">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="{{$image}}" alt="destination"
                         class="rounded">
                </div>
                <div class="col-lg-6 mb-4">
                    <form action="javascript:void(0)" id="contact_query_form" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group mb-2">
                                    <label>Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group mb-2">
                                    <label>Phone No.</label>
                                    <input type="text" id="phone" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group mb-2">
                                    <label>Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-2">
                                    <label>Message</label>
                                    <textarea name="message" placeholder="Type your message here..."
                                              class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="comment-btn text-center">
                            <button type="submit" class="nir-btn" id="contact-submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        if ($("#contact_query_form").length > 0) {
            $("#contact_query_form").validate({
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
                    $('#contact-submit').html('Sending..');
                    $('#contact-submit').attr('disabled', 'disabled');
                    $.ajax({
                        url: '{{route('site.submit-contact')}}',
                        type: "POST",
                        data: $('#contact_query_form').serialize(),
                        success: function (response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your request was submitted successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    $('#contact-submit').attr('disabled', false);
                                    $('#contact-submit').html('Send Message');
                                    document.getElementById("contact_query_form").reset();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something went wrong. Please try again later',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    $('#contact-submit').attr('disabled', false);
                                    $('#contact-submit').html('Send Message');
                                    document.getElementById("contact_query_form").reset();
                                });
                            }
                        }
                    });
                }
            })
        }
    </script>
@endpush
