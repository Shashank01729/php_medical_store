<?php
require('fpdf/fpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $services = $_POST['services'];
    $amount = $_POST['amount'];
    $discount = $_POST['discount'];
    $tax = $_POST['tax'];
    $totalAmount = $_POST['totalAmount'];

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, "Medical Invoice", 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Invoice ID: " . uniqid("INV-"), 0, 1);
    $pdf->Cell(0, 10, "Patient Name: $name", 0, 1);
    $pdf->Cell(0, 10, "Services: $services", 0, 1);
    $pdf->Cell(0, 10, "Amount: ₹$amount", 0, 1);
    $pdf->Cell(0, 10, "Discount: $discount%", 0, 1);
    $pdf->Cell(0, 10, "Tax: $tax%", 0, 1);
    $pdf->Cell(0, 10, "Total Amount Due: ₹$totalAmount", 0, 1);

    $pdf->Output('D', 'invoice.pdf');
}
?>
