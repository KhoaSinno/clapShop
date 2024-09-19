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



 <!-- Home -->
 <!-- Essential javascripts for application to work-->
 <script src="/admin_UI/js/jquery-3.2.1.min.js"></script>
 <script src="/admin_UI/js/popper.min.js"></script>
 <script src="/admin_UI/js/bootstrap.min.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <!-- <script src="/admin_UI/doc/js/plugins/jq_1111.js"></script> -->
 <!-- <script src="src/jquery.table2excel.js"></script> -->
 <script src="/admin_UI/js/main.js"></script>
 <!-- The javascript plugin to display page loading on top-->
 <script src="/admin_UI/js/plugins/pace.min.js"></script>
 <!-- Page specific javascripts-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
 <!-- <script src="/admin_UI/doc/js/plugins/jq_332_confirm.js"></script> -->
 <!-- Data table plugin-->
 <script type="text/javascript" src="/admin_UI/js/plugins/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="/admin_UI/js/plugins/dataTables.bootstrap.min.js"></script>
 <script type="text/javascript">
     $('#sampleTable').DataTable();
 </script>
 <script>
     function deleteRow(r) {
         var i = r.parentNode.parentNode.rowIndex;
         document.getElementById("myTable").deleteRow(i);
     }
     jQuery(function() {
         jQuery(".trash").click(function() {
             swal({
                     title: "Cảnh báo",

                     text: "Bạn có chắc chắn là muốn xóa nhân viên này?",
                     buttons: ["Hủy bỏ", "Đồng ý"],
                 })
                 .then((willDelete) => {
                     if (willDelete) {
                         swal("Đã xóa thành công.!", {

                         });
                     }
                 });
         });
     });
     oTable = $('#sampleTable').dataTable();
     $('#all').click(function(e) {
         $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
         e.stopImmediatePropagation();
     });

     //EXCEL
     // $(document).ready(function () {
     //   $('#').DataTable({

     //     dom: 'Bfrtip',
     //     "buttons": [
     //       'excel'
     //     ]
     //   });
     // });


     //Thời Gian
     function time() {
         var today = new Date();
         var weekday = new Array(7);
         weekday[0] = "Chủ Nhật";
         weekday[1] = "Thứ Hai";
         weekday[2] = "Thứ Ba";
         weekday[3] = "Thứ Tư";
         weekday[4] = "Thứ Năm";
         weekday[5] = "Thứ Sáu";
         weekday[6] = "Thứ Bảy";
         var day = weekday[today.getDay()];
         var dd = today.getDate();
         var mm = today.getMonth() + 1;
         var yyyy = today.getFullYear();
         var h = today.getHours();
         var m = today.getMinutes();
         var s = today.getSeconds();
         m = checkTime(m);
         s = checkTime(s);
         nowTime = h + " giờ " + m + " phút " + s + " giây";
         if (dd < 10) {
             dd = '0' + dd
         }
         if (mm < 10) {
             mm = '0' + mm
         }
         today = day + ', ' + dd + '/' + mm + '/' + yyyy;
         tmp = '<span class="date"> ' + today + ' - ' + nowTime +
             '</span>';
         document.getElementById("clock").innerHTML = tmp;
         clocktime = setTimeout("time()", "1000", "Javascript");

         function checkTime(i) {
             if (i < 10) {
                 i = "0" + i;
             }
             return i;
         }
     }
     //In dữ liệu
     var myApp = new function() {
         this.printTable = function() {
             var tab = document.getElementById('sampleTable');
             var win = window.open('', '', 'height=700,width=700');
             win.document.write(tab.outerHTML);
             win.document.close();
             win.print();
         }
     }
     //     //Sao chép dữ liệu
     //     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

     // copyTextareaBtn.addEventListener('click', function(event) {
     //   var copyTextarea = document.querySelector('.js-copytextarea');
     //   copyTextarea.focus();
     //   copyTextarea.select();

     //   try {
     //     var successful = document.execCommand('copy');
     //     var msg = successful ? 'successful' : 'unsuccessful';
     //     console.log('Copying text command was ' + msg);
     //   } catch (err) {
     //     console.log('Oops, unable to copy');
     //   }
     // });


     //Modal
     $("#show-emp").on("click", function() {
         $("#ModalUP").modal({
             backdrop: false,
             keyboard: false
         })
     });
 </script>
