			</div>
        
    	</div>


        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        
        <script type="text/javascript">

		function ConfirmDelete()
		{
		    var x = confirm("Are you sure you want to delete?");
		    if (x){
		        return true;
		    }
		    else{
		        return false;
		    }
		}


	</script>
	<script type="text/javascript">
		document.getElementById("image").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("showimage").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#status').change(function(){
				$('#statusForm').submit();
			});    
		});

	</script>
    </body>
</html>  