@extends('layouts.app')

@section('head')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

<style>
    /* Customize DataTables search input */
    .dataTables_filter input {
        width: 300px !important;
        /* Set your desired width */
        padding: 0.5rem;
        border: 1px solid #e2e8f0;
        border-radius: var(--border-radius);
        transition: var(--transition);
    }

    .dataTables_filter input:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    .report-container {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    .report-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .report-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }

    .report-table {
        width: 100%;
        border-collapse: collapse;
    }

    .report-table th {
        background-color: var(--primary);
        color: white;
        font-weight: 500;
        padding: 1rem;
        text-align: left;
    }

    .report-table td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #e2e8f0;
    }

    .report-table tr:nth-child(even) {
        background-color: var(--primary-light);
    }

    .report-table tr:hover {
        background-color: #f0f4ff;
    }

    .report-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.5rem;
    }

    .btn-report {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius);
        font-weight: 500;
        transition: var(--transition);
    }

    .btn-report-primary {
        background-color: var(--primary);
        color: white;
    }

    .btn-report-primary:hover {
        background-color: var(--secondary);
        color: white;
    }

    .btn-report-secondary {
        background-color: #e2e8f0;
        color: var(--dark);
    }

    .btn-report-secondary:hover {
        background-color: #cbd5e0;
    }

    .report-select {
        width: 100%;
        padding: 0.5rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: var(--border-radius);
        transition: var(--transition);
    }

    .report-select:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    .report-optgroup {
        font-weight: 600;
        color: var(--dark);
    }

    .report-empty {
        padding: 2rem;
        text-align: center;
        background-color: #f8fafc;
        border-radius: var(--border-radius);
        color: #64748b;
    }

    @media (max-width: 768px) {
        .report-actions {
            flex-direction: column;
        }

        .report-table {
            display: block;
            overflow-x: auto;
        }
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="report-container">
        <div class="report-header">
            <h1 class="report-title">{{ $title }}</h1>
        </div>

        @if(count($data) > 0)
        <div class="table-responsive">
            <table id="reportTable" class="report-table">
                <thead>
                    <tr>
                        @foreach($columns as $column)
                        <th>{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        @foreach($row as $cell)
                        <td>{{ $cell }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="report-empty">
            <i class="fas fa-info-circle fa-2x mb-3"></i>
            <p>No data found for this report.</p>
        </div>
        @endif

        <div class="report-actions">
            <a href="{{ route('reports.index') }}" class="btn-report btn-report-secondary">
                <i class="fas fa-arrow-left mr-2"></i> Back to Reports
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery (required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- DataTables Bootstrap 5 JS -->
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<!-- Buttons HTML5 export -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<!-- PDF export -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<!-- JSZip for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
    $(document).ready(function() {
        $('#reportTable').DataTable({
            dom: 'Bfrtip',
            buttons: [

            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            },
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            initComplete: function() {
                $('.dataTables_filter input').css('width', '300px');
            }
        });
    });
</script>
@endsection