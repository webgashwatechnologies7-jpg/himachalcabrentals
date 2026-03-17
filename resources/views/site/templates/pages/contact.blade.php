<x-site-layout>
    <x-site.breadcrumb :title="$title"/>
    <section class="contact-main pt-6 pb-60">
        <div class="container">
            <div class="contact-info-main mt-0">
                <div class="row">
                    <div class="col-lg-10 col-offset-lg-1 mx-auto">
                        <div class="contact-info bg-white">
                            <div class="contact-info-title text-center mb-4 px-5">
                                <h3 class="mb-1">{{$page->headLine}}</h3>
                                <p class="mb-0">{{$page->tagLine}}</p>
                            </div>
                            <div class="contact-info-content row mb-1">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-map-marker theme"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Office Location</h3>
                                            <p class="m-0">{{setting('contact.contact_address')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-phone theme"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Phone Number</h3>
                                            <p class="m-0">+91-{{setting('contact.contact_phone')}}</p>
                                            <p class="m-0">+91-{{setting('contact.contact_alt_phone')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="info-item bg-lgrey px-4 py-5 border-all text-center rounded">
                                        <div class="info-icon mb-2">
                                            <i class="fa fa-envelope theme"></i>
                                        </div>
                                        <div class="info-content ps-4">
                                            <h3>Email Address</h3>
                                            <p class="m-0">{{setting('contact.contact_email')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="contact-form1" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="map rounded overflow-hiddenb rounded mb-md-4">
                                            <div style="width: 100%">
                                                <iframe height="500"
                                                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(solan)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="contactform-error-msg"></div>
                                        <form action="javascript:void(0)" id="contact_query_form" method="post">
                                            <x-honeypot />
                                            <div class="form-group mb-2">
                                                <input type="text" name="name" class="form-control" id="name"
                                                       placeholder="Name">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="email" name="email" class="form-control" id="email"
                                                       placeholder="Email">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                       placeholder="Phone">
                                            </div>
                                            <div class="textarea mb-2">
                                                <textarea name="message" placeholder="Enter a message"
                                                          class="form-control" required></textarea>
                                            </div>
                                            <div class="comment-btn text-center">
                                                <button type="submit" class="nir-btn" id="contact-submit">Send Message
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
</x-site-layout>
