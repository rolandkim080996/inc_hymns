<!-- music_management/credits.blade.php -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery before Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Credit List') }}
        </h2>
    </x-slot>

    <div class="py-12">
      
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
            <div class="p-6">
                <button id="addCreditButton" data-toggle="modal" data-target="#addCreditModal" class="btn btn-success">
                    <i class="fas fa-plus"></i> Credit
                </button>
                <div class="overflow-x-auto">
                    <div class="pagination flex justify-center items-center h-full" style="padding:0px;margin-bottom:10px;">
                        {{ $credits->links() }}
                    </div>
                    <table class="w-full max-w-full table-auto border divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">#</th>
                                <th scope="col" style="width: 85%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">Name</th>
                                <th scope="col" style="width: 10%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($credits as $index => $Credit)
                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-200">
                                <td style="width: 5%;" class="px-6 py-4 whitespace-nowrap border text-center">{{ ($credits->currentPage() - 1) * $credits->perPage() + $loop->iteration }}</td>
                                
                                <td style="width: 85%;" class="px-6 py-4 whitespace-nowrap border text-center">{{ $Credit->name }}</td>
                                <td style="width: 15%;" class="px-6 py-4 whitespace-nowrap border text-center">
                                    <button class="btn btn-primary btn-sm edit-Credit" 
                                    data-toggle="modal" 
                                    data-target="#editCreditModal" 
                                    data-id="{{ $Credit->id }}"
                                    data-name="{{ $Credit->name }}">
                                    
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm delete-Credit" 
        data-Credit-id="{{ $Credit->id }}"
        data-Credit-name="{{ $Credit->name }}">
        <i class="fas fa-trash-alt"></i>
    </button>
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>





                    <div class="pagination flex justify-center items-center h-full" style="padding:0px;margin-top:10px;">
                        {{ $credits->links() }}
                    </div>
                </div>
            </div>


            </div>
        </div>
    </div>


    <!-- Add Credit Modal -->
    <div class="modal fade" data-backdrop="static" id="addCreditModal" tabindex="-1" role="dialog" aria-labelledby="addCreditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCreditModalLabel">Add Credit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('credits.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Credit Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Credit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


                <!-- Edit Credit Modal -->
            <div class="modal fade" id="editCreditModal" tabindex="-1" role="dialog" aria-labelledby="editCreditModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCreditModalLabel">Edit Credit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                
                        <form id="editForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="edit_name">Credit Name:</label>
                                
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id" value="{{ $Credit->id }}">
                                <input type="text" class="form-control" id="edit_name" name="edit_name" value="{{ $Credit->name }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Delete Credit Modal -->
            <div class="modal fade" id="deleteCreditModal" tabindex="-1" role="dialog" aria-labelledby="deleteCreditModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteCreditModalLabel">Delete Credit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this Credit?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="deleteCreditForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // JavaScript for handling the edit modal
                $('.edit-Credit').click(function() {
                    var CreditId = $(this).data('id');
                    var CreditName = $(this).data('name');
                
                    $('#edit_name').val(CreditName);
                        // Set the Credit ID in the form action
                        $('#editForm').attr('action', "{{ route('credits.update', ':id') }}".replace(':id', CreditId));
                });

                // JavaScript for handling the delete modal
                $('.delete-Credit').click(function() {
                    var CreditId = $(this).data('Credit-id');
                    var CreditName = $(this).data('Credit-name');
                    var form = $('#deleteCreditForm');
                    var url = "{{ url('music_management/credits') }}/" + CreditId;
                    form.attr('action', url);
                    $('#deleteCreditModal').modal('show');
                });

            </script>
    </x-app-layout>
