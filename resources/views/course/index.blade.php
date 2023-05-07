
@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="mb-5">
       
        <a href="{{route('courses.create')}}"  class="btn btn-wd btn-success"> 
            <span class="btn-label">
                <i class="ti-plus"></i> 
            </span>
        Add Courses</a>
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
                            <div class="columns columns-right pull-right"><button class="btn btn-default" type="button"
                                    name="refresh" title="Refresh"><i class="glyphicon fa fa-refresh"></i></button><button
                                    class="btn btn-default" type="button" name="toggle" title="Toggle"><i
                                        class="glyphicon fa fa-th-list"></i></button>
                                <div class="keep-open btn-group" title="Columns"><button type="button"
                                        class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i
                                            class="glyphicon fa fa-columns"></i> <span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><label><input type="checkbox" data-field="id" value="1" checked="checked"> ID</label>
                                        </li>
                                        <li><label><input type="checkbox" data-field="name" value="2" checked="checked">
                                                Name</label></li>
                                        <li><label><input type="checkbox" data-field="salary" value="3" checked="checked">
                                                Salary</label></li>
                                        <li><label><input type="checkbox" data-field="country" value="4" checked="checked">
                                                Country</label></li>
                                        <li><label><input type="checkbox" data-field="city" value="5" checked="checked">
                                                City</label></li>
                                        <li><label><input type="checkbox" data-field="actions" value="6" checked="checked">
                                                Actions</label></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pull-left search">
    
                        </div>
                        <div class="fixed-table-container" style="padding-bottom: 0px;">
                            <div class="fixed-table-header" style="display: none;">
                                <table></table>
                            </div>
                            <div class="fixed-table-body">
                                <div class="fixed-table-loading" style="top: 41px;">Loading, please wait...</div>  
                                <table  id="table-index" class="table table-hover">   
                                    <thead>     
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created At</th>
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
<script>
  $(function() {
            var buttonCommon = {
                exportOptions: {
                    columns: ':visible :not(.not-export)'
                }
            };
            let table = $('#table-index').DataTable({
                dom: 'Blfrtip',
                select: true,
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'copyHtml5',
                        text: '<a style="color: #FFFFFF;">COPY</a>',
                        className: "btn btn-info btn-fill btn-wd",
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'csvHtml5',
                        text: '<a style="color: #FFFFFF;">CSV</a>',
                        className: "btn btn-info btn-fill btn-wd",
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'excelHtml5',
                        text: '<a style="color: #FFFFFF;">EXCEL</a>',
                        className: "btn btn-info btn-fill btn-wd",

                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'pdfHtml5',
                        text: '<a style="color: #FFFFFF;">PDF</a>',
                        className: "btn btn-info btn-fill btn-wd",
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'print',
                        text: "<i class='fa fa-print text-125 text-orange-d1'></i> <span class='d-none'>Print</span>",
                        className: "btn btn-info btn-fill btn-wd",
                    }),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'colvis',
                        text: "<i class='fa fa-eye text-125 text-dark-m2'></i> <span class='d-none'>Show/hide columns</span>",
                        className: "btn btn-info btn-fill btn-wd",
                       
                    }),
                   
                    
                ],
                lengthMenu: [1, 10, 25, 50, 75, 100 ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('courses.api') !!}',
                columnDefs: [
                    { className: "not-export", "targets": [ 3, 4 ] }
                ],
                language: {
                    "paginate": {
                       
                        "next": '<span class="btn btn-default">Next</span>',
                        "previous": '<span class="btn btn-default">Previous</span>',
                        
                    }
                  
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: 'edit',
                        targets: 3,
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
                        targets: 4,
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

                ]
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