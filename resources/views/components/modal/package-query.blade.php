<div id="lc_Modal" class="pop-modal">
    <div class="pop-modal-content">
        <div class="pop-modal-header">
            <h4 class="heading">Tour Package Inquiry</h4>
            <span class="pop-close">&times;</span>
        </div>
        <div class="pop-modal-body">
            <form id="msform">
                <b id="lc_packTitle"></b>
                <div>
                    <ul id="progressbar">
                        <li id="personal" class="active"><strong>Personal Info</strong></li>
                        <li id="travel"><strong>Travel Info</strong></li>
                        <li id="finish"><strong>Finish</strong></li>
                    </ul>
                </div>
                <fieldset>
                    <div class="form-card">
                        <div class="input-container">
                            <i class="icon bx bx-user-circle"></i>
                            <input type="text" name="name" placeholder="Full Name" required/>
                        </div>
                        <div class="input-container">
                            <i class="icon bx bx-phone-call"></i>
                            <input type="tel" name="phone" placeholder="Phone Number" required/>
                        </div>
                        <div class="input-container">
                            <i class="icon bx bx-envelope"></i>
                            <input type="email" name="email" placeholder="Email" required/>
                        </div>
                        <div class="input-container">
                            <i class="icon bx bx-user-plus"></i>
                            <input type="text" name="adults" placeholder="Adults" required/>
                        </div>
                        <div class="input-container">
                            <i class="icon bx bx-user-check"></i>
                            <input type="text" name="kids" placeholder="Kids" required/>
                        </div>
                    </div>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <div class="form-card">
                        <div class="input-container">
                            <i class="icon bx bx-location-plus"></i>
                            <input type="text" name="pick_up" placeholder="Pick Up Location" required/>
                        </div>
                        <div class="input-container">
                            <i class="icon bx bx-location-plus"></i>
                            <input type="text" name="drop" placeholder="Drop Location" required/>
                        </div>
                        <div class="input-container">
                            <i class="icon bx bx-calendar-alt"></i>
                            <input class="input-date-picker" type="text" name="start_date" placeholder="Start Date"
                                   autocomplete="off" required/>
                        </div>
                        <div class="input-container">
                            <i class="icon bx bx-calendar-alt"></i>
                            <input class="input-date-picker" type="text" name="end_date" placeholder="End Date"
                                   autocomplete="off" required/>
                        </div>
                        <div class="input-container">
                            <i class="icon bx bx-notepad" style="top:23%"></i>
                            <textarea name="description" placeholder="Additional Requirements" rows="3"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="package_id" value="" id="lc_packId"/>
                    <input type="button" name="next" class="submit action-button" value="Finish" id="m-submit-pack"/>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        let modal = document.getElementById("lc_Modal");
        let close = document.getElementsByClassName("pop-close")[0];
        let current_fs, next_fs;
        let opacity;
        let current = 1;
        let form = $("#msform");

        function packageEnquiry(pack_id, pack_title) {
            let packTitle = document.getElementById('lc_packTitle');
            let packId = document.getElementById('lc_packId');
            packTitle.innerHTML = pack_title;
            packId.value = pack_id;
            modal.style.display = "block";
        }

        close.onclick = function () {
            closeQueryModal()
        }

        function closeQueryModal() {
            modal.style.display = "none";
            form[0].reset();
            resetSteps(current);
        }

        function resetSteps() {
            $("fieldset").removeAttr("style");
        }

        $(".next").click(function () {
            form.validate({
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
            });
            if (form.valid() != true) {
                return;
            }
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.animate({opacity: 0}, {
                step: function (now) {
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 500
            });
        });

        $(".submit").click(function () {
            form.validate({
                errorClass: 'is-invalid',
                errorPlacement: function (label, element) {
                    label.insertAfter(element.parent());
                }
            });

            if (form.valid() != true) {
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#m-submit-pack').val('Sending..');
            $('#m-submit-pack').attr('disabled', 'disabled');
            $.ajax({
                url: '{{route('site.submit-package')}}',
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    if (response.status == true) {
                        Swal.fire({
                            customClass: {
                                container: 'm-alert'
                            },
                            title: 'Success!',
                            text: 'Your request was submitted successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            $('#m-submit-pack').removeAttr('disabled', 'disabled');
                            $('#m-submit-pack').val('Submit');
                            form[0].reset();
                            closeQueryModal();
                        });
                    } else {
                        Swal.fire({
                            customClass: {
                                container: 'm-alert'
                            },
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            $('#m-submit-pack').removeAttr('disabled', 'disabled');
                            $('#m-submit-pack').html('Submit');
                            form[0].reset();
                            closeQueryModal();
                        });
                    }
                }
            });
        })
    </script>
@endpush



