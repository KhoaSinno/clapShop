 <!--Javascript-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="/admin_UI/js/main.js"></script>
 <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
 <script src="/admin_UI/vendor/jquery/jquery-3.2.1.min.js"></script>
 <script src="/admin_UI/vendor/bootstrap/js/popper.js"></script>
 <script src="/admin_UI/vendor/bootstrap/js/bootstrap.min.js"></script>
 <script src="/admin_UI/vendor/select2/select2.min.js"></script>
 <script type="text/javascript">
     //show - hide mật khẩu
     function myFunction() {
         var x = document.getElementById("myInput");
         if (x.type === "password") {
             x.type = "text"
         } else {
             x.type = "password";
         }
     }
     $(".click-eye").click(function() {
         $(this).toggleClass("bx-show bx-hide");
         var input = $($(this).attr("toggle"));
         if (input.attr("type") == "password") {
             input.attr("type", "text");
         } else {
             input.attr("type", "password");
         }
     });
 </script>