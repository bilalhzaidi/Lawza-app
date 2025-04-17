<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Handles property document generation workflow for Lawza.
 */
class DocumentController extends Controller
{
    /**
     * Display the form for the selected property document type.
     * Accessible from dashboard buttons.
     *
     * @param string $type
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function showForm($type)
    {
        // Lookup template details from config/document_templates.php
        $template = collect(config('document_templates'))->firstWhere('key', $type);

        if (!$template) {
            abort(404);
        }

        return view('document_form', compact('template', 'type'));
    }

    /**
     * Handles form submission and generates a PDF download for the chosen document type.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $type
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function generate(Request $request, $type)
    {
        $template = collect(config('document_templates'))->firstWhere('key', $type);

        if (!$template) {
            abort(404);
        }

        // You may add/modify validation rules to match your template fields!
        $data = $request->validate([
            'party_name' => 'required|string|max:255',
            'cnic'       => 'required|string|max:32',
            'address'    => 'required|string|max:255',
            'mobile'     => 'required|string|max:32',
        ]);

        // You can extend these fields as desired (e.g., witnesses, etc.)

        // For MVP: Basic document text; for production, use OpenAI or smart template
        $documentText = "Document Type: {$template['name']}\n"
            . "Name: {$data['party_name']}\n"
            . "CNIC: {$data['cnic']}\n"
            . "Address: {$data['address']}\n"
            . "Mobile: {$data['mobile']}\n"
            . "Date: " . now()->toDateString();

        // Generate and stream PDF using pdf_template.blade.php
        $pdf = Pdf::loadView('pdf_template', [
            'documentText' => $documentText,
            'template'     => $template,
        ]);
        return $pdf->download("{$template['key']}_document.pdf");
    }
}