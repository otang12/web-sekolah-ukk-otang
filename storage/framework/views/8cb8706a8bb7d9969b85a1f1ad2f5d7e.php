

<?php $__env->startSection('title', 'Kelola Berita'); ?>

<?php $__env->startSection('content'); ?>
    <div class="admin-page-head">
        <h1>Kelola Berita</h1>
        <a href="<?php echo e(route('admin.news.create')); ?>" class="btn-add">+ Tambah Berita</a>
    </div>

    <?php if(session('status')): ?>
        <div class="alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php if($n->image): ?>
                            <img src="<?php echo e(asset('storage/' . $n->image)); ?>" class="admin-table__thumb" alt="<?php echo e($n->title); ?>">
                        <?php else: ?>
                            <span class="admin-table__no-photo">-</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($n->title); ?></td>
                    <td><?php echo e($n->category); ?></td>
                    <td><?php echo e($n->published_at?->format('d M Y') ?? '-'); ?></td>
                    <td class="admin-table__actions">
                        <a href="<?php echo e(route('admin.news.edit', $n)); ?>" class="btn-edit">Edit</a>
                        <form action="<?php echo e(route('admin.news.destroy', $n)); ?>" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5">Belum ada berita.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\profile-sekolah-dhani-12rpl1\resources\views/admin/news/index.blade.php ENDPATH**/ ?>