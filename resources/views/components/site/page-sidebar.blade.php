<div>
    <div class="border p-4 text-center mb-2">
        <h5 class="theme">CUSTOMER SUPPORT</h5>
        <span class="fa fa-headphones" style="color: #000; font-size: 5rem;"></span>
        <p class="lead fw-bold"><a class="theme"
                                   href="tel:{{setting('contact.contact_phone')}}">+91-{{setting('contact.contact_phone')}}</a>
        </p>
        <p>Just Dial Us !</p>
        <p>Our Experts Will Support You.</p>
    </div>
    <div class="border p-4 text-center">
        <h5 class="theme">EXPERT'S CALLBACK</h5>
        <p>Just Leave Your Callback Number</p>
        <form action="javascript:void(0)" id="submit_call_form"
              method="post">
            <x-honeypot />
            <div class="d-flex justify-content-center p-2">
                <input class="form-control" type="tel" name="phone" placeholder="Your Phone Number"
                       style="border-radius: 0" required/>
                <button type="submit" style="width: 50px" class="bg-theme text-white"><i
                        class="fa fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
</div>
@push('scripts')
    <script>
        if ($("#submit_call_form").length > 0) {
            $("#submit_call_form").validate({
                errorClass: 'is-invalid',
                errorPlacement: function (label, element) {
                    label.insertAfter(element.parent());
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{route('site.submit-call')}}',
                        type: "POST",
                        data: $('#submit_call_form').serialize(),
                        success: function (response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your request was submitted successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    document.getElementById("submit_call_form").reset();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something went wrong. Please try again later',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    document.getElementById("submit_call_form").reset();
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endpush


