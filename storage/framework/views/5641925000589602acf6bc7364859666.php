

<?php $__env->startSection('title', 'Kelola Ekstrakurikuler'); ?>

<?php $__env->startSection('content'); ?>
    <div class="admin-page-head">
        <h1>Kelola Ekstrakurikuler</h1>
        <a href="<?php echo e(route('admin.ekstrakurikuler.create')); ?>" class="btn-add">+ Tambah Ekstrakurikuler</a>
    </div>

    <?php if(session('status')): ?>
        <div class="alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Nama</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $ekskuls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php if($e->logo): ?>
                            <img src="<?php echo e(asset('storage/' . $e->logo)); ?>" class="admin-table__thumb" alt="<?php echo e($e->nama); ?>">
                        <?php else: ?>
                            <span class="admin-table__no-photo">-</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($e->nama); ?></td>
                    <td><?php echo e($e->urutan); ?></td>
                    <td class="admin-table__actions">
                        <a href="<?php echo e(route('admin.ekstrakurikuler.edit', $e)); ?>" class="btn-edit">Edit</a>
                        <form action="<?php echo e(route('admin.ekstrakurikuler.destroy', $e)); ?>" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4">Belum ada data ekstrakurikuler.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/admin/ekstrakurikuler/index.blade.php ENDPATH**/ ?>