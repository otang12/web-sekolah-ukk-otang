

<?php $__env->startSection('title', $jurusan->exists ? 'Edit Jurusan' : 'Tambah Jurusan'); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($jurusan->exists ? 'Edit Jurusan' : 'Tambah Jurusan'); ?></h1>

    <form class="admin-form"
          action="<?php echo e($jurusan->exists ? route('admin.jurusan.update', $jurusan) : route('admin.jurusan.store')); ?>"
          method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if($jurusan->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama" value="<?php echo e(old('nama', $jurusan->nama)); ?>" required>
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
            <label>Singkatan</label>
            <input type="text" name="singkatan" value="<?php echo e(old('singkatan', $jurusan->singkatan)); ?>" placeholder="Contoh: RPL">
            <?php $__errorArgs = ['singkatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Deskripsi Singkat</label>
            <textarea name="deskripsi"><?php echo e(old('deskripsi', $jurusan->deskripsi)); ?></textarea>
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
            <label>Deskripsi Lengkap (halaman detail jurusan)</label>
            <textarea name="deskripsi_panjang" style="min-height:160px"><?php echo e(old('deskripsi_panjang', $jurusan->deskripsi_panjang)); ?></textarea>
            <?php $__errorArgs = ['deskripsi_panjang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Mata Pelajaran Keahlian (halaman detail jurusan)</label>
            <p style="font-size:12px; color:#6b7280; margin-bottom:10px;">
                Daftar mata pelajaran yang tampil di bagian "Mata Pelajaran Keahlian". Kosongkan semua baris kalau tidak ingin bagian ini muncul di halaman.
            </p>

            <div id="mapel-wrap">
                <?php
                    $mapelLama = old('mata_pelajaran', $jurusan->mata_pelajaran ?? []);
                    if (empty($mapelLama)) {
                        $mapelLama = [['nama' => '', 'deskripsi' => '']];
                    }
                ?>

                <?php $__currentLoopData = $mapelLama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $mapel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mapel-row" style="display:flex; gap:10px; margin-bottom:10px; align-items:flex-start;">
                        <div style="flex:1 1 220px;">
                            <input type="text"
                                   name="mata_pelajaran[<?php echo e($i); ?>][nama]"
                                   value="<?php echo e($mapel['nama'] ?? ''); ?>"
                                   placeholder="Nama mata pelajaran, contoh: Pemrograman Dasar">
                        </div>
                        <div style="flex:2 1 320px;">
                            <input type="text"
                                   name="mata_pelajaran[<?php echo e($i); ?>][deskripsi]"
                                   value="<?php echo e($mapel['deskripsi'] ?? ''); ?>"
                                   placeholder="Deskripsi singkat (opsional)">
                        </div>
                        <button type="button" class="btn-cancel mapel-remove"
                                style="border:none; background:none; color:#dc2626; cursor:pointer; padding:8px 4px;">
                            Hapus
                        </button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <button type="button" id="mapel-add" class="btn-cancel" style="margin-top:4px;">
                + Tambah Mata Pelajaran
            </button>

            <?php $__errorArgs = ['mata_pelajaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['mata_pelajaran.*.nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Nama Kepala Jurusan</label>
            <input type="text" name="kepala_nama" value="<?php echo e(old('kepala_nama', $jurusan->kepala_nama)); ?>">
            <?php $__errorArgs = ['kepala_nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Logo Jurusan</label>
            <?php if($jurusan->logo): ?>
                <div class="current-photo">
                    <img src="<?php echo e(asset('storage/' . $jurusan->logo)); ?>" alt="Logo saat ini">
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
            <label>Foto Kepala Jurusan</label>
            <?php if($jurusan->kepala_foto): ?>
                <div class="current-photo">
                    <img src="<?php echo e(asset('storage/' . $jurusan->kepala_foto)); ?>" alt="Foto kepala jurusan saat ini">
                </div>
            <?php endif; ?>
            <input type="file" name="kepala_foto" accept="image/*">
            <?php $__errorArgs = ['kepala_foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="error-text"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Foto Kegiatan (Kolase di halaman Profil &amp; Jurusan)</label>

            <?php if($jurusan->exists && $jurusan->fotos && $jurusan->fotos->count()): ?>
                <div class="foto-kegiatan-grid" style="display:flex; flex-wrap:wrap; gap:12px; margin-bottom:14px;">
                    <?php $__currentLoopData = $jurusan->fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="foto-kegiatan-item" style="position:relative; width:110px;">
                            <img src="<?php echo e(asset('storage/' . $foto->file)); ?>"
                                 alt="Foto kegiatan"
                                 style="width:110px; height:110px; object-fit:cover; border-radius:8px; display:block;">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <p style="font-size:13px; color:#6b7280; margin-bottom:14px;">
                    Untuk menghapus salah satu foto di atas, gunakan tombol hapus pada tabel di bawah setelah menyimpan halaman ini, atau hubungi saya jika ingin tombol hapus langsung di sini.
                </p>
            <?php endif; ?>

            <input type="file" name="fotos[]" accept="image/*" multiple>
            <p style="font-size:12px; color:#6b7280; margin-top:6px;">
                Bisa pilih beberapa foto sekaligus (tahan Ctrl saat memilih file). Foto baru akan ditambahkan, bukan menggantikan foto lama.
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
            <a href="<?php echo e(route('admin.jurusan.index')); ?>" class="btn-cancel">Batal</a>
        </div>
    </form>

    <?php if($jurusan->exists && $jurusan->fotos && $jurusan->fotos->count()): ?>
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
                    <?php $__currentLoopData = $jurusan->fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="padding:8px; border-bottom:1px solid #f1f5f9;">
                                <img src="<?php echo e(asset('storage/' . $foto->file)); ?>" alt="Foto kegiatan"
                                     style="width:70px; height:70px; object-fit:cover; border-radius:6px;">
                            </td>
                            <td style="padding:8px; border-bottom:1px solid #f1f5f9;">
                                <form action="<?php echo e(route('admin.jurusan.foto.destroy', $foto)); ?>" method="POST"
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const wrap = document.getElementById('mapel-wrap');
            const addBtn = document.getElementById('mapel-add');
            let index = wrap.querySelectorAll('.mapel-row').length;

            function buatBaris() {
                const row = document.createElement('div');
                row.className = 'mapel-row';
                row.style.cssText = 'display:flex; gap:10px; margin-bottom:10px; align-items:flex-start;';
                row.innerHTML = `
                    <div style="flex:1 1 220px;">
                        <input type="text" name="mata_pelajaran[${index}][nama]" placeholder="Nama mata pelajaran, contoh: Pemrograman Dasar">
                    </div>
                    <div style="flex:2 1 320px;">
                        <input type="text" name="mata_pelajaran[${index}][deskripsi]" placeholder="Deskripsi singkat (opsional)">
                    </div>
                    <button type="button" class="btn-cancel mapel-remove" style="border:none; background:none; color:#dc2626; cursor:pointer; padding:8px 4px;">
                        Hapus
                    </button>
                `;
                wrap.appendChild(row);
                index++;
            }

            addBtn.addEventListener('click', buatBaris);

            wrap.addEventListener('click', function (e) {
                if (e.target.classList.contains('mapel-remove')) {
                    const rows = wrap.querySelectorAll('.mapel-row');
                    if (rows.length > 1) {
                        e.target.closest('.mapel-row').remove();
                    } else {
                        // Baris terakhir: kosongkan saja isinya, jangan dihapus semua.
                        e.target.closest('.mapel-row').querySelectorAll('input').forEach(function (input) {
                            input.value = '';
                        });
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/admin/jurusan/form.blade.php ENDPATH**/ ?>