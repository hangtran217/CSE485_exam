<?php   
session_start(); //to ensure you are using same session
session_destroy(); //Hủy tất cả các phiên đang có
location("login.php"); //to redirect back to "login.php" after logging out
exit();
?>

<?php function location($url)
    { ?>
        <script type="text/javascript">
            window.location = "<?=$url?>";
        </script>
<?php } ?>