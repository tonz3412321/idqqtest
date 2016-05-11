@extends('layouts.app', ['title' => 'Manage Users'])

@section('content')


    <div class="row">
        <div class="col-md-12">
            <table id="users">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>



@endsection



@section('page_scripts')
    <script>
        $(document).ready(function(){

            usersTable();

            $('#users').on('click','.delete-user',function(){
                $id = $(this).attr('data-id');

                var $message = "Are you sure to remove this user?"
                $("#myConfirmText").text($message);
                $( "#myConfirm" ).dialog({
                    resizable: false,
                    height:200,
                    modal: true,
                    buttons: {
                        "Confirm?": function() {
                            $.ajax(
                                    {
                                        url : '/users/'+$id+'/delete',
                                        type: "GET",
                                        success:function(data, textStatus, jqXHR)
                                        {
                                            uiMessage(data);
                                            $('#users').dataTable().fnDestroy();
                                            usersTable();

                                        },
                                        error: function(jqXHR, textStatus, errorThrown)
                                        {
                                            uiMessage('Something went wrong. Please try again');
                                        }
                                    });
                        },
                        Cancel: function() {
                            $(".ui-dialog-content").dialog("close");
                        }
                    }
                });
            })

            function usersTable($url)
            {
                $url = '/users/data';

                $('#users').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: $url,
                    timeout : 5000,
                    columns: [
                        {"name": "id", "orderable": "true"},
                        {"name": "name", "orderable": "true"},
                        {"name": "email", "orderable": "true"},
                        {"name": "action", "orderable": "false", "searchable" : "false"},
                    ]
                });

            }
        });



    </script>



@endsection
