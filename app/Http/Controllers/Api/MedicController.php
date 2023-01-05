<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\ControlSchedule;
use App\Models\Inpatient;
use App\Models\Invoice;
use App\Models\MedicalPrescription;
use App\Models\MedicalRecord;
use App\Models\Product;
use App\Models\Registration;
use App\Models\Treatment;
use Illuminate\Http\Request;

class MedicController extends Controller
{
    public function createMedic(Request $request)
    {
        $medic = MedicalRecord::create([
            'diagnosis' => $request->diagnosis,
            'therapy' => $request->therapy,
            'anamnesa' => $request->anamnesa,
            'description' => $request->description,
            'weight' => $request->weight,
            'temp' => $request->temp,
            'age' => $request->age,
            'registration_id' => $request->registration_id,
        ]);

        $inpatient = Inpatient::create([
            'medical_record_id' => $medic->id,
            'type' => $request->type,
        ]);

        $code = 'TR';
        for ($i = 0; $i < 7; $i++) {
            $code .= rand(0, strlen('0123456789') - 1);
        }

        $invoice = Invoice::create([
            'type' => $request->type,
            'code' => $code,
            'inpatient_id' => $inpatient->id,
        ]);

        $registration = Registration::find($request->registration_id);
        $registration->update([
            'status' => 0,
        ]);
        return ResponseFormatter::success($invoice);
    }

    public function getMedic(Request $request)
    {
        $user = $request->user();
        $registration = Registration::orderBy('created_at', 'DESC')->where(['user_id' => $user->id, 'status' => 0])->with('user', 'patient')->paginate($request->limit);
        if (count($registration) > 0) {
            foreach ($registration as $item) {
                $item->patient->user;
                $item->patient->speciesPatient;
                $item->medicalRecord;
                $item->medicalRecord->inpatients;
                $item->medicalRecord->inpatients->invoice;
            }
        }
        return ResponseFormatter::success($registration);
    }

    public function getControlSchedule(Request $request)
    {
        $user = $request->user();
        $registration = Registration::orderBy('created_at', 'DESC')->where(['user_id' => $user->id, 'status' => 0])->with('user', 'patient', 'medicalRecord')->paginate($request->limit);
        if (count($registration) > 0) {
            foreach ($registration as $item) {
                $item->medicalRecord->inpatients->invoice->controlScedules;
            }
        }
        return ResponseFormatter::success($registration);
    }

    public function updateMedic($id)
    {
        $inpatient = Inpatient::find($id);

        $inpatient->update([
            'status' => 'Selesai',
        ]);
        Invoice::where('id', $inpatient->invoice->id)->update([
            'status' => 'Belum Lunas',
        ]);
        return ResponseFormatter::success($inpatient);
    }

    public function createTreatment(Request $request)
    {
        $data = $request->all();
        if (isset($data['photo'])) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/upload';
            $file->move($destinationPath, $fileName);
            $data['photo'] = $file->getClientOriginalName();
        }

        $treatment = Treatment::create([
            'invoice_id' => $request->invoice_id,
            'price' => $request->price,
            'photo' => isset($data['photo']) ? $data['photo'] : null,
            'description' => $request->description,
        ]);

        $medic = Invoice::find($request->invoice_id);

        $medic->update([
            'total' => $medic->total + $request->price,
        ]);

        return ResponseFormatter::success($treatment);
    }

    public function getTreatment(Request $request)
    {
        $treatment = Treatment::where('invoice_id', $request->invoice_id)->orderBy('created_at', 'DESC')->paginate($request->limit);
        return ResponseFormatter::success($treatment);
    }

    public function createControl(Request $request)
    {
        $controlSchedule = ControlSchedule::create([
            'date_control' => $request->date_control,
            'description' => $request->description,
            'invoice_id' => $request->invoice_id,
        ]);
        return ResponseFormatter::success($controlSchedule);
    }

    public function getControl(Request $request)
    {
        $controlSchedule = ControlSchedule::where('invoice_id', $request->invoice_id)->orderBy('created_at', 'DESC')->paginate($request->limit);
        return ResponseFormatter::success($controlSchedule);
    }

    public function createPrescription(Request $request, $invoice)
    {
        $price = 0;

        foreach ($request->all() as $item) {
            $item['price'] = $item['price'] * $item['quantity'];
            $data = MedicalPrescription::create($item);
            $product = Product::find($item['product_id']);
            $product->update([
                'stock' => $product->stock - $item['quantity'],
            ]);
            $price += $data->price;
        }

        $medic = Invoice::find($invoice);

        $medic->update([
            'total' => $medic->total + $price,
        ]);

        return ResponseFormatter::success("Success");
    }

    public function getPrescription(Request $request)
    {
        $prescription = MedicalPrescription::where('invoice_id', $request->invoice_id)->orderBy('created_at', 'DESC')->with('product')->paginate($request->limit);
        return ResponseFormatter::success($prescription);
    }
}
