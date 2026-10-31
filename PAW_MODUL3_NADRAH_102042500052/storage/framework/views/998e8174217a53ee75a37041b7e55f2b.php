<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Daftar Peminjaman</h2>
            <p class="text-muted mb-0">Kelola transaksi peminjaman dan pengembalian buku.</p>
        </div>
        <a href="<?php echo e(route('peminjaman.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Tambah Peminjaman
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-3" style="width: 50px;">No</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th class="text-center">Status</th>
                            <th class="text-end pe-3" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
                        

                        <?php $__empty_1 = true; $__currentLoopData = $peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-3">
                                    <?php echo e($peminjaman->firstItem() + $index); ?>

                                </td>

                                <td>
                                    <?php echo e($item->anggota->nama ?? 'Anggota tidak tersedia'); ?>

                                </td>

                                <td>
                                    <?php echo e($item->buku->judul ?? 'Buku tidak tersedia'); ?>

                                </td>

                                <td>
                                    <?php echo e($item->tanggal_pinjam); ?>

                                </td>

                                <td>
                                    <?php echo e($item->tanggal_kembali ?? 'Belum dikembalikan'); ?>

                                </td>

                                <td class="text-center">
                                    <?php if($item->status === 'Dipinjam'): ?>
                                        <span class="badge bg-warning text-dark">
                                            Dipinjam
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-success">
                                            <?php echo e($item->status); ?>

                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-end pe-3">
                                    <div class="d-flex justify-content-end gap-1 flex-wrap">
                                        <a href="<?php echo e(route('peminjaman.show', $item->id)); ?>" class="btn btn-info btn-sm">
                                            Detail
                                        </a>

                                        <?php if($item->status === 'Dipinjam'): ?>
                                            <form action="<?php echo e(route('peminjaman.kembali', $item->id)); ?>" method="POST"
                                                onsubmit="return confirm('Proses pengembalian buku ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>

                                                <button type="submit" class="btn btn-success btn-sm">
                                                    Kembalikan
                                                </button>
                                            </form>
                                        <?php endif; ?>

                                        <form action="<?php echo e(route('peminjaman.destroy', $item->id)); ?>" method="POST"
                                            onsubmit="return confirm('Hapus catatan peminjaman ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada data peminjaman buku.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($peminjaman->hasPages()): ?>
            <div class="card-footer bg-white py-3">
                <?php echo e($peminjaman->links('pagination::bootstrap-5')); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Atha\Documents\PAW\wEEK7\Sistem_Peminjaman_Buku\Sistem_Peminjaman_Buku\resources\views/peminjaman/index.blade.php ENDPATH**/ ?>