  <!--password validation-->
    <script type="text/javascript">
        function passwordValidator() {
            let password = document.getElementById("password");
            let confirmPassword = document.getElementById("confirmPassword");
            console.log("dsds")

            if (password.value == confirmPassword.value) {

            } else {
                alert("Confirmed password doesnt match with password")
                confirmPassword.value = "";
                confirmPassword.focus();
            }
        }
    </script>

    <!-- Classie -->
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };


        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <!-- Bootstrap Core JavaScript -->

    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/dev-loaders.js"></script>
    <script type="text/javascript" src="js/dev-layout-default.js"></script>
    <script type="text/javascript" src="js/jquery.marquee.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- candlestick -->
    <script type="text/javascript" src="js/jquery.jqcandlestick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jqcandlestick.css" />
    <!-- //candlestick -->

    <!--max-plugin-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <!--//max-plugin-->

    <!--scrolling js
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    scrolling js-->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>

  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
  });

  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );

</script>

 <script>
            $( document ).ready(function() {
                $( ".txtOnly" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
            });


            function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
        </script>