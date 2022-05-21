<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head_ext.php'; ?>
  <title>HCM | Daily Log</title>
</head>

<style>
</style>

<body>
  <?php $page = 'log'; ?>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>
  <main id="main" class="main">
    <?php require_once "timezone.php"; ?>
    <table class="datatable table table-hover table-bordered">
      <thead>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </thead>
      <tbody>

      </tbody>
    </table>

  </main>
  <?php include('includes/footer.php') ?>
</body>

</html>