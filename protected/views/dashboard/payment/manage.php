<div class="m-6 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Daftar Pembayaran</h1>
   

    <?php if (empty($payments)): ?>
        <a href="<?php echo $this->createUrl('dashboard/checkPayment'); ?>" class="btn btn-primary">
            generate pembayaran
</a>
    <?php else: ?>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Pasien</th>
                    <th class="py-2 px-4 border-b">Resep ID</th>
                    <th class="py-2 px-4 border-b">Total Pembayaran</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td class="py-2 px-4 border-b"><?php echo CHtml::encode($payment->prescription->visit->patient->name); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo $payment->prescription->id; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo number_format($payment->total_amount, 0, ',', '.'); ?> IDR</td>
                        <td class="py-2 px-4 border-b"><?php echo CHtml::encode($payment->status); ?></td>
                        <td class="py-2 px-4 border-b">
                            <!-- Tombol untuk memeriksa pembayaran -->
                            <a href="<?php echo $this->createUrl('dashboard/showPayment', ['prescriptionId' => $payment->prescription_id]); ?>" 
                               class="text-blue-500 hover:text-blue-700">
                                Cek Pembayaran
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
