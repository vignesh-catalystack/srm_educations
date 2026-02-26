<?php
require 'connect.php';
require_once __DIR__ . '/fpdf/fpdf.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM applications_2026 WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$data) die("Application not found");

class PDF extends FPDF
{
    function Header()
    {
        // 1. Logo Position
        $logoPath = __DIR__ . '/assets/images/srm-main-logo.png';
        if (file_exists($logoPath)) {
            $this->Image($logoPath, 15, 12, 22); 
        }

        // 2. Fixed Title Indentation (Aligned to the right of logo)
        $this->SetXY(42, 14);
        $this->SetFont('Arial', 'B', 20);
        $this->SetTextColor(15, 55, 105);
        $this->Cell(0, 10, 'SRM COLLEGE OF EDUCATION', 0, 1, 'L');

        $this->SetX(42);
        $this->SetFont('Arial', '', 8.5);
        $this->SetTextColor(80, 80, 80);
        $this->Cell(0, 4, 'NO: 7/7 THIRUVALLUVAR NAGAR, NEAR CHURCH, CIRCUS GROUND BYPASS ROAD', 0, 1, 'L');
        $this->SetX(42);
        $this->Cell(0, 4, 'VANIYAMBADI - 635 751 | PH: 73 73 73 37 63, 73 73 73 37 65', 0, 1, 'L');

        $this->Ln(10);
        $this->SetDrawColor(15, 55, 105);
        $this->SetLineWidth(0.8);
        $this->Line(15, $this->GetY(), 195, $this->GetY());
        $this->Ln(5);
    }

    function SectionTitle($title)
    {
        $this->Ln(4);
        $this->SetFillColor(240, 243, 248);
        $this->SetFont('Arial', 'B', 10);
        $this->SetTextColor(15, 55, 105);
        // Padding in cell to push text right slightly
        $this->Cell(180, 9, '   ' . strtoupper($title), 0, 1, 'L', true);
        $this->Ln(2);
    }

    function DataRow($label1, $value1, $label2, $value2)
    {
        $h = 11; // Tall rows to fill the page
        $this->SetFont('Arial', 'B', 9);
        $this->SetTextColor(70, 70, 70);
        $this->Cell(35, $h, $label1 . ':', 0, 0, 'L');
        
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(55, $h, $value1 ?: '--', 0, 0, 'L');

        $this->SetFont('Arial', 'B', 9);
        $this->SetTextColor(70, 70, 70);
        $this->Cell(35, $h, $label2 . ':', 0, 0, 'L');
        
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(55, $h, $value2 ?: '--', 0, 1, 'L');

        $this->SetDrawColor(230, 230, 230);
        $this->Line(15, $this->GetY(), 195, $this->GetY());
    }

    function FullWidthRow($label, $value)
    {
        $this->SetFont('Arial', 'B', 9);
        $this->SetTextColor(70, 70, 70);
        $this->Cell(35, 11, $label . ':', 0, 0, 'L');
        
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0, 0, 0);
        $this->MultiCell(145, 11, $value ?: '--', 0, 'L');
        
        $this->SetDrawColor(230, 230, 230);
        $this->Line(15, $this->GetY(), 195, $this->GetY());
    }
}

// Initialize PDF
$pdf = new PDF('P', 'mm', 'A4');
$pdf->SetMargins(15, 15, 15);
$pdf->AddPage();

// --- Application Title ---
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(50, 50, 50);
$pdf->Cell(0, 10, 'ADMISSION APPLICATION FORM | SESSION 2026-2027', 0, 1, 'C');
$pdf->Ln(2);

// --- High Impact Info Banner ---
$pdf->SetFillColor(15, 55, 105);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 8.5);
$pdf->Cell(45, 11, ' APP NO: ' . $data['application_no'], 0, 0, 'C', true);
$pdf->Cell(45, 11, ' CAT: ' . $data['category'], 0, 0, 'C', true);
$pdf->Cell(45, 11, ' TYPE: ' . $data['course_type'], 0, 0, 'C', true);
$pdf->Cell(45, 11, ' COURSE: ' . $data['course'], 0, 1, 'C', true);

// --- Personal Details ---
$pdf->SectionTitle('Personal Details');
$pdf->DataRow('Full Name', $data['applicant_name'], 'Gender', $data['gender']);
$pdf->DataRow('Date of Birth', $data['dob'], 'Nationality', $data['nationality']);
$pdf->DataRow('Mobile', $data['mobile'], 'Father Name', $data['father_name']);
$pdf->DataRow('Mother Name', $data['mother_name'], 'Email', $data['present_email']);

// --- Address Details ---
$pdf->SectionTitle('Address Details');
$pdf->FullWidthRow('Present Address', $data['present_address']);
$pdf->DataRow('Police Station', $data['present_ps'], 'District', $data['present_dist']);
$pdf->DataRow('Pin Code', $data['present_pin'], 'State', 'Tamil Nadu');
$pdf->FullWidthRow('Permanent Address', $data['permanent_address']);

// --- Guardian Details ---
$pdf->SectionTitle('Guardian Details');
$pdf->DataRow('Father Occup.', $data['father_occupation'], 'Father Mobile', $data['father_mobile']);
$pdf->DataRow('Mother Occup.', $data['mother_occupation'], 'Mother Mobile', $data['mother_mobile']);

// --- Declaration & Signature (Pushed to bottom) ---
$pdf->SetY(-55); 
$pdf->SetFillColor(252, 252, 252);
$pdf->SetFont('Arial', 'I', 8);
$pdf->SetTextColor(100, 100, 100);
$pdf->MultiCell(180, 6, "DECLARATION: I hereby declare that all information provided in this application is true and correct to the best of my knowledge. I understand that any false information may result in the cancellation of my admission.", 1, 'L', true);

$pdf->Ln(12);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(120); 
$pdf->Cell(60, 0, '', 'T', 1, 'C'); // Signature line
$pdf->Cell(120);
$pdf->Cell(60, 8, "Applicant's Signature", 0, 0, 'C');

/* ── CUSTOM STORAGE OPTION ── */
$folderName = 'applications_2026/'; // Best option: organized by year
if (!is_dir($folderName)) {
    mkdir($folderName, 0777, true);
}

// Clean filename logic
$safeName = preg_replace('/[^A-Za-z0-9\-]/', '_', $data['applicant_name']);
$fileName = $safeName . '_' . $data['application_no'] . '.pdf';
$storagePath = $folderName . $fileName;

/* ── Save and Force Download ── */
$pdf->Output('F', $storagePath); // Saves to your server folder
$pdf->Output($fileName, 'D');   // Sends to user's browser
?>