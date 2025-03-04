humburger = document.querySelector(".humburger");
sidUl = document.querySelector(".sidebar ul");
sidH3 = document.querySelector(".sidebar h3");
humburger.onclick = function () {
  navBar = document.querySelector(".sidebar");
  navBar.classList.toggle("activeS");
  sidUl.classList.toggle("dActive");
  sidH3.classList.toggle("dActive");
};
function search() {
  // Declare variables
  let input, filter, myTable, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  myTable = document.getElementsByClassName("myTable")[0];
  tr = myTable.querySelectorAll("tbody tr");
  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    tr[i].style.display = "none";
    td = tr[i].getElementsByTagName("td");
    for (let j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        }
      }
    }
  }
}
