<?php
$submitSuccess = false;
$submitError = '';
$slNo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $required = [
        'course_type','course','academic_session',
        'applicant_name','father_name','mother_name',
        'gender','dob','category',
        'mobile','nationality',
        'present_address','present_ps','present_dist','present_pin','present_email',
        'permanent_address',
        'father_occupation','father_mobile',
        'mother_occupation','mother_mobile'
    ];

    foreach ($required as $f) {
        if (empty(trim($_POST[$f] ?? ''))) {
            $submitError = "Please fill all required fields.";
            break;
        }
    }

    if (!$submitError) {
        $slNo = date('YmdHis') . rand(10,99);

        $data = $_POST;
        $data['sl_no'] = $slNo;
        $data['submitted_at'] = date('Y-m-d H:i:s');

        $dir = __DIR__ . '/data/applications/';
        if (!is_dir($dir)) mkdir($dir,0755,true);
        file_put_contents($dir.$slNo.'.json', json_encode($data,JSON_PRETTY_PRINT));

        $submitSuccess = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>SRM Application</title>

<style>
:root{
--red:#D32F2F;
--navy:#1E293B;
--light:#F8FAFC;
--border:#E2E8F0;
--radius:10px;
}

body{
margin:0;
font-family:'Nunito',sans-serif;
background:linear-gradient(to bottom,#F8FAFC,#EEF2F7);
color:var(--navy);
}

.wrapper{
max-width:1100px;
margin:50px auto;
background:#fff;
padding:40px;
border-radius:var(--radius);
box-shadow:0 20px 60px rgba(30,41,59,.12);
}

h1{
font-family:'Rajdhani';
font-size:32px;
margin-bottom:8px;
}

.section{
margin-top:40px;
}

.section h3{
color:var(--red);
font-size:18px;
border-bottom:2px solid var(--red);
padding-bottom:6px;
margin-bottom:20px;
}

.grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
}

.field{
display:flex;
flex-direction:column;
gap:6px;
}

label{
font-size:13px;
font-weight:700;
}

input,select,textarea{
padding:11px;
border:1px solid var(--border);
border-radius:var(--radius);
font-size:14px;
}

textarea{min-height:80px;}

button{
margin-top:40px;
background:var(--red);
color:#fff;
border:none;
padding:14px 40px;
border-radius:var(--radius);
font-weight:700;
cursor:pointer;
}

button:hover{
background:#B71C1C;
}

.hidden{display:none;}

@media(max-width:900px){
.grid{grid-template-columns:1fr;}
}
/* SRM LETTERHEAD */

.srm-letterhead{
    background:#F8FAFC;
    border-bottom:3px solid #D32F2F;
    padding:25px 20px;
}

.srm-header-inner{
    max-width:1100px;
    margin:0 auto;
    display:flex;
    align-items:center;
    gap:25px;
    flex-wrap:wrap;
}

.srm-logo img{
    width:85px;
    height:auto;
    object-fit:contain;
}

.srm-details h2{
    margin:0;
    font-size:22px;
    font-weight:800;
    letter-spacing:1px;
    color:#1E293B;
}

.srm-details p{
    margin-top:8px;
    font-size:13px;
    color:#475569;
    line-height:1.6;
}
</style>
</head>
<body>

<div class="wrapper">

<?php if($submitSuccess): ?>
<h2 style="color:#16A34A;">Application Submitted Successfully</h2>
<p>Application Number:</p>
<h3><?php echo $slNo; ?></h3>
<a href="apply.php"><button>New Application</button></a>
<?php else: ?>
<!-- SRM LETTERHEAD HEADER -->
<div class="srm-letterhead">
    <div class="srm-header-inner">

        <div class="srm-logo">
            <img src="../assets/images/srm-cc-logo.png" alt="SRM Logo">
        </div>

        <div class="srm-details">
            <h2>SRM COLLEGE OF EDUCATION</h2>
            <p>
                NO: 7/7 THIRUVALLUVAR NAGAR, NEAR CHURCH, CIRCUS GROUND BYPASS ROAD<br>
                VANIYAMBADI - 635 751 &nbsp;&nbsp; | &nbsp;&nbsp;
                PH : 73 73 73 37 63 , 73 73 73 37 65
            </p>
        </div>

    </div>
</div>
<h1>Application Form</h1>

<?php if($submitError): ?>
<div style="background:#FEF2F2;color:#B91C1C;padding:12px;margin-bottom:20px;">
<?php echo $submitError; ?>
</div>
<?php endif; ?>

<form method="POST">

<!-- COURSE -->
<div class="section">
<h3>Course Selection</h3>

<div class="grid">

<div class="field">
<label>Course Type *</label>
<select name="course_type" onchange="toggleCourse(this.value)">
<option value="">Select</option>
<option value="BSC">BSC Degree</option>
<option value="DIPLOMA">3 Year Diploma</option>
</select>
</div>

<div class="field">
<label>Course *</label>

<select name="course" id="bscCourses" class="hidden">
<option value="">Select BSC Course</option>
<option>BSC – MLT</option>
<option>BSC – Anaesthesia</option>
<option>BSC – Optometry</option>
<option>BSC – MPHW</option>
<option>B-Pharmacy</option>
</select>

<select name="course" id="dipCourses" class="hidden">
<option value="">Select Diploma Course</option>
<option>D-Pharmacy</option>
<option>DMLT</option>
<option>DOTT</option>
<option>D-Anaesthesia</option>
<option>D-Dialysis</option>
<option>D-Dental</option>
<option>D-Radiology</option>
</select>

</div>

<div class="field">
<label>Academic Session *</label>
<select name="academic_session">
<option value="">Select</option>
<option>2026-2027</option>
<option>2027-2028</option>
</select>
</div>

</div>
</div>

<!-- PERSONAL -->
<div class="section">
<h3>Personal Details</h3>
<div class="grid">
<div class="field"><label>Applicant Name *</label><input type="text" name="applicant_name"></div>
<div class="field"><label>Father Name *</label><input type="text" name="father_name"></div>
<div class="field"><label>Mother Name *</label><input type="text" name="mother_name"></div>
<div class="field"><label>Gender *</label>
<select name="gender">
<option value="">Select</option>
<option>Male</option>
<option>Female</option>
<option>Transgender</option>
</select></div>
<div class="field"><label>Date of Birth *</label><input type="date" name="dob"></div>
<div class="field"><label>Category *</label>
<select name="category">
<option>GEN</option>
<option>BC</option>
<option>MBC</option>
<option>SC</option>
<option>ST</option>
</select></div>
<div class="field"><label>Mobile *</label><input type="text" name="mobile"></div>
<div class="field"><label>Nationality *</label><input type="text" name="nationality" value="Indian"></div>
</div>
</div>

<!-- PRESENT ADDRESS -->
<div class="section">
<h3>Present Address</h3>
<div class="grid">
<div class="field" style="grid-column:1/3;"><label>Address *</label><textarea name="present_address"></textarea></div>
<div class="field"><label>P.S *</label><input type="text" name="present_ps"></div>
<div class="field"><label>District *</label><input type="text" name="present_dist"></div>
<div class="field"><label>Pin Code *</label><input type="text" name="present_pin"></div>
<div class="field"><label>Email *</label><input type="email" name="present_email"></div>
</div>
</div>

<!-- PERMANENT ADDRESS -->
<div class="section">
<h3>Permanent Address</h3>
<textarea name="permanent_address"></textarea>
</div>

<!-- GUARDIAN -->
<div class="section">
<h3>Guardian Details</h3>
<div class="grid">
<div class="field"><label>Father Occupation *</label><input type="text" name="father_occupation"></div>
<div class="field"><label>Father Mobile *</label><input type="text" name="father_mobile"></div>
<div class="field"><label>Mother Occupation *</label><input type="text" name="mother_occupation"></div>
<div class="field"><label>Mother Mobile *</label><input type="text" name="mother_mobile"></div>
</div>
</div>

<button type="submit">Submit Application</button>

</form>

<?php endif; ?>

</div>

<script>
function toggleCourse(type){
document.getElementById('bscCourses').classList.add('hidden');
document.getElementById('dipCourses').classList.add('hidden');
if(type==='BSC') document.getElementById('bscCourses').classList.remove('hidden');
if(type==='DIPLOMA') document.getElementById('dipCourses').classList.remove('hidden');
}
</script>

</body>
</html>