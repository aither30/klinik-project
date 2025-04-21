<?php
/* @var $this SiteController */
/* @var $model User */
$userRole = Yii::app()->user->role;
$this->pageTitle = Yii::app()->name . ' - Admin Dashboard';
?>



<div class="h-full">
    <div class="flex w-full h-full ">
        <div id="adminAside" class="hidden w-64 h-[calc(100vh-4.2rem)] bg-white border-2 border-blue-500 absolute top-[4.2rem] shadow-lg">
            <div class="w-full">

            <div class="p-2 w-full ">
        <h3 class="text-xl font-bold text-white bg-blue-500 p-2 mb-2 rounded-md">Kelola Klinik</h3>

    <div class="bg-white border border-blue-500 rounded-md shadow p-2">
        <ul class="space-y-2 text-base text-gray-800">

    
         <!-- Menu Kelola Staf (Admin saja yang bisa mengakses) -->
    <?php if ($userRole == 'admin'): ?>
        <li class="bg-blue-500 text-white rounded-lg p-4">
            <button class="toggle-options w-full text-left font-semibold text-white transition" data-target="staff-options">
                Kelola Staf
            </button>
            <div class="dynamic-options hidden mt-2 ml-2">
                <div class="flex flex-col space-y-1">
                    <a href="<?php echo Yii::app()->createUrl('dashboard/staffManage'); ?>" class="load-content">Lihat Daftar Staf</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!-- Menu Kelola Pasien (Admin, Dokter, Staf Pendaftaran bisa mengakses) -->
    <?php if ($userRole == 'admin' || $userRole == 'dokter' || $userRole == 'staf_pendaftaran'): ?>
        <li class="bg-blue-500 text-white rounded-lg p-4">
            <button class="toggle-options w-full text-left font-semibold text-white transition" data-target="patient-options">
                Kelola Pasien
            </button>
            <div class="dynamic-options hidden mt-2 ml-2">
                <div class="flex flex-col space-y-1">
                    <a href="<?php echo Yii::app()->createUrl('dashboard/patientManage'); ?>" class="load-content">Lihat Daftar Pasien</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!-- Menu Kelola Pembayaran (Admin dan Kasir saja yang bisa mengakses) -->
    <?php if ($userRole == 'admin' || $userRole == 'kasir'): ?>
        <li class="bg-blue-500 text-white rounded-lg p-4">
            <button class="toggle-options w-full text-left font-semibold text-white transition" data-target="payment-options">
                Kelola Pembayaran
            </button>
            <div class="dynamic-options hidden mt-2 ml-2">
                <div class="flex flex-col space-y-1">
                    <a href="<?php echo Yii::app()->createUrl('dashboard/paymentManage'); ?>" class="load-content">Lihat Daftar Pembayaran</a>
                </div>
            </div>
        </li>
    <?php endif; ?>
            
        </ul>
    </div>
</div>





            <div class="p-4 bg-blue-500 absolute bottom-0 left-0 w-full text-white font-semibold flex items-center ">
            <?php if ($model && !empty($model->image)): ?>
    <img src="<?php echo Yii::app()->baseUrl . '/uploads/' . CHtml::encode($model->image); ?>" 
         alt="User Image" class="w-8 h-8 object-cover rounded-full inline-block mr-2">
<?php endif; ?>

            <div>
            <p><?php echo CHtml::encode($model->username); ?></p>
            <p class="text-sm"><?php echo CHtml::encode($model->email); ?></p>

            </div>
            </div>
            </div>
        </div>

        <div id="contentDashboard" class="flex-grow p-4 m-2 rounded-lg h-full  bg-blue-500">
        <div class="flex items-center   p-2 shadow-md rounded-r-full">
    <div id="btnOpen">
    <div onclick="btnAside()" class="cursor-pointer text-white rounded-full p-2 transition transform rotate-[-90deg]">
    <i class="fa-regular fa-window-maximize"></i>
    </div>
</div>


    <h2 class="text-2xl font-bold text-white">Admin Dashboard</h2>
</div>

            
            <div id="contentMain" class="p-4 bg-white overflow-scroll scrollbar-none rounded-lg">
    <?php if (isset($content) && !empty($content)): ?>
        <?php echo $content; ?>
    <?php else: ?>
        <p class="text-center text-lg font-semibold text-gray-800 bg-gradient-to-r from-blue-500 to-teal-500 p-4 rounded-lg shadow-lg ">
    <span class="block text-white">Silakan pilih menu di samping</span> 
    <span class="block text-gray-100">untuk menampilkan konten.</span>
</p>



    <?php endif; ?>
</div>


        </div>
    </div>
</div>


<script>

function btnAside() {
    
    const adminAside = document.getElementById('adminAside');
    const btnOpen = document.getElementById('btnOpen');
    const content = document.getElementById('contentDashboard');
    const contentMain = document.getElementById('contentMain');
    
    if (adminAside.classList.contains('hidden')) {
        adminAside.classList.remove('hidden');
        adminAside.classList.add('flex');
        content.classList.add(
  'absolute',
  'left-64',
  'top-[4.5rem]',
  'h-[calc(100%-9rem)]',
  'w-[calc(100%-17rem)]',
  
);
contentMain.classList.add(
    'h-[calc(100%-3.5rem)]',
    'bg-blue-500'

);
    } else {
        adminAside.classList.remove('flex');
        adminAside.classList.add('hidden');
        content.classList.remove(
  'absolute',
  'left-64',
  'top-[4.2rem]',
  'h-[calc(100%-8.6rem)]',
  'w-[calc(100%-17rem)]',
);

contentMain.classList.remove(
    'h-[calc(100%-3rem)]',
    
);


    }
}



</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.toggle-options');

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            const target = this.dataset.target; 

            const dynamicOptions = this.nextElementSibling;

            if (dynamicOptions.classList.contains('hidden')) {
                dynamicOptions.classList.remove('hidden');
            } else {
                dynamicOptions.classList.add('hidden');
            }
        });
    });
});

</script>


<script>
    
document.addEventListener('DOMContentLoaded', function () {
    const content = document.getElementById('contentMain');

    document.querySelectorAll('a.load-content').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.getAttribute('href');

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    content.innerHTML = html || '<p>Silakan pilih menu di samping untuk menampilkan konten.</p>';
                })
                .catch(error => {
                    content.innerHTML = '<p class="text-red-500">Gagal memuat konten.</p>';
                    console.error('Fetch error:', error);
                });
        });
    });
});


</script>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const content = document.getElementById('contentMain');

        // Kondisi awal: tampilkan pesan default
        if (content.innerHTML.trim() === '') {
            content.innerHTML = '<p>Silakan pilih menu di samping untuk menampilkan konten.</p>';
        }

        // Fungsi untuk menangani klik dan memuat konten
        document.querySelectorAll('a.load-content').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('href');

                // Muat konten dari URL
                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        content.innerHTML = html;
                    })
                    .catch(error => {
                        content.innerHTML = '<p class="text-red-500">Gagal memuat konten.</p>';
                        console.error('Fetch error:', error);
                    });
            });
        });
    });
</script> -->
<script>
function openDeleteConfirmation(button) {
    const userId = button.getAttribute('data-id');  
    const modal = document.getElementById('delete-popup-' + userId);  

    
    if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    } else {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
}

function closeDeleteConfirmation(userId) {
    const modal = document.getElementById('delete-popup-' + userId);  
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

</script>

<script>
    function openDeleteModal(patientId) {
        const modal = document.getElementById('deleteModal');
        const deleteButton = document.getElementById('deleteButton');
        // Set URL for deletion using the full patient ID
        deleteButton.href = '<?php echo Yii::app()->createUrl('dashboard/deletePatient', ['id' => '']); ?>' + patientId;
        
        // Show the modal
        modal.classList.remove('hidden');

        // Show confirmation with patient ID
        const confirmationMessage = 'Apakah Anda yakin ingin menghapus pasien dengan ID ' + patientId + '?';
        const confirmationButton = document.getElementById('confirmationButton');
        confirmationButton.setAttribute('onclick', 'return confirm("' + confirmationMessage + '")');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden'); // Hide modal
    }
</script>
