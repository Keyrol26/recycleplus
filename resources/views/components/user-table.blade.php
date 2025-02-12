{{-- resources/views/components/table.blade.php --}}
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <div class="header-title">
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                    <div class="input-group search-input d-flex w-100 d-sm-flex" style="max-width: 50%; flex: 1 1 auto;">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" name="search" id="search" class="form-control"
                            placeholder="Search By Name">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="{{ $tableId }}" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th class="justify-content-end">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                            </tbody>
                        </table>
                        <div id="pagination" class="d-flex justify-content-end mt-3 px-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    function fetch_data(query = '', page = 1) {
        $.ajax({
            url: "{{ secure_url($dataRoute) }}",
            method: 'GET',
            data: {
                query: query,
                page: page,
            },
            dataType: 'json',
            success: function(data) {
                $('#table_body').html(data.table_data);
                $('#pagination').html(data.pagination);
            }
        });
    }

    $(document).ready(function() {
        fetch_data();

        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_data(query);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var query = $('#search').val();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(query, page);
        });
    });
</script>
