<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">


<div id="details">

  Full name: <?php echo $sf_user->getFullName($sf_user->getEmployeeId())?><br>
  Address:  <?php echo $sf_user->getAddress($sf_user->getEmployeeId())?>
 
</div>


<style scoped>
  * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

#details{
  font-family: "Trirong", serif;
  text-align: center;
  min-height: 85vh;
  background-color: blanchedalmond;
}


</style>