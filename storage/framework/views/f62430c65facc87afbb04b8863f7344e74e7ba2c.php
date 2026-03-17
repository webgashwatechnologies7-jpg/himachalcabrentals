<?php $__env->startPush('styles'); ?>
    <style>
        label.is-invalid {
            font-size: 0.8rem;
            color: red;
            margin-left: 5px;
        }
    </style>
<?php $__env->stopPush(); ?>
<aside class="package-widget-style-2 widget-form mt-30">
    <div class="widget-title text-center">
        <h4>MAKE A BOOKING</h4>
    </div>
    <div class="widget-body">
        <form action="javascript:void(0)" id="p_query_form" method="post">
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
            <div class="booking-form-wrapper">
                <div class="custom-input-group">
                    <i class="bi bi-person-circle"></i>
                    <input type="text" placeholder="Name" name="name" required>
                </div>
                <div class="custom-input-group">
                    <i class="bi bi-envelope-fill"></i>
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="custom-input-group">
                    <i class="bi bi-telephone-fill"></i>
                    <input type="tel" placeholder="Phone" name="phone" required>
                </div>
                <div class="custom-input-group">
                    <i class="bi bi-chevron-down"></i>
                    <select id="ticket_type" name="cabs" required>
                        <option selected>--Select Cab--</option>
                        <?php $__currentLoopData = $cabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cab->title); ?>"><?php echo e($cab->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="custom-input-group">
                            <i class="bi bi-people-fill"></i>
                            <input type="text" placeholder="Adults" name="adults" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="custom-input-group ">
                            <i class="bi bi-person-fill"></i>
                            <input type="text" placeholder="Kids" name="kids">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="custom-input-group">
                            <i class="bi bi-calendar3"></i>
                            <input placeholder="Start Date" type="text" name="start_date"
                                   id="t_start_date" class="calendar input-date-picker" autocomplete="off"
                                   required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="custom-input-group">
                            <i class="bi bi-calendar3"></i>
                            <input placeholder="End Date" type="text" name="end_date"
                                   id="t_end_date" class="calendar input-date-picker" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="custom-input-group">
                    <i class="bi bi-geo-alt-fill"></i>
                    <input type="text" placeholder="Pick Up Location" name="pick_up" required>
                </div>
                <div class="custom-input-group">
                    <i class="bi bi-geo-alt-fill"></i>
                    <input type="text" placeholder="Drop Location" name="drop" required>
                </div>
                <div class="custom-input-group">
                                            <textarea cols="20" rows="7"
                                                      placeholder="Additional Requirements"
                                                      name="description"></textarea>
                </div>
                <input type="hidden" name="package_id" value="<?php echo e($tour); ?>">
                <div class="custom-input-group">
                    <div class="submite-btn">
                        <button type="submit" id="submit-pack">SEND QUERY</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</aside>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            if ($("#p_query_form").length > 0) {
                $("#p_query_form").validate({
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
                        $('#submit-pack').html('Sending..');
                        $('#submit-pack').attr('disabled', 'disabled');
                        $.ajax({
                            url: '<?php echo e(route('site.submit-package')); ?>',
                            type: "POST",
                            data: $('#p_query_form').serialize(),
                            success: function (response) {
                                if (response.status == true) {
                                    Swal.fire({
                                        title: 'Success!',
                                        text: 'Your request was submitted successfully!',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        $('#submit-pack').attr('disabled', false);
                                        $('#submit-pack').html('SEND QUERY');
                                        document.getElementById("p_query_form").reset();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Something went wrong. Please try again later',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        $('#submit-pack').attr('disabled', false);
                                        $('#submit-pack').html('SEND QUERY');
                                        document.getElementById("p_query_form").reset();
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

<?php /**PATH C:\wamp64\www\new laravel project\himachalcabrentals.com\resources\views/components/site/tour-booking-form.blade.php ENDPATH**/ ?>