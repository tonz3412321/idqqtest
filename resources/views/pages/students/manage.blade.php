@extends('layouts.app', ['title' => 'Manage Students Lists'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <label>Choose Age Bracket : </label> from
            <select id="age1" class="ages">
                <option value="0">--</option>
                @for($i = 8; $i < 100; $i++)
                    <option value="{{$i}}">{{ $i }}</option>
                @endfor
            </select>
            to
            <select id="age2" class="ages">
                <option value="100">All</option>
                @for($i2 = 8; $i2 < 100; $i2++)
                    <option value="{{$i2}}">{{ $i2 }}</option>
                @endfor
            </select>
            <button id="btn_xls" class="btn btn-sm btn-success pull-right"><i class="glyphicon glyphicon-download"></i> Export to xlsx</button>
        </div>

    </div>

    <hr />

    <div class="row">
        <div class="col-md-12">
            <table id="students">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Section </th>
                    <th>Level </th>
                    <th>City </th>
                    <th>Zip </th>
                    <th>Age</th>
                    {{--<th>Updated At </th>--}}
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

            studentsTable();

            $('#students').on('click','.delete-student',function(){

                $id = $(this).attr('data-id');

                var $message = "Are you sure to remove this student?"
                $("#myConfirmText").text($message);
                $( "#myConfirm" ).dialog({
                    resizable: false,
                    height:200,
                    modal: true,
                    buttons: {
                        "Confirm?": function() {
                            $.ajax(
                                    {
                                        url : '/student/'+$id+'/delete',
                                        type: "GET",
                                        success:function(data, textStatus, jqXHR)
                                        {
                                            uiMessage(data);
                                            $('#students').dataTable().fnDestroy();
                                            studentsTable();

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


            $('.ages').change(function(){

                $('#students').dataTable().fnDestroy();
                $url = '/students/data/'+$('#age1').val()+'/'+$('#age2').val();
                studentsTable($url);


            });

            $('#btn_xls').click(function(){

                $url = '/students/report/'+$('#age1').val()+'/'+$('#age2').val();

                window.open($url, '_blank');

            });

            function studentsTable($url)
            {
                if($url==null)
                {
                    $url = '/students/data/1/100';
                }

                $('#students').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: $url,
                    columns: [
                        {"name": "id", "orderable": "true"},
                        {"name": "last_name", "orderable": "true"},
                        {"name": "email", "orderable": "true"},
                        {"name": "section", "orderable": "true"},
                        {"name": "level", "orderable": "true"},
                        {"name": "city", "orderable": "true"},
                        {"name": "zip", "orderable": "true"},
                        {"name": "age", "orderable": "true"},
                        {"name": "action", "orderable": "false"},
                    ]
                });

            }





        });



    </script>



@endsection
