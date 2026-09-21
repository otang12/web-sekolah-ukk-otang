

<?php $__env->startSection('title', $ekskul->exists ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler'); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($ekskul->exists ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler'); ?></h1>

    <form class="admin-form"
          action="<?php echo e($ekskul->exists ? route('admin.ekstrakurikuler.update', $ekskul) : route('admin.ekstrakurikuler.store')); ?>"
          method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if($ekskul->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo e(old('nama', $ekskul->nama)); ?>" required>
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
            <label>Deskripsi</label>
            <textarea name="deskripsi"><?php echo e(old('deskripsi', $ekskul->deskripsi)); ?></textarea>
            <?php $__errorArgs = ['deskripsi'];
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
            <input type="number" name="urutan" value="<?php echo e(old('urutan', $ekskul->urutan)); ?>">
            <?php $__errorArgs = ['urutan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <h2 style="font-size:16px; margin:28px 0 14px; padding-top:14px; border-top:1px solid #e5e7eb;">Info Kegiatan</h2>

        <div class="form-group">
            <label>Hari Latihan</label>
            <input type="text" name="jadwal_hari" value="<?php echo e(old('jadwal_hari', $ekskul->jadwal_hari)); ?>" placeholder="Contoh: Setiap Sabtu">
            <?php $__errorArgs = ['jadwal_hari'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Waktu</label>
            <input type="text" name="jadwal_waktu" value="<?php echo e(old('jadwal_waktu', $ekskul->jadwal_waktu)); ?>" placeholder="Contoh: Pukul 14.00 - 16.30 WIB">
            <?php $__errorArgs = ['jadwal_waktu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="jadwal_lokasi" value="<?php echo e(old('jadwal_lokasi', $ekskul->jadwal_lokasi)); ?>" placeholder="Contoh: Lapangan SMK N 1 Cijati">
            <?php $__errorArgs = ['jadwal_lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <h2 style="font-size:16px; margin:28px 0 14px; padding-top:14px; border-top:1px solid #e5e7eb;">Guru Pembina</h2>

        <div class="form-group">
            <label>Nama Pembina</label>
            <input type="text" name="pembina_nama" value="<?php echo e(old('pembina_nama', $ekskul->pembina_nama)); ?>">
            <?php $__errorArgs = ['pembina_nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Jabatan Pembina</label>
            <input type="text" name="pembina_jabatan" value="<?php echo e(old('pembina_jabatan', $ekskul->pembina_jabatan)); ?>" placeholder="Contoh: Guru Pembina Ekstrakurikuler">
            <?php $__errorArgs = ['pembina_jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Foto Pembina</label>
            <?php if($ekskul->pembina_foto): ?>
                <div class="current-photo">
                    <img src="<?php echo e(asset('storage/' . $ekskul->pembina_foto)); ?>" alt="Foto pembina saat ini">
                </div>
            <?php endif; ?>
            <input type="file" name="pembina_foto" accept="image/*">
            <?php $__errorArgs = ['pembina_foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Sambutan Pembina</label>
            <textarea name="pembina_sambutan"><?php echo e(old('pembina_sambutan', $ekskul->pembina_sambutan)); ?></textarea>
            <?php $__errorArgs = ['pembina_sambutan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <h2 style="font-size:16px; margin:28px 0 14px; padding-top:14px; border-top:1px solid #e5e7eb;">Logo &amp; Foto Kegiatan</h2>

        <div class="form-group">
            <label>Logo</label>
            <?php if($ekskul->logo): ?>
                <div class="current-photo">
                    <img src="<?php echo e(asset('storage/' . $ekskul->logo)); ?>" alt="Logo saat ini">
                </div>
            <?php endif; ?>
            <input type="file" name="logo" accept="image/*">
            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Foto Kegiatan (ditampilkan di halaman Ekstrakurikuler)</label>

            <?php if($ekskul->exists && $ekskul->fotos && $ekskul->fotos->count()): ?>
                <div style="display:flex; flex-wrap:wrap; gap:12px; margin-bottom:14px;">
                    <?php $__currentLoopData = $ekskul->fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset('storage/' . $foto->file)); ?>"
                             alt="Foto kegiatan"
                             style="width:110px; height:110px; object-fit:cover; border-radius:8px;">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <input type="file" name="fotos[]" accept="image/*" multiple>
            <p style="font-size:12px; color:#6b7280; margin-top:6px;">
                Bisa pilih beberapa foto sekaligus. Foto baru akan ditambahkan, bukan menggantikan foto lama.
            </p>
            <?php $__errorArgs = ['fotos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['fotos.*'];
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
            <a href="<?php echo e(route('admin.ekstrakurikuler.index')); ?>" class="btn-cancel">Batal</a>
        </div>
    </form>

    <?php if($ekskul->exists && $ekskul->fotos && $ekskul->fotos->count()): ?>
        <div class="admin-form" style="margin-top:24px;">
            <h2 style="font-size:16px; margin-bottom:12px;">Kelola Foto Kegiatan</h2>
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #e5e7eb;">Foto</th>
                        <th style="text-align:left; padding:8px; border-bottom:1px solid #e5e7eb;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $ekskul->fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="padding:8px; border-bottom:1px solid #f1f5f9;">
                                <img src="<?php echo e(asset('storage/' . $foto->file)); ?>" alt="Foto kegiatan"
                                     style="width:70px; height:70px; object-fit:cover; border-radius:6px;">
                            </td>
                            <td style="padding:8px; border-bottom:1px solid #f1f5f9;">
                                <form action="<?php echo e(route('admin.ekstrakurikuler.foto.destroy', $foto)); ?>" method="POST"
                                      onsubmit="return confirm('Hapus foto ini?');">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn-cancel" style="color:#dc2626; border:none; background:none; cursor:pointer; padding:0;">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/admin/ekstrakurikuler/form.blade.php ENDPATH**/ ?>