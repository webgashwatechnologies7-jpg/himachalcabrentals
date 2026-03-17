<?php if (isset($component)) { $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311 = $component; } ?>
<?php $component = App\View\Components\SiteLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SiteLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startPush('styles'); ?>
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
    <?php $__env->stopPush(); ?>
    <?php if (isset($component)) { $__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a = $component; } ?>
<?php $component = App\View\Components\Site\Breadcrumb::resolve(['title' => $title] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('site.breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Site\Breadcrumb::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a)): ?>
<?php $component = $__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a; ?>
<?php unset($__componentOriginaladbfccfbd399fc7411c8a41eefbbb00fced58b8a); ?>
<?php endif; ?>
    <section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 ms-auto me-auto">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="customer-information mb-4">
                                <h3 class="border-b py-2 my-2 text-center">Booking Information</h3>
                                <form class="mb-2" action="javascript:void(0)" id="submit_cab_form" method="post">
                                    <?php if (isset($component)) { $__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12 = $component; } ?>
<?php $component = Spatie\Honeypot\View\HoneypotComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('honeypot'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Spatie\Honeypot\View\HoneypotComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12)): ?>
<?php $component = $__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12; ?>
<?php unset($__componentOriginaldf87789cc88ceba56df455ed3fa4c184628bdc12); ?>
<?php endif; ?>
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
    <?php $__env->startPush('scripts'); ?>
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
                    window.location.href = '<?php echo e(url('/')); ?>';
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
                                url: '<?php echo e(route('site.submit-cab')); ?>',
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
                                            window.location.href = '<?php echo e(url('/')); ?>';
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
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311)): ?>
<?php $component = $__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311; ?>
<?php unset($__componentOriginal060ba1f57f99c8c33dc0afb221de7a92839c0311); ?>
<?php endif; ?>

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/site/templates/pages/cab-booking.blade.php ENDPATH**/ ?>