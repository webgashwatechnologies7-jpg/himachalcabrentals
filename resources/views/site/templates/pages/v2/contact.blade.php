<x-site-layout>
    @push('styles')
        <style>
            .custom-input-group label.is-invalid {
                color: red;
                font-size: 13px;
                margin-left: 5px;
            }
        </style>
    @endpush
    <x-site.breadcrumb :title="$title"/>
    <div class="contact-wrapper pt-100">
        <div class="container">
            <div class="row align-items-center justify-content-lg-center gy-5">
                <div class="col-lg-6">
                    <div class="contatc-intro-figure">
                        <img src="{{asset('images/banner/contact-bg.png')}}" alt class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-info">
                        <h3>Contact Info.</h3>
                        <ul>
                            <li>
                                <h6>Let’s Talk</h6>
                                <a href="tel:{{setting('contact.contact_phone')}}">+91-{{setting('contact.contact_phone')}}</a>
                                <a href="tel:{{setting('contact.contact_alt_phone')}}">+91-{{setting('contact.contact_alt_phone')}}</a>
                            </li>
                            <li>
                                <h6>Write to Us.</h6>
                                <a href="javascript:void(0);">{{setting('contact.contact_email')}}</a>
                            </li>
                            <li>
                                <h6>Loacation.</h6>
                                <a href="javascript:void(0);">{{setting('contact.contact_address')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-120">
            <form action="javascript:void(0)" id="contact_query_form" method="post">
                <div class="contact-form-wrap">
                    <h4>Get in touch now</h4>
                    <p>Your details are safe with us. Required fields are marked *</p>
                    <x-honeypot/>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="custom-input-group">
                                <label for="name">Name</label>
                                <input type="text" placeholder="Your name" id="name" name="name"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="custom-input-group">
                                <label for="email">Email</label>
                                <input type="email" placeholder="Your Email" id="email" name="email"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="custom-input-group">
                                <label for="phone">Phone</label>
                                <input type="text" placeholder="Your Phone" id="phone" name="phone"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="custom-input-group">
                            <textarea cols="20" rows="7" placeholder="Your message" name="message" class="form-control"
                                      required></textarea>
                    </div>
                    <div class="custom-input-group">
                        <div class="submite-btn">
                            <button type="submit" id="contact-submit" id="contact-submit">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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


