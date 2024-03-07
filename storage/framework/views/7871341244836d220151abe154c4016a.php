<?php $__env->startSection('content'); ?>
        <div class='container mt-5'>

            <h1>Generate Shorten Link</h1>

            <?php if(session('success')): ?>
            <div class='alert alert-success'><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <div class='card'>
                <div class="card-header">
                    <form method="POST" action="<?php echo e(route('shortlink.post')); ?>">

                        <?php echo csrf_field(); ?>

                        <div class="input-group mb-3">
                            <input type="text" name="link" class="form-control" placeholder="Enter URl">
                            <div class="input-group-addon">
                                <button class="btn btn-success">Generate Shorten Link</button>
                            </div>
                        </div>
                        <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="m-0 p-0 text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </form>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Short Link</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $shortLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($row->id); ?> </td>
                        <td><a href="<?php echo e(route('shorten.link', $row->code)); ?>" target="_blank"><?php echo e($row->code); ?></a>
                            <?php echo e(route('shorten.link', $row->code)); ?>

                        </td>
                        <td> <?php echo e($row->link); ?> </td>
                        <td scope="col">

                            <a href="<?php echo e(route('shortlink.edit', $row->id)); ?>">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>

                            <form action="<?php echo e(route('shortlink.destroy', $row->id)); ?>" method="POST" style ="display:inline">
                             <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Documents/Mashup/Laravel/shortlink/resources/views/pages/shortenlink.blade.php ENDPATH**/ ?>