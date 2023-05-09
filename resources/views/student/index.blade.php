
@extends('layout.master')
@push('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

<div class="container-fluid">
    <div class="mb-5">
       
        <a href="{{route('students.create')}}"  class="btn btn-wd btn-success"> 
            <span class="btn-label">
                <i class="ti-plus"></i> 
            </span>
        Add students</a>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="bootstrap-table">
                        <div class="fixed-table-toolbar">
                            <div class="bars pull-left">
                                <div class="toolbar">
                                    <!--Here you can write extra buttons/actions for the toolbar-->
                                </div>
                            </div>
                            <div class="columns columns-right pull-right">
                                <div class="pull-left search">
                                    <select id="select-name" style="width: 400px"></select>
                                </div>  
                            </div>
                        <div class="fixed-table-container" style="padding-bottom: 0px;">
                            <div class="fixed-table-body">
                                <div class="fixed-table-loading" style="top: 41px;">Loading, please wait...</div>  
                                <table  id="table-index" class="table table-striped table-bordered" style="width:100%"> 
                                    <thead>     
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Course</th>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead> 
                               
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
</div>
@endsection
@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
            $(function() {
            var buttonCommon = {
                exportOptions: {
                    columns: ':visible :not(.not-export)'
                }
            };

            let table = $('#table-index').DataTable({
                dom: 'Brtip',
                select: true,
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'copyHtml5',
                    }),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'csvHtml5',
                    }),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'excelHtml5',  
                    }),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'pdfHtml5',
                    }),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'print',
                    }),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'colvis',
                    }),
                ],
                lengthMenu: [1, 10, 25, 50, 75, 100 ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('students.api') !!}',
                columnDefs: [
                    { className: "not-export", "targets": [ 6, 7 ] }
                ],
             
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'age', name: 'age' },
                    { data: 'gender', name: 'gender' },
                    { data: 'status', name: 'status' },
                    { data: 'course_id', name: 'course_id' },
                    {
                        data: 'edit',
                        targets: 6,
                        orderable: false,
                        searchable: false,
                        render: function ( data, type, row, meta ) {
                          return `<a class="btn btn-primary" href="${data}">
                                Edit
                            </a>`;
                        }
                    },
                    {
                        data: 'destroy',
                        targets: 7,
                        orderable: false,
                        searchable: false,
                        render: function ( data, type, row, meta ) {
                          return `<form action="${data}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type='button' class="btn-delete btn btn-danger">Delete</button>
                            </form>`;
                        }
                    },

                ],
            });
            $(document).on('click','.btn-delete',function(){
                let form = $(this).parents('form');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function() {
                        console.log("success");
                        table.draw();
                    },
                    error: function() {
                        console.log("error");
                    }
                });
            });

          
        });


</script>
 
@endpush