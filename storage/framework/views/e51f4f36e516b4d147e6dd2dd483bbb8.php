

<?php $__env->startSection('title', $guru->exists ? 'Edit Guru' : 'Tambah Guru'); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($guru->exists ? 'Edit Guru' : 'Tambah Guru'); ?></h1>

    <form class="admin-form"
          action="<?php echo e($guru->exists ? route('admin.guru.update', $guru) : route('admin.guru.store')); ?>"
          method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if($guru->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo e(old('nama', $guru->nama)); ?>" required>
            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="<?php echo e(old('jabatan', $guru->jabatan)); ?>">
            <?php $__errorArgs = ['jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Urutan Tampil</label>
            <input type="number" name="urutan" value="<?php echo e(old('urutan', $guru->urutan)); ?>">
            <?php $__errorArgs = ['urutan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <?php if($guru->foto): ?>
                <div class="current-photo">
                    <img src="<?php echo e(asset('storage/' . $guru->foto)); ?>" alt="Foto saat ini">
                </div>
            <?php endif; ?>
            <input type="file" name="foto" accept="image/*">
            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">Simpan</button>
            <a href="<?php echo e(route('admin.guru.index')); ?>" class="btn-cancel">Batal</a>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/admin/guru/form.blade.php ENDPATH**/ ?>