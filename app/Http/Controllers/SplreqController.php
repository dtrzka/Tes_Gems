<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spl_req;
use Barryvdh\DomPDF\Facade\Pdf;

class SplreqController extends Controller
{
    Public function index()
    {
        $spl_req_data = Spl_req::sortable()->orderBy('id', 'desc')->paginate(10);

        return view('index')->with('spl_req', $spl_req_data);
    }

    Public function create()
    {
        return view('Req.create');
    }
    
    public function store(Request $request)
{
    $lastRecord = Spl_req::where('id', 'like', 'SPL%')
                ->selectRaw("CAST(SUBSTRING(id, 4, LENGTH(id)-3) AS UNSIGNED) as num_id")
                ->orderBy('num_id', 'desc')
                ->first();

    if ($lastRecord) {
        $lastNumber = $lastRecord->num_id; // Extract last number
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1; // First record
    }

    // Generate the new ID in SPLxxx format
    $newId = 'SPL' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    // Create the new record
    Spl_req::create([
        'id' => $newId,  // Custom ID
        'nama' => $request->nama,
        'manager' => $request->manager,
        'tanggal_lembur' => $request->tanggal_lembur,
        'posisi' => $request->posisi,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'durasi' => $request->durasi,
        'pekerjaan' => $request->pekerjaan,
    ]);

    return redirect('/index')->with('success', 'Surat Perintah Lembur berhasil diajukan!');
}

public function destroy($id)
{
    $spl = Spl_req::findOrFail($id);
    $spl->delete();
    return redirect('/index')->with('success', 'Request deleted successfully');
}

// Print/download an approved request
public function print($id)
{
    $spl = Spl_req::findOrFail($id);
    $pdf = PDF::loadView('Req.print', compact('spl'));
    return $pdf->download('SPL_'.$spl->id.'.pdf');
}

// Approve a request
public function approve($id)
{
    $spl = Spl_req::findOrFail($id);
    $spl->status = 'Disetujui';
    $spl->save();
    return redirect('/index')->with('success', 'Request approved');
}

// Reject a request
public function reject($id)
{
    $spl = Spl_req::findOrFail($id);
    $spl->status = 'Ditolak';
    $spl->save();
    return redirect('/index')->with('success', 'Request rejected');
}

}
