

<?php $__env->startSection('title', 'Kelola Jurusan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="admin-page-head">
        <h1>Kelola Jurusan</h1>
        <a href="<?php echo e(route('admin.jurusan.create')); ?>" class="btn-add">+ Tambah Jurusan</a>
    </div>

    <?php if(session('status')): ?>
        <div class="alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Nama</th>
                <th>Singkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $jurusans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php if($j->logo): ?>
                            <img src="<?php echo e(asset('storage/' . $j->logo)); ?>" class="admin-table__thumb" alt="<?php echo e($j->nama); ?>">
                        <?php else: ?>
                            <span class="admin-table__no-photo">-</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($j->nama); ?></td>
                    <td><?php echo e($j->singkatan); ?></td>
                    <td class="admin-table__actions">
                        <a href="<?php echo e(route('admin.jurusan.edit', $j)); ?>" class="btn-edit">Edit</a>
                        <form action="<?php echo e(route('admin.jurusan.destroy', $j)); ?>" method="POST" onsubmit="return confirm('Yakin hapus jurusan ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4">Belum ada data jurusan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/admin/jurusan/index.blade.php ENDPATH**/ ?>