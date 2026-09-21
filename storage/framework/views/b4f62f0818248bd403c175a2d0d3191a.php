

<?php $__env->startSection('title', 'Kelola Guru'); ?>

<?php $__env->startSection('content'); ?>
    <div class="admin-page-head">
        <h1>Kelola Guru &amp; Staf</h1>
        <a href="<?php echo e(route('admin.guru.create')); ?>" class="btn-add">+ Tambah Guru</a>
    </div>

    <?php if(session('status')): ?>
        <div class="alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php if($guru->foto): ?>
                            <img src="<?php echo e(asset('storage/' . $guru->foto)); ?>" class="admin-table__thumb" alt="<?php echo e($guru->nama); ?>">
                        <?php else: ?>
                            <span class="admin-table__no-photo">-</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($guru->nama); ?></td>
                    <td><?php echo e($guru->jabatan); ?></td>
                    <td><?php echo e($guru->urutan); ?></td>
                    <td class="admin-table__actions">
                        <a href="<?php echo e(route('admin.guru.edit', $guru)); ?>" class="btn-edit">Edit</a>
                        <form action="<?php echo e(route('admin.guru.destroy', $guru)); ?>" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5">Belum ada data guru.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/admin/guru/index.blade.php ENDPATH**/ ?>