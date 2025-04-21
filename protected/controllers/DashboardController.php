<?php

class DashboardController extends Controller
{
    
    public function actionUserManage()
    {
        $users = User::model()->findAll();
        $this->renderPartial('staff/manage', ['users' => $users], false, true);
    }
    
    public function actionEditStaff($id)
    {
        $model = User::model()->findByPk($id);
    
        if (!$model) {
            throw new CHttpException(404, 'Staff tidak ditemukan.');
        }
    
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
    
            if (isset($_FILES['User']['name']['image']) && $_FILES['User']['name']['image'] != '') {
                $uploadedFile = $_FILES['User']['tmp_name']['image'];
                $fileName = $_FILES['User']['name']['image'];
                
                $uploadDir = Yii::app()->basePath . '/../uploads/'; 
                $filePath = $uploadDir . basename($fileName);
                
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true); 
                }
                
                if (move_uploaded_file($uploadedFile, $filePath)) {
                    $model->image = $fileName;
                } else {
                    Yii::app()->user->setFlash('error', 'Gagal mengunggah gambar.');
                }
            }
    
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Data staff berhasil diperbarui.');
                $this->redirect(['dashboard/adminDashboard']);
            } else {
                Yii::app()->user->setFlash('error', 'Gagal menyimpan perubahan.');
            }
        }
    
        $this->render('staff/editStaff', [
            'users' => $model,
        ]);
    }
    
    
    
    public function actionStaffManage(){
        $users = User::model()->findAll();
        $this->renderPartial('staff/manage', ['users' => $users], false, true);
    }

public function actionChangeRole($id, $role)
{
    if (Yii::app()->user->role !== 'admin') {
        throw new CHttpException(403, 'You are not authorized to perform this action.');
    }

    $user = User::model()->findByPk($id);
    if ($user === null) {
        throw new CHttpException(404, 'User not found.');
    }

    $user->role = $role;
    if ($user->save()) {
        Yii::app()->user->setFlash('success', 'User role has been updated.');
    } else {
        Yii::app()->user->setFlash('error', 'Failed to update user role.');
    }

    $this->redirect(array('staffManage'));
}
    public function actionAdminDashboard()
    {

        $admin = Yii::app()->user->id;
        $model = User::model()->findByPk($admin);
        
        $recentActivities = $this->getRecentActivities();
        
        $this->render('adminDashboard', [
            'model' => $model,
            'recentActivities' => $recentActivities,
        ]);
    }

    public function actionPatientManage()
{
    $patients = Patient::model()->findAll();
    
    $this->renderPartial('patient/manage', ['patients' => $patients], false, true);
}

public function actionTreatmentManage()
{
    $treatments = Treatment::model()->findAll();
    $this->renderPartial('treatment/manage', ['treatments' => $treatments], false, true);
}

    protected function getRecentActivities()
    {
        return [];
    }

    public function actionAddStaff()
    {
        $model = new User;
    
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
    
            $validRoles = ['admin', 'petugas_pendaftaran', 'dokter', 'kasir'];
            if (!in_array($model->role, $validRoles)) {
                $model->addError('role', 'Role yang dipilih tidak valid.');
            }
    
            if (User::model()->exists('username=:username', [':username' => $model->username])) {
                $model->addError('username', 'Username sudah digunakan.');
            }
    
            if (User::model()->exists('email=:email', [':email' => $model->email])) {
                $model->addError('email', 'Email sudah digunakan.');
            }
    
            if ($model->hasErrors()) {
                $this->render('staff/addStaff', ['model' => $model]);
                return;
            }
    
            if (isset($_FILES['User']['name']['image']) && $_FILES['User']['name']['image'] != '') {
                $uploadedFile = CUploadedFile::getInstance($model, 'image');
                $imageName = uniqid() . '.' . $uploadedFile->extensionName;
                $uploadPath = Yii::getPathOfAlias('webroot') . '/uploads/'; 
    
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
    
             
                $uploadedFile->saveAs($uploadPath . $imageName);
                $model->image = $imageName;
            }
    
            if ($model->password) {
                $model->password = CPasswordHelper::hashPassword($model->password);
            }
    
            if ($model->save()) {
                // Menentukan pesan yang sesuai berdasarkan role
                $roleMessages = [
                    'admin' => 'Berhasil Menambahkan Admin.',
                    'petugas_pendaftaran' => 'Berhasil Menambahkan Petugas Pendaftaran.',
                    'dokter' => 'Berhasil Menambahkan Dokter.',
                    'kasir' => 'Berhasil Menambahkan Kasir.',
                ];
            
                // Jika role ada dalam array, tampilkan pesan yang sesuai
                $role = $model->role; // Ambil role yang dipilih
                if (array_key_exists($role, $roleMessages)) {
                    Yii::app()->user->setFlash('success', $roleMessages[$role]);
                } else {
                    // Pesan default jika role tidak ditemukan
                    Yii::app()->user->setFlash('success', 'Berhasil Menambahkan Karyawan.');
                }
            
                $this->redirect(['dashboard/adminDashboard']);
            }
            
        }
    
        $this->render('staff/addStaff', [
            'model' => $model,
        ]);
    }
    

    public function actionHapusStaff($id)
    {
        $model = User::model()->findByPk($id);
        
        if ($model) {
            if ($model->delete()) {
                Yii::app()->user->setFlash('success', 'Staff berhasil dihapus.');
            } else {
                Yii::app()->user->setFlash('error', 'Gagal menghapus staff.');
            }
        } else {
            Yii::app()->user->setFlash('error', 'Staff tidak ditemukan.');
        }
    
        $this->redirect(['dashboard/adminDashboard']);
    }
    
    
    public function actionAddPatient()
    {
        $patient = new Patient();
    
        if (isset($_POST['Patient'])) {
            // Ambil data dari form, termasuk kabupaten_id
            $patient->attributes = $_POST['Patient'];
    
            // Pastikan kabupaten_id di-set dengan benar
            if (isset($_POST['Patient']['kabupaten_id'])) {
                $patient->kabupaten_id = $_POST['Patient']['kabupaten_id'];
            }
    
            // Buat ID otomatis
            $today = date('Ym'); // 202504
            $prefix = 'PSN-' . $today;
    
            // Hitung jumlah pasien yang dibuat di bulan ini
            $count = Patient::model()->count("SUBSTRING(id FROM 5 FOR 6) = :prefix", [
                ':prefix' => $today
            ]);
    
            // Tambahkan leading zero (001, 002, ...)
            // Menggunakan count untuk nomor berikutnya
            $nextNumber = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
    
            // Gabungkan
            $newId = $prefix . '-' . $nextNumber;
    
            // Pastikan ID tidak duplikat
            while (Patient::model()->exists('id = :id', [':id' => $newId])) {
                // Jika ID sudah ada, hitung ulang nomor urut
                $count++;
                $nextNumber = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
                $newId = $prefix . '-' . $nextNumber;
            }
    
            $patient->id = $newId;  // Gunakan ID yang baru dibuat
    
            // Set role default
            $patient->role = 'patient';
    
            if ($patient->save()) {
                Yii::app()->user->setFlash('success', 'Pasien berhasil ditambahkan!');
                $this->redirect(array('dashboard/adminDashboard'));
            }
        }
    
        $this->render('patient/addPatient', [
            'model' => $patient,
        ]);
    }
    
    

    
    public function actionUpdatePatient($id)
    {
        $patient = Patient::model()->findByPk($id);
    
        if (!$patient) {
            Yii::app()->user->setFlash('error', 'Pasien tidak ditemukan!');
            $this->redirect(array('dashboard/adminDashboard'));
        }
    
        if (isset($_POST['Patient'])) {
            $patient->attributes = $_POST['Patient'];
    
            // Memastikan ID kabupaten tersimpan jika dipilih
            if (isset($_POST['Patient']['kabupaten_id'])) {
                $patient->kabupaten_id = $_POST['Patient']['kabupaten_id'];
            }
    
            if ($patient->save()) {
                Yii::app()->user->setFlash('success', 'Data pasien berhasil diperbarui!');
                $this->redirect(array('dashboard/adminDashboard')); 
            }
        }
    
        $this->render('patient/update', [
            'model' => $patient, 
        ]);
    }
    

public function actionDeletePatient($id)
{
    $patient = Patient::model()->findByPk($id);
    if ($patient !== null) {
        if ($patient->delete()) {
            Yii::app()->user->setFlash('success', 'Pasien berhasil dihapus.');
        } else {
            Yii::app()->user->setFlash('error', 'Terjadi kesalahan saat menghapus pasien.');
        }
    } else {
        Yii::app()->user->setFlash('error', 'Pasien tidak ditemukan.');
    }
    
    $this->redirect(['dashboard/adminDashboard']);
}



public function actionShowPatient($id)
{
    $patient = Patient::model()->findByPk($id);

    if ($patient === null) {
        throw new CHttpException(404, 'Pasien tidak ditemukan.');
    }

    $patient->visits = Visit::model()->with('doctor')->findAllByAttributes(['patient_id' => $patient->id]);

    $this->render('patient/showPatient', ['patient' => $patient]);
}

// protected/controllers/DashboardController.php

public function actionAddVisit($patientId)
{
    $visit        = new Visit;
    $prescription = new Prescription;

    $patient = Patient::model()->findByPk($patientId);
    if (!$patient) throw new CHttpException(404,'Pasien tidak ditemukan.');

    if (isset($_POST['Visit'], $_POST['Prescription'], $_POST['medicine_ids'], $_POST['quantities'])) {
        $tx = Yii::app()->db->beginTransaction();
        try {
            // 1) save Visit
            $visit->attributes  = $_POST['Visit'];
            $visit->patient_id  = $patientId;
            if (!$visit->save()) {
                throw new Exception('Visit errors: '.CJSON::encode($visit->getErrors()));
            }

            // Ambil nama treatment baru dari input
$newTreatmentName = $_POST['new_treatment_name'] ?? null;

if (!$newTreatmentName) {
    throw new Exception("Nama treatment belum diisi.");
}

// Simpan treatment baru
$treatment = new Treatment();
$treatment->treatment_name = $newTreatmentName;
$treatment->patient_id = $patientId;

if (!$treatment->save()) {
    throw new Exception('Gagal menyimpan treatment: '.CJSON::encode($treatment->getErrors()));
}

// Isi prescription
$prescription = new Prescription();
$prescription->attributes = $_POST['Prescription'];
$prescription->visit_id   = $visit->id;
$prescription->treatment_id = $treatment->id; // Gunakan ID yang baru disimpan

if (!$prescription->save()) {
    throw new Exception('Gagal menyimpan prescription: '.CJSON::encode($prescription->getErrors()));
}

            // 3) save pivot rows
            foreach ($_POST['medicine_ids'] as $i => $medId) {
                $pm = new PrescriptionMedicine;
                $pm->prescription_id = $prescription->id;
                $pm->medicine_id     = $medId;
                $pm->quantity        = (int)$_POST['quantities'][$i];
                if (!$pm->save()) {
                    throw new Exception('Pivot errors: '.CJSON::encode($pm->getErrors()));
                }
            }

            $tx->commit();
            Yii::app()->user->setFlash('success','Kunjungan berhasil disimpan.');
            $this->redirect(['dashboard/adminDashboard']);
        } catch (Exception $e) {
            $tx->rollback();
            Yii::app()->user->setFlash('error','Gagal: '.$e->getMessage());
        }
    }

    $doctors   = CHtml::listData(User::model()->findAll("role='dokter'"), 'id', 'username');
    $medicines = CHtml::listData(Medicine::model()->findAll(), 'id', 'name');
    $treatments = Treatment::model()->findAll();

    $this->render('visit/addVisit', [
        'visit'=> $visit,
        'prescription'=> $prescription,
        'patient'=> $patient,
        'doctors'=> $doctors,
        'medicines'=> $medicines,
        'treatments' => $treatments,
    ]);
}



public function actionPaymentManage()
{
    $payments = Payment::model()
        ->with('prescription.visit.patient')
        ->findAll();
    $this->renderPartial('payment/manage', [
        'payments' => $payments
    ], false, true);
}

public function actionCheckPayment()
{
    // Ambil semua data dari prescription_medicines
    $prescriptionMedicines = PrescriptionMedicine::model()->findAll();

    // Kelompokkan berdasarkan prescription_id
    $grouped = [];
    foreach ($prescriptionMedicines as $pm) {
        $grouped[$pm->prescription_id][] = $pm;
    }

    $successCount = 0;
    $skipCount = 0;

    foreach ($grouped as $prescriptionId => $items) {
        // Cek apakah sudah ada di payments
        $existing = Payment::model()->findByAttributes(['prescription_id' => $prescriptionId]);
        if ($existing) {
            $skipCount++;
            continue; // skip jika sudah ada
        }

        $totalAmount = 0;
        foreach ($items as $pm) {
            $medicine = Medicine::model()->findByPk($pm->medicine_id);
            if ($medicine) {
                $totalAmount += $pm->quantity * $medicine->price_per_unit;
            } else {
                Yii::log("Medicine with ID {$pm->medicine_id} not found.", CLogger::LEVEL_WARNING);
            }
        }

        // Simpan ke payments
        $payment = new Payment();
        $payment->prescription_id = $prescriptionId;
        $payment->total_amount = $totalAmount;
        $payment->payment_time = new CDbExpression('NOW()');
        $payment->status = 'pending';

        if ($payment->save()) {
            $successCount++;
        } else {
            Yii::log("Failed to save payment for prescription_id $prescriptionId", CLogger::LEVEL_ERROR);
        }
    }

    Yii::app()->user->setFlash('success', "$successCount pembayaran berhasil dibuat. $skipCount dilewati karena sudah ada.");
    $this->redirect(['dashboard/manage']); // ganti sesuai view kamu
}


public function actionShowPayment($prescriptionId)
{
    $payment = Payment::model()->findByAttributes(['prescription_id' => $prescriptionId]);

    if (!$payment) {
        throw new CHttpException(404, 'Data pembayaran tidak ditemukan.');
    }

    $prescription = $payment->prescription;
    $patient = $prescription->visit->patient;
    $prescriptionMedicines = PrescriptionMedicine::model()->findAllByAttributes([
        'prescription_id' => $prescriptionId,
    ]);

    $medicinesData = [];
    foreach ($prescriptionMedicines as $pm) {
        $medicine = Medicine::model()->findByPk($pm->medicine_id);
        if ($medicine) {
            $medicinesData[] = [
                'name' => $medicine->name,
                'price' => $medicine->price_per_unit,
                'quantity' => $pm->quantity,
                'subtotal' => $pm->quantity * $medicine->price_per_unit,
            ];
        }
    }

    $this->render('payment/showPayment', [
        'payment' => $payment,
        'patient' => $patient,
        'medicinesData' => $medicinesData,
    ]);
}


public function actionProcessPayment()
{
    $paymentId = Yii::app()->request->getPost('payment_id');
    $method = Yii::app()->request->getPost('method');

    $payment = Payment::model()->findByPk($paymentId);
    if (!$payment) {
        throw new CHttpException(404, 'Data pembayaran tidak ditemukan.');
    }

    if ($method === 'cash') {
        $payment->status = 'waiting_cash'; // Belum paid, masih menunggu kasir menerima uang
        $payment->payment_time = new CDbExpression('NOW()');
        $payment->method_payment = 'cash'; // Menyimpan metode pembayaran

        if ($payment->save()) {
            Yii::app()->user->setFlash('success', 'Metode cash dipilih. Menunggu pembayaran secara fisik.');
        } else {
            Yii::app()->user->setFlash('error', 'Gagal menyimpan status pembayaran cash.');
        }
    } else {
        Yii::app()->user->setFlash('error', 'Metode pembayaran tidak dikenali.');
    }

    $this->redirect(['dashboard/showPayment', 'prescriptionId' => $payment->prescription_id]);
}

public function actionConfirmCash()
{
    $paymentId = Yii::app()->request->getPost('payment_id');
    $payment = Payment::model()->findByPk($paymentId);

    if (!$payment || $payment->status !== 'waiting_cash') {
        throw new CHttpException(400, 'Pembayaran tidak valid atau sudah diproses.');
    }

    $payment->status = 'successful';
    $payment->payment_time = new CDbExpression('NOW()');

    if ($payment->save()) {
        Yii::app()->user->setFlash('success', 'Pembayaran cash telah dikonfirmasi.');
    } else {
        Yii::app()->user->setFlash('error', 'Gagal konfirmasi pembayaran.');
    }

    $this->redirect(['dashboard/showPayment', 'prescriptionId' => $payment->prescription_id]);
}

public function actionReport()
{
    $data = Yii::app()->db->createCommand("
        SELECT TO_CHAR(visit_date, 'YYYY-MM-DD') AS tanggal, COUNT(*) AS jumlah
        FROM visits
        GROUP BY TO_CHAR(visit_date, 'YYYY-MM-DD')
        ORDER BY tanggal
    ")->queryAll();

    $tanggalList = array_column($data, 'tanggal');
    $jumlahList = array_column($data, 'jumlah');

        // Ambil data tindakan yang paling sering diresepkan
        $data = Yii::app()->db->createCommand()
        ->select('treatment_name, COUNT(*) AS jumlah')
        ->from('treatments')  // Asumsi nama tabel adalah "treatments"
        ->group('treatment_name')
        ->order('jumlah DESC')
        ->limit(5)  // Ambil 5 tindakan terbanyak
        ->queryAll();

    // Persiapkan data untuk dikirim ke view
    $treatmentNames = array_column($data, 'treatment_name');
    $jumlahTindakan = array_column($data, 'jumlah');

// Grafik obat yang paling sering diresepkan
$data = Yii::app()->db->createCommand("
SELECT m.name AS nama_obat, SUM(pm.quantity) AS total_diresepkan
FROM prescription_medicines pm
JOIN medicines m ON m.id = pm.medicine_id
GROUP BY m.name
ORDER BY total_diresepkan DESC
")->queryAll();

$obatNames = array_column($data, 'nama_obat');
$jumlahObat = array_column($data, 'total_diresepkan');

    $this->render('report/showReport', [
        'tanggalList' => $tanggalList,
        'jumlahList' => $jumlahList,
        'treatmentNames' => $treatmentNames,
        'jumlahTindakan' => $jumlahTindakan,
        'obatNames' => $obatNames,
        'jumlahObat' => $jumlahObat,
    ]);
}


}
