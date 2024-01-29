<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class MarchandiseSortieExport implements FromCollection, WithHeadings, WithStyles
{
    protected $data;
    protected $ligne;

    public function __construct($data, $ligne)
    {
        $this->data = $data;
        $this->ligne = $ligne;
    }

    public function collection()
    {
        // Flatten $data
        $flattenedData = collect($this->data)->map(function ($item) {
            return array_values((array)$item);
        });

        // Flatten $ligne
        $flattenedLigne = collect($this->ligne)->map(function ($item) {
            // Extract values from DB::raw expression
            $dateLigne = property_exists($item, 'dateLigne') ? $item->dateLigne : '';
            $produit = property_exists($item, 'produit') ? $item->produit : '';
            $qteentree = property_exists($item, 'qte') ? $item->qte : '';

            return [$dateLigne, $produit, $qteentree];
        });

        // Combine headers for $data and $ligne
        $dataHeader = [
            'Date',
            'Client',
            'Total Marchandise Sortie',
            'Chauffeur',
            'Matricule',
        ];

        $ligneHeader = [
            'Ligne Date',
            'Produit',
            'Quantite Sorite',
        ];

        // Return flattened data with headers, an empty row, flattened ligne with headers
        return collect([$dataHeader])->merge($flattenedData)->merge([[]])->merge([[]])->merge([$ligneHeader])->merge($flattenedLigne);
    }

    public function headings(): array
    {
        // The headings method is not needed in this case since headers are included in the collection
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        $this->applyStylesToTable($sheet, 'A1:E1');

        $lastRowData = $sheet->getHighestRow();

        // Add an extra empty row between tables
        $lastRowData += 2;

        // Apply styles to the entire worksheet or specific cells for $ligne
        $sheet->getStyle('A' . 3 . ':C' . 3)->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'FFCC00'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle('A' . ($lastRowData + 1) . ':C' . ($lastRowData + 1))
        ->getAlignment()
        ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $lastRowLigne = $lastRowData +2;
        $sheet->getStyle('A' . 3 . ':C' . 3)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        foreach (range('A', 'C') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
    }

    private function applyStylesToTable(Worksheet $sheet, $range)
    {
        // Apply styles to the entire worksheet or specific cells
        $sheet->getStyle($range)->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'FFCC00'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle('A' . ($lastRow + 3) . ':E' . $lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        foreach (range('A', 'E') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
    }
}
