
@extends('layout.master')
@section('content')
<div class="container-fluid">
    <h1>Courses</h1>
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
                                <caption>
                                    <form>
                                      <input type="search" class="form-control" placeholder="Search" name="q" value="{{$search}}">
                                    </form>
                                </caption>
                        </div>
                        <div class="fixed-table-container" style="padding-bottom: 0px;">
                            <div class="fixed-table-header" style="display: none;">
                                <table></table>
                            </div>
                            <div class="fixed-table-body">
                                <div class="fixed-table-loading" style="top: 41px;">Loading, please wait...</div>  
                                <table  id="bootstrap-table" class="table table-hover">                               
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th class="td-actions text-right" style="" data-field="actions"><div class="th-inner ">Actions</div><div class="fht-cell"></div></th>
                                    </tr>
                                    @foreach ($data as $each)
                                        <tr>
                                            <td>{{$each->id}}</td>
                                            <td>{{$each->name}}</td>
                                            <td>{{ $each->year_created_at }}</td>
                                            <td class="td-actions text-right" style="">
                                                <div class="table-icons">
                                                    <a rel="tooltip" title="" class="btn btn-simple btn-info btn-icon table-action view" href="javascript:void(0)" data-original-title="View"><i class="ti-image"></i></a>

                                                    <a rel="tooltip" title="" class="btn btn-simple btn-warning btn-icon table-action edit" href="{{route('courses.edit',$each)}}" data-original-title="Edit"><i class="ti-pencil-alt"></i></a>
                                                    <a rel="tooltip" title="" class="btn btn-simple btn-danger btn-icon table-action delete" href="" data-original-title="Remove">
                                                        <form action="{{route('courses.destroy',$each)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-simple btn-danger btn-icon table-action remove"><i class="ti-close"></i></button>
                                                        </form>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="fixed-table-footer" style="display: none;">
                                <table>
                                    <tbody>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="fixed-table-pagination">
                                <div class="pull-left pagination-detail"><span class="pagination-info"></span><span
                                        class="page-list"><span class="btn-group dropup"><button type="button"
                                                class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><span
                                                    class="page-size">8</span> <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="active"><a href="javascript:void(0)">8</a></li>
                                                <li><a href="javascript:void(0)">10</a></li>
                                                <li><a href="javascript:void(0)">25</a></li>
                                            </ul>
                                        </span> rows visible</span></div>
                                <div class="pull-right pagination">
                                    
                                        {{ $data->links() }}
                                   
                                </div>
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