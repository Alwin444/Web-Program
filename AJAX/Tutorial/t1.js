fetch("t1.php")
.then(response => response.text())  //Plain text, can be returned in JSON format
.then(data => {
    const arr = data.split('|');
    let Income = arr[0];
    let Expense = arr[1];

    let Pr_design = document.getElementsByClassName("rec1")[0];
    let Ex_design = document.getElementsByClassName("rec1")[1];

    Pr_design.style.color = "green";
    Pr_design.style.textAlign = "center";
    Pr_design.innerText = "Income: " + Income;

    Ex_design.style.color = "red";
    Ex_design.style.textAlign = "center";
    Ex_design.innerText = "Expense: " + Expense;
});
