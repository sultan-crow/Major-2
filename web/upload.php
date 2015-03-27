<?php
$target_path="pdfs/";

$target_path=$target_path.basename($_FILES['researchPdf']['name']);
move_uploaded_file( $_FILES['researchPdf']['tmp_name'], $target_path );
echo $target_path;
?>