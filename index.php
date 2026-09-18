<?php
$studentName = "";
$studentID = "";
$grade1 = "";
$grade2 = "";
$grade3 = "";
$average = null;
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $studentName = htmlspecialchars($_POST["student_name"]);
    $studentID = htmlspecialchars($_POST["student_id"]);

    $grade1 = floatval($_POST["grade1"]);
    $grade2 = floatval($_POST["grade2"]);
    $grade3 = floatval($_POST["grade3"]);

    // Calculate average
    $average = ($grade1 + $grade2 + $grade3) / 3;

    // Determine status
    if ($average >= 75) {
        $status = "PASSED";
    } else {
        $status = "FAILED";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Grade Calculator</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Student Grade Calculator</h1>
        <p class="subtitle">
            Enter the student's information and grades.
        </p>

        <form method="POST" action="" id="gradeForm">

            <div class="form-group">
                <label for="student_name">Student Name</label>
                <input
                    type="text"
                    id="student_name"
                    name="student_name"
                    placeholder="Enter student name"
                    value="<?php echo $studentName; ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input
                    type="text"
                    id="student_id"
                    name="student_id"
                    placeholder="Enter student ID"
                    value="<?php echo $studentID; ?>"
                    required
                >
            </div>

            <div class="grades">

                <div class="form-group">
                    <label for="grade1">Grade 1</label>
                    <input
                        type="number"
                        id="grade1"
                        name="grade1"
                        min="0"
                        max="100"
                        step="0.01"
                        placeholder="0 - 100"
                        value="<?php echo $grade1; ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="grade2">Grade 2</label>
                    <input
                        type="number"
                        id="grade2"
                        name="grade2"
                        min="0"
                        max="100"
                        step="0.01"
                        placeholder="0 - 100"
                        value="<?php echo $grade2; ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="grade3">Grade 3</label>
                    <input
                        type="number"
                        id="grade3"
                        name="grade3"
                        min="0"
                        max="100"
                        step="0.01"
                        placeholder="0 - 100"
                        value="<?php echo $grade3; ?>"
                        required
                    >
                </div>

            </div>

            <button type="submit">
                Calculate Final Result
            </button>

        </form>

        <?php if ($average !== null): ?>

        <div class="result">

            <h2>Final Result</h2>

            <div class="result-info">
                <p>
                    <strong>Student Name:</strong>
                    <?php echo $studentName; ?>
                </p>

                <p>
                    <strong>Student ID:</strong>
                    <?php echo $studentID; ?>
                </p>

                <p>
                    <strong>Grade 1:</strong>
                    <?php echo number_format($grade1, 2); ?>
                </p>

                <p>
                    <strong>Grade 2:</strong>
                    <?php echo number_format($grade2, 2); ?>
                </p>

                <p>
                    <strong>Grade 3:</strong>
                    <?php echo number_format($grade3, 2); ?>
                </p>
            </div>

            <div class="average">
                <span>Final Average</span>
                <strong>
                    <?php echo number_format($average, 2); ?>
                </strong>
            </div>

            <div class="status 
                <?php echo ($status == 'PASSED') ? 'passed' : 'failed'; ?>">

                <?php echo $status; ?>

            </div>

        </div>

        <?php endif; ?>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>