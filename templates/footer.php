
		
	</div>
    <footer class="mt-auto py-3 bg-light">
        <div class="container">
            <p class="float-end"><a href="#"><i class="bi bi-arrow-up-square"></i></a></p>
            <p class="text-center">6CS028 - GoodFilms &copy; 2022 - Movie Data Provided by <a href='https://www.themoviedb.org/' target="_blank" style='color: #0d253f'><img src="../assets/images/TMDB-Logo.svg"  width="100" height="50"></a></p>
            <p class="text-center"><a href="https://twitter.com/J_Simmo17" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter"></i></a></p>
        </div>
	</footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<!-- Autocomplete the textbox jquery ajax -->
<script type="text/javascript"> 
$(document).ready(function() {
    $("#search").on("keyup", function() {
        var search = $(this).val();
        if(search !== "") {
            $.ajax({
                url: " ../includes/ajax-db-search.php", 
                type: "POST",
                cache: false, 
                data: {term:search},
                success: function(data){
                    $("#search-result").html("");
                    $("#search-result").fadeIn();
                }
            });
        } else {
            $("#search-result").html("");
            $("#search-result").fadeOut();
        }
    });
    // Click one particular search name it's fill in textbox
    $(document).on("click", "li", function(){
        $('#search').val($(this).text());
        $('#search-result').fadeOut("fast");
    });
});

</script>