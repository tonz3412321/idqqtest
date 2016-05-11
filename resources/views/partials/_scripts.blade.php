<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="/ladda/dist/ladda.min.js"></script>

<script   src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.js"   integrity="sha256-6HSLgn6Ao3PKc5ci8rwZfb//5QUu3ge2/Sw9KfLuvr8="   crossorigin="anonymous"></script>


<script>

    function uiMessage($data){

        $("#myDialogText").text($data);
        $("#myDialog").dialog({
            modal: true,
            buttons: {
                Ok: function() {
                    $(".ui-dialog-content").dialog("close");
                }
            }
        });

    }

    function uiConfirm($data){

        $("#myConfirmText").text($data);
        $( "#myConfirm" ).dialog({
            resizable: false,
            height:140,
            modal: true,
            buttons: {
                "Confirm?": function() {
                   return true;
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });

    }



</script>


@yield('page_scripts')