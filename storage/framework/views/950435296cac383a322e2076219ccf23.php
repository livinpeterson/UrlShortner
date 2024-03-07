<?php $__env->startSection('content'); ?>

    <div class="container">

        <h3 align="center" class="mt-5">Shorten Link</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="GET" action="<?php echo e(route('shortlink.edit', $edit->id)); ?>">
                <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Link</label>
                            <input type="text" class="form-control" name="emp_name" value="<?php echo e($edit->link); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>

                </form>
            </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('css'); ?>
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Documents/Mashup/Laravel/shortlink/resources/views/pages/edit.blade.php ENDPATH**/ ?>