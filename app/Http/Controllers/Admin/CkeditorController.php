<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CkeditorController extends Controller
{
    
  public function ckeditorUpload(Request $request){
     if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('media'), $fileName);
        $url = asset('media/' . $fileName);
      return response()->json($url);
    }
    return response()->json('Upload failed', 400);
    }

     public function ckeditorDeleteImage(Request $request){
        $fileName = $request->input('filename');
        $filePath = public_path('media/' . $fileName);
        if (File::exists($filePath)) {
            File::delete($filePath);
            return response()->json(['message' => 'File deleted successfully']);
        }
        return response()->json(['message' => 'File not found']);
    }





}
