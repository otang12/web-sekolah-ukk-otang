

<?php $__env->startSection('title', 'Kelola Galeri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="admin-page-head">
        <h1>Kelola Galeri</h1>
        <a href="<?php echo e(route('admin.galeri.create')); ?>" class="btn-add">+ Tambah Foto</a>
    </div>

    <?php if(session('status')): ?>
        <div class="alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Caption</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><img src="<?php echo e(asset('storage/' . $photo->file)); ?>" class="admin-table__thumb" alt="Galeri"></td>
                    <td><?php echo e($photo->caption); ?></td>
                    <td><?php echo e($photo->urutan); ?></td>
                    <td class="admin-table__actions">
                        <a href="<?php echo e(route('admin.galeri.edit', $photo)); ?>" class="btn-edit">Edit</a>
                        <form action="<?php echo e(route('admin.galeri.destroy', $photo)); ?>" method="POST" onsubmit="return confirm('Yakin hapus foto ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4">Belum ada foto.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/admin/galeri/index.blade.php ENDPATH**/ ?>