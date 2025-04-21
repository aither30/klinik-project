<div class="m-6">
    <div>
        <a href="<?php echo Yii::app()->createUrl('dashboard/adminDashboard'); ?>" class="flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H6M6 11l4-4M6 11l4 4"></path>
            </svg>
            Kembali
        </a>

        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Detail Pembayaran</h2>

    </div>

    <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200 mb-6">
        <p class="text-gray-700 mb-2">
            <span class="font-semibold text-blue-600">Status Pembayaran:</span>
            <?php
            $status = $payment->status;
            $badgeClass = '';
            $label = '';

            switch ($status) {
                case 'successful':
                    $badgeClass = 'bg-green-100 text-green-800';
                    $label = 'Sudah Dibayar';
                    break;
                case 'waiting_cash':
                case 'pending':
                    $badgeClass = 'bg-yellow-100 text-yellow-800';
                    $label = 'Menunggu Uang Tunai';
                    break;
                case 'unselected':
                default:
                    $badgeClass = 'bg-gray-200 text-gray-700';
                    $label = 'Belum Memilih Metode Pembayaran';
                    break;
            }
            ?>

            <span class="inline-block px-3 py-1 rounded-full font-medium <?php echo $badgeClass; ?>">
                <?php echo $label; ?>
            </span>

        </p>
        <p class="text-gray-700">
            <span class="font-semibold text-blue-600">Total Pembayaran:</span>
            <span class="text-lg font-bold text-gray-900">
                <?php echo number_format($payment->total_amount, 0, ',', '.'); ?> IDR
            </span>
        </p>

        <div class="mt-2">
            <?php if (empty($payment->method_payment)): ?>
                <form method="post" action="<?php echo Yii::app()->createUrl('dashboard/processPayment'); ?>">
                    <input type="hidden" name="payment_id" value="<?php echo $payment->id; ?>">

                    <label for="method" class="block mb-2 font-semibold text-gray-700">Pilih Metode Pembayaran:</label>
                    <select name="method" id="method" required class="mb-4 p-2 border rounded w-full">
                        <option value="" disabled selected>-- Pilih --</option>
                        <option value="cash">Cash</option>
                    </select>

                    <button type="submit"
                        class="bg-green-600 text-white font-semibold px-6 py-2 rounded-xl shadow hover:bg-green-700 transition">
                        Lakukan Pembayaran
                    </button>
                </form>
            <?php else: ?>
                <p class="text-green-600 font-semibold">Metode pembayaran sudah dipilih: <?php echo ucfirst($payment->method_payment); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($payment->status === 'waiting_cash'): ?>
            <form method="post" action="<?php echo Yii::app()->createUrl('dashboard/confirmCash'); ?>" class="inline">
                <input type="hidden" name="payment_id" value="<?php echo $payment->id; ?>">
                <button type="submit"
                    class="ml-2 bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                    Konfirmasi Cash Diterima
                </button>
            </form>
        <?php endif; ?>
    </div>



    <h3 class="text-lg font-semibold text-gray-800 mb-3">Rincian Obat</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-blue-50 text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-2 text-left border-b text-blue-600">Nama Obat</th>
                    <th class="px-4 py-2 text-left border-b text-blue-600">Harga Satuan</th>
                    <th class="px-4 py-2 text-left border-b text-blue-600">Jumlah</th>
                    <th class="px-4 py-2 text-left border-b text-blue-600">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grandTotal = 0;
                foreach ($medicinesData as $med):
                    $grandTotal += $med['subtotal'];
                ?>
                    <tr>
                        <td class="px-4 py-2 border-b"><?php echo CHtml::encode($med['name']); ?></td>
                        <td class="px-4 py-2 border-b"><?php echo number_format($med['price'], 0, ',', '.'); ?> IDR</td>
                        <td class="px-4 py-2 border-b"><?php echo $med['quantity']; ?></td>
                        <td class="px-4 py-2 border-b"><?php echo number_format($med['subtotal'], 0, ',', '.'); ?> IDR</td>
                    </tr>
                <?php endforeach; ?>
                <tr class="bg-gray-100 font-semibold text-gray-800">
                    <td colspan="3" class="px-4 py-2 border-t text-right">Total</td>
                    <td class="px-4 py-2 border-t"><?php echo number_format($grandTotal, 0, ',', '.'); ?> IDR</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>