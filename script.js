document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("gradeForm");

    form.addEventListener("submit", function (event) {

        const grade1 = parseFloat(document.getElementById("grade1").value);
        const grade2 = parseFloat(document.getElementById("grade2").value);
        const grade3 = parseFloat(document.getElementById("grade3").value);

        if (
            grade1 < 0 || grade1 > 100 ||
            grade2 < 0 || grade2 > 100 ||
            grade3 < 0 || grade3 > 100
        ) {
            alert("Grades must be between 0 and 100.");
            event.preventDefault();
            return;
        }

        const average = (grade1 + grade2 + grade3) / 3;

        if (average >= 75) {
            console.log("Student will pass.");
        } else {
            console.log("Student will fail.");
        }
    });

});