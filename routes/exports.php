<?php

use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;


Route::get('localXml', [ExportController::class, 'xmlExportLocal']);
Route::get('publicXml',[ExportController::class,'xmlExportPublic']);
Route::get('xlsx',[ExportController::class,'xlsxFileExport']);
