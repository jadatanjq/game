
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-pale-red w3-hover-pale-blue w3-large">Close &times;</button>
  <a href="/game/account/account.php" class="w3-bar-item w3-hover-blue-grey w3-button">My Profile</a>
    </br>
  <a href="/game/home.php" class="w3-bar-item w3-hover-blue-grey w3-button">Homepage</a>
  <a href="/game/battleshiphome.php" class="w3-bar-item w3-hover-blue-grey w3-button">Battleship</a>
  <a href="/game/tictactoehome.php" class="w3-bar-item w3-hover-blue-grey w3-button">Tictactoe</a>
  <a href="/game/sudokuhome.php" class="w3-bar-item w3-hover-blue-grey w3-button">Sudoku</a>
    </br></br></br>

<?php

if (isset($_SESSION['username'])){
    echo "<a href='/game/account/logout.php' class='w3-bar-ite w3-hover-blue-grey w3-button'>Log out </a>";
}else{
    echo "<a href='/game/account/login.php' class='w3-bar-item w3-hover-blue-grey w3-button'>Log in </a>";
}
?>
  

</div>

<!-- Page Content -->
<div class="w3-clear">
  <button class="w3-button w3-clear w3-xlarge" onclick="w3_open()">☰</button>

</div>


<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>