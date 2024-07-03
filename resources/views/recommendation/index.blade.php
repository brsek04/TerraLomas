@extends('layouts.app')

@section('template_title')
    Recommendation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Recommendation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('recommendations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Recommendation Name</th>
										<th>Branch Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recommendations as $recommendation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $recommendation->recommendation_name }}</td>
											<td>{{ $recommendation->branch_id }}</td>

                                            <td>
                                                <form action="{{ route('recommendations.destroy',$recommendation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('recommendations.show',$recommendation->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('recommendations.edit',$recommendation->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $recommendations->links() !!}
            </div>
        </div>
    </div>
@endsection
