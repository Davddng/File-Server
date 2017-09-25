<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<form id="form" action="search.php" method="post">
  <input type="hidden" name="searchTerm" value="">
  <input type="hidden" name="startDate" value="">
  <input type="hidden" name="endDate" value="">
  <input type="hidden" name="video" value="true">
  <input type="hidden" name="mainpage" value="Video Files">
  <!-- <input type="submit"> -->
</form>

<script>
$(window).on("load", function(){
  $("#form").submit();
});
</script>
