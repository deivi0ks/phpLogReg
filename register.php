<?php

include "configs/mysqlConfig.php";
include "configs/pageConfig.php";

session_start();

if(isset($_POST['registerUser']))
{
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = $dbh->prepare("SELECT * FROM `users` WHERE `username` = ?");
    $query->execute([$username]);

    if ($query->rowCount() > 0) {
      $klaida = "Vartotojas jau egzistuoja, bandykite kitą slapyvardį.";
      exit();
    } else {
      $query = $dbh->prepare("INSERT INTO `users` (username, password) VALUES (?, ?)");
      $query->execute([$username, $password]);

      $_SESSION['user'] = $username;
      header("location: index.php");
    }
}
?>

<div class="container mx-auto p-4 bg-white">
  <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
    <h1 class="text-lg font-bold">Registracija</h1>
    <form class="flex flex-col mt-4" method="POST" action="register.php">
      <input
          type="text"
          name="username"
          class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
          placeholder="Slapyvardis"
          required
      />
      <input
          type="password"
          name="password"
          class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
          placeholder="Slaptažodis"
          required
      />
      <div class="flex flex-col items-center mt-5">
      <?php
      if(isset($klaida))
      {
          echo '<div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
          <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">KLAIDA</span>
          <div>
              <span class="font-medium">'.$klaida.'</span>
          </div>
        </div>';
      }
      ?>
      </div>
      <button
          type="submit"
          name="registerUser"
          class="mt-4 px-4 py-3  leading-6 text-base rounded-md border border-transparent text-white focus:outline-none bg-blue-500 text-blue-100 hover:text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer inline-flex items-center w-full justify-center items-center font-medium focus:outline-none"
      >
      Užregistruoti
      </button>
    </form>
  </div>
</div>