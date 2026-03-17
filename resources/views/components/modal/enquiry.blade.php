<div class="modal fade" id="packQueryModal" tabindex="-1" style="z-index: 9999">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--primary); border-radius: 0;">
                <h5 class="modal-title text-white">Package Inquiry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeQueryForm()"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="pack_query_form" method="post">
                    <p class="mb-2">Tour: <span id="packTitle"></span></p>
                    <x-honeypot/>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <button style="padding: 13px; width: 38px;"><i class="fa fa-calendar"></i>
                                    </button>
                                    <input type="text" class="form-control" placeholder="Travel Date"
                                           style="border-radius: 0;" name="start_date" id="pack_start_date"
                                           autocomplete="off"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <button style="padding: 13px; width: 38px;"><i class="fa fa-calendar"></i>
                                    </button>
                                    <input type="text" class="form-control" placeholder="Return Date"
                                           style="border-radius: 0;" name="end_date" id="pack_end_date"
                                           autocomplete="off"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" style="border-radius: 0;"
                                           placeholder="Adults" name="adults"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" style="border-radius: 0;"
                                           placeholder="Kids" name="kids"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <div class="d-flex align-items-baseline">
                                    <select name="cabs" class="form-select form-control"
                                            style="border-radius: 0;" required>
                                        <option value="">-- Select a Cab--</option>
                                        @foreach(get_cabs_list() as $cab)
                                            <option value="{{$cab->title}}">{{$cab->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" placeholder="Pick Up Location"
                                           style="border-radius: 0;" name="pick_up" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" placeholder="Drop Location"
                                           style="border-radius: 0;" name="drop" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2 d-none">
                                <textarea class="form-control" placeholder="Additional Requirements"
                                          name="description"></textarea>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" placeholder="Name"
                                           style="border-radius: 0;" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" placeholder="Phone"
                                           style="border-radius: 0;" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <div class="d-flex align-items-center">
                                    <input type="email" class="form-control" placeholder="Email"
                                           style="border-radius: 0;" name="email" required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="packId" name="package_id">
                        <hr class="my-1">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="nir-btn-black" id="m-submit-pack">Submit Plan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $("#pack_start_date").datepicker({
                uiLibrary: 'bootstrap5',
                autoclose: true,
                startDate: new Date(),
                format: 'dd-mm-yyyy'
            }).on('changeDate', function (e) {
                $(this).focus();
            });
            $("#pack_end_date").datepicker({
                uiLibrary: 'bootstrap5',
                autoclose: true,
                startDate: new Date(),
                format: 'dd-mm-yyyy'
            }).on('changeDate', function (e) {
                $(this).focus();
            });
        });

        let packQueryModal = document.getElementById('packQueryModal');
        const modal = new bootstrap.Modal(packQueryModal, {
            backdrop: 'static',
        });

        function packageEnquiry(pack_id, pack_title) {
            let packTitle = document.getElementById('packTitle');
            let packId = document.getElementById('packId');
            let openModal = bootstrap.Modal.getOrCreateInstance(packQueryModal);
            packTitle.innerHTML = pack_title;
            packId.value = pack_id;
            openModal.show();
        }

        function closeQueryForm() {
            document.getElementById("pack_query_form").reset();
        }

        function closeModalQuery() {
            let closeModal = bootstrap.Modal.getOrCreateInstance(packQueryModal);
            closeModal.hide();
        }

        if ($("#pack_query_form").length > 0) {
            $("#pack_query_form").validate({
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
                    $('#m-submit-pack').html('Sending..');
                    $('#m-submit-pack').attr('disabled', 'disabled');
                    $.ajax({
                        url: '{{route('site.submit-package')}}',
                        type: "POST",
                        data: $('#pack_query_form').serialize(),
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
                                    $('#m-submit-pack').attr('disabled', false);
                                    $('#m-submit-pack').html('SEND QUERY');
                                    document.getElementById("pack_query_form").reset();
                                    closeModalQuery();
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
                                    $('#m-submit-pack').attr('disabled', false);
                                    $('#m-submit-pack').html('SEND QUERY');
                                    document.getElementById("pack_query_form").reset();
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endpush
